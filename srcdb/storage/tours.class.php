<?php
include_once 'conexion/conexion.class.php';
class Tours
{
    private static $_instance = NULL;
    private $dbh;
	
    private function __construct()
    {
		$this->dbh = Conexion::singletonConexion();
    }
	
    public static function singletonTours()
    {
        if (!(self::$_instance instanceof self)){
                self::$_instance=new self();
        }
        return self::$_instance;
    }
        
    public function __clone()
    {
        trigger_error("Operación Invalida: en ". get_class($this) ." class.", E_USER_ERROR);
    }
	
	public function indexCategories()
	{
        $sql = "SELECT id, category FROM categories
                WHERE id IN (select category_id from categories_tours)
                ORDER BY category";       
        return $this->stmt($sql,null);                
	}
	
    public function indexLocations()
	{
		$sql = 'SELECT id, destination FROM locations
				WHERE id IN (select location from tours)
				ORDER BY destination';   
		return $this->stmt($sql,null);
	}
	
    public function indexTour($term)
    {
		try {
			$sql = "SELECT
					    id,
					    trim(tour) AS tour,
					    (select 
					            url
					        from
					            categories
					        where
					            id = t.category_id) AS urlcat,
					    t.url AS urltour
					FROM
						tours t
					WHERE
						tour LIKE :term AND active = '1' 
					ORDER BY tour";
			$query = $this->dbh->prepare($sql);
			$query->execute(array(':term' => '%'.$term.'%'));
            if($query->rowCount()>0){
                $result = $query->fetchAll();
				return $this->json($this->decode($result));				
            }
			$this->dbh = null;
			$query = null;
			
        } catch(PDOException $e){
            print "Error!: " . $e->getMessage();
        }
	}
	
    public function getCategories($category,$location)
    {
		try {
			$sql = "CREATE OR REPLACE VIEW `vw_categories_tours` AS
				    SELECT 
				        ct.category_id, ct.tour_id, l.id AS location
				    FROM
				        categories_tours ct
				            JOIN
				        tours t ON ct.tour_id = t.id
				            JOIN
				        locations l ON t.location = l.id
				    WHERE
				        active = '1'
				    UNION ALL SELECT 
				        category_id, t.id, l.id
				    FROM
				        tours t
				            JOIN
				        locations l ON t.location = l.id
				    WHERE
				        active = '1'";
						
			$query = $this->dbh->prepare($sql);
			$query->execute();
			//$this->dbh = null;
			$query = null;
	
		} catch(PDOException $e){
		    print "Error!: " . $e->getMessage();
		}
		
        // Todos los Tours
        $sql1 = "SELECT id, category,
					(select count(*) from vw_categories_tours where category_id = id group by category_id) AS totalTours		
				FROM categories
				WHERE id IN (select category_id from vw_categories_tours where category_id > (?) and location > (?))
                ORDER BY category";
				
        // Todos los tours filtros por categoría y todos los locations
        $sql2 = "SELECT id, category,
					(select count(*) from vw_categories_tours where category_id = id group by category_id) AS totalTours		
				FROM categories
				WHERE id IN (select category_id from vw_categories_tours where category_id = (?) and location != (?))";
        
        // Todas las categories un locations
        $sql3 = "SELECT id, category,
					(select count(*) from vw_categories_tours where category_id = id and location = (?) group by category_id) AS totalTours		
				FROM categories
				WHERE id IN (select category_id from vw_categories_tours where category_id != (?) and location = (?))";

        
        // Una categioría y un locations        
        $sql4 = "SELECT id, category,
					(select count(*) from vw_categories_tours where category_id = id and location = (?) group by category_id) AS totalTours 
				FROM categories
				WHERE id IN (select category_id from vw_categories_tours where category_id = (?) and location = (?))";
  
		$values = array($category,$location);
		if ($category == '*' && $location == '*') {
		    return $this->stmt($sql1,$values);
		} else if ($category != '*' && $location == '*') {
		    return $this->stmt($sql2,$values);
		} else if ($category == '*' && $location != '*') {
			$values = array($location,$category,$location);
		    return $this->stmt($sql3,$values);
		} else {
			$values = array($location,$category,$location);			
		    return $this->stmt($sql4,$values);
		}
		
    }
	
    public function getLocations($category,$location)
    {
	    // Todos los locations
	    $sql1 = "SELECT id, destination FROM locations
                WHERE id IN (select distinct location from tours
                        where id IN (select distinct tour_id from vw_categories_tours where category_id > (?)) and location > (?))
	            ORDER BY destination";

	    // Todos los locations filtros por categoría
	    $sql2 = "SELECT id, destination FROM locations
                WHERE id IN (select distinct location from tours
                        where id IN (select distinct tour_id from vw_categories_tours where category_id = (?)) and location != (?))
                ORDER BY destination";

	    $sql3 = "SELECT id, destination FROM locations
                WHERE id IN (select distinct location from tours
                        where id IN (select distinct tour_id from vw_categories_tours where category_id != (?)) and location = (?))
                ORDER BY destination";
                    
	    $sql4 = "SELECT id, destination FROM locations
                WHERE id IN (select distinct location from tours
                        where id IN (select distinct tour_id from vw_categories_tours where category_id = (?)) and location = (?))
                ORDER BY destination";
				
		$values = array($category,$location);       			
		if ($category == '*' && $location == '*') {
	        return $this->stmt($sql1,$values);
		} else if ($category != '*' && $location == '*') {
	        return $this->stmt($sql2,$values);
		} else if ($category == '*' && $location != '*') {
	         return $this->stmt($sql3,$values);
		} else {
	        return $this->stmt($sql4,$values);
		}
		
    }
	
    public function getListTours($category,$location)
    {
        // Todas las categories y locations
		$sql1 = "SELECT t.id, l.id AS location, tour, destination, description,
					(case `type` when '1' then round(adultPrice) else 0 end) AS adultPrice,
					(case `type` when '1' then round(kidPrice) else 0 end) AS kidPrice,
					thumbnail, trim(c.url) as urlCat, trim(t.url) as urlTour
				FROM tours t JOIN categories c 
					ON t.category_id = c.id JOIN locations l 
					ON t.location = l.id
				ORDER BY tour";
				
        // Una categories y todas las locations
        $sql2 = "SELECT t.id, l.id AS location, tour, destination, description,
					(case `type` when '1' then round(adultPrice) else 0 end) AS adultPrice,
					(case `type` when '1' then round(kidPrice) else 0 end) AS kidPrice,
                    thumbnail, trim(c.url) as urlCat, trim(t.url) as urlTour
                FROM categories c join vw_categories_tours ct
					ON c.id = category_id JOIN tours t
                    ON ct.tour_id = t.id JOIN locations l
                    ON t.location = l.id
                WHERE ct.category_id = (?) AND l.id > (?)
                ORDER BY tour";
                        
        // Todas las categories y un locations
		$sql3 = "SELECT t.id, l.id AS location, tour, destination, description,
					(case `type` when '1' then round(adultPrice) else 0 end) AS adultPrice,
					(case `type` when '1' then round(kidPrice) else 0 end) AS kidPrice,
                    thumbnail, trim(c.url) as urlCat, trim(t.url) as urlTour
				FROM tours t JOIN categories c 
					ON t.category_id = c.id JOIN locations l
					ON t.location = l.id
				WHERE t.id > (?) AND l.id = (?)
				ORDER BY tour";
				
        // Una categories y un location                        
        $sql4 = "SELECT t.id, l.id AS location, tour, destination, description,
						(case `type` when '1' then round(adultPrice) else 0 end) AS adultPrice,
						(case `type` when '1' then round(kidPrice) else 0 end) AS kidPrice,
                        thumbnail, trim(c.url) as urlCat, trim(t.url) as urlTour
                FROM categories c JOIN vw_categories_tours ct 
					ON c.id = ct.category_id JOIN tours t
                    ON ct.tour_id = t.id JOIN locations l
                    ON t.location = l.id
                WHERE ct.category_id = (?) AND l.id = (?)
                ORDER BY tour";
                   
		$values = array($category,$location);
		if ($category == '*' && $location == '*') {
	        return $this->stmtJson($sql1,$values);
		} else if ($category != '*' && $location == '*') {
	        return $this->stmtJson($sql2,$values);
		} else if ($category == '*' && $location != '*') {
	         return $this->stmtJson($sql3,$values);
		} else {
	        return $this->stmtJson($sql4,$values);
		}
	
    }
	
    public function getCatFriendly($category)
    {
		try {
			$sql = "SELECT id FROM categories WHERE url = '$category'";
			$query = $this->dbh->query($sql);
			while($row = $query->fetch()) {
				$id = array_shift($row);
			}
			$this->dbh = null;
			$query = null;
		} catch(PDOException $e) {
			print "Error!: " . $e->getMessage();
		}
		
		$sql = "SELECT
				    tour,
					(select
			            pics
			        from
			            galleries
			        where
			            tour_id = t.id
			        limit 1) AS pic,
					t.url
				FROM
				    tours t
				        JOIN
				    vw_categories_tours ct ON ct.tour_id = t.id
				        JOIN
				    categories c ON c.id = ct.category_id
				WHERE c.id = ?			
				ORDER BY tour";
		
		$values = array($id);
		return $this->stmt($sql,$values);
	}
	
    private function stmt($sql,$values)
    {
        try {
			$query = $this->dbh->prepare($sql);
			$query->execute($values);
            if($query->rowCount()>0){
				$result = $query->fetchAll();
				return $result;
			}
			//$this->dbh = null;
			$query = null;
        } catch(PDOException $e){
            print "Error!: " . $e->getMessage();
        }
	}
	
	//************************************************//
	//******************* JSON ***********************//
	//************************************************//
    private function stmtJson($sql,$values)
    {
        try {
			$query = $this->dbh->prepare($sql);
			$query->execute($values);
            if($query->rowCount()>0){
				$result = $query->fetchAll();
				return $this->json($this->decode($result));
			}
			//$this->dbh = null;
			$query = null;
        } catch(PDOException $e){
            print "Error!: " . $e->getMessage();
        }
	}
	
	private function decode($data) 
	{
		if (is_array($data)) {
			return array_map(array($this,'decode'), $data);
		}
		return html_entity_decode($data);
	}
		 
    private function json($r)
    {
		return json_encode($r);
    }
	     
}
