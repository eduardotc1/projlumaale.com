<?php
include_once 'conexion/conexion.class.php';
class BookDetail
{
    private static $_instance = NULL;
    private $dbh;
		     
    private function __construct()
    {
        $this->dbh = Conexion::singletonConexion();	
    }
        
    public static function singletonBookDetail()
    {
        if (!(self::$_instance instanceof self)){
                self::$_instance=new self();
        }
        return self::$_instance;
    }
        
    public function __clone()
    {
        trigger_error("Operación Invalida: en ". get_class($this) ." class.", E_USER_ERROR );
    }
				           
    public function getTour($tour_id)
    {
		try {
			$sql = "SELECT id FROM tours WHERE url = '$tour_id'";
			$query = $this->dbh->query($sql);
			while($row = $query->fetch()) {
				$id = array_shift($row);
			}
			//$this->dbh = null;
			$query = null;
		} catch(PDOException $e) {
			print "Error!: " . $e->getMessage();
		}    
		
		$sql = "SELECT 
				    id,
				    (select 
				            destination
				        from
				            locations
				        where
				            id = t.location) AS location,
				    tour,
				    description,
				    include,
				    notInclude,
				    itinerary,
				    recommendation,
				    (select 
				            group_concat(trim(pics))
				        from
				            galleries
				        where
				            tour_id = t.id
				        group by tour_id) as pics
				FROM
			    	tours t
				WHERE 
					id = ?";
					
		return $this->stmt($sql,$id);
	}
	
    private function stmt($sql,$param1)
    {
        try {
			$query = $this->dbh->prepare($sql);
		 	$query->bindParam(1, $param1, PDO::PARAM_STR, 2);
			$query->execute();
            if($query->rowCount()>0){
				$result = $query->fetchAll();
				return $this->html($result);
			}
			$this->dbh = null;
			$query = null;
        } catch(PDOException $e){
            print "Error!: " . $e->getMessage();
        }        
	}
	
	private function html($rows)
	{
		if(is_array($rows)) {
			$html = "";
		    foreach($rows as $row){
				$pic = explode( ',', $row['pics']);
				
				$html .= "<div class='title'>";
				$html .= 	"<h2>&nbsp;{$row['tour']}</h2>";
				$html .= "</div>";
				
				$html .= "<div class='slider-wrapper theme-default'>";
				$html .= 	"<div id='slider' class='nivoSlider'>";
				foreach($pic as $r){
					$html .= 	"<img src='".URL.$r."' data-thumb='".URL.$r."' alt='' />";					
				}
				$html .= 	"</div>";
				$html .= 	"<div id='htmlcaption' class='nivo-html-caption'>";
				$html .= 		"<strong>This</strong> is an example of a <em>HTML</em> caption with <a href='#'>a link</a>.";
				$html .= 	"</div>";
				$html .= "</div>";
				
				$html .= "<div class='info1'>";
				$html .= 	"<div class='subtitle'>{$row['tour']}<span class='count'>2 Nights</span></div>";
				$html .= 	"<div class='clear'></div>";
				$html .= 	"<div class='address'>Address: 70 Pier Street, Perth</div>";
				$html .= "</div>";
				
				$html .= "<div class='ratings'>";
				$html .= 	"<div class='uratings'><span class='text'>User Rating</span><div class='bullets three'></div><span class='countrates'>30 Users</span></div>";
				$html .= 	"<div class='sratings'><div class='stars five'></div><span class='countrates'>+ 10 Ratings</span> | <a href='#'>Write Review</a></div>";
				$html .= 	"<div class='clear'></div>";
				$html .= "</div>";
		
				$html .= "<div class='info2'>";
				$html .= 	"<div class='left'>";
				$html .= 		"<ul>";
				$html .= 			"<li class='room'>Standard Room: <span class='color'>2 Rooms With Bath</span></li>";
				$html .= 			"<li class='people'>1 - 2 People: <span class='color'>$44,00</span></li>";
				$html .= 			"<li class='wishlist'><a href='#'>Add to Wishlist</a></li>";
				$html .= 			"<li class='viewmap'><a class='md-trigger' data-modal='modal-viewmap' href='#'>View on Map</a></li>";
				$html .= 		"</ul>";
				$html .= 	"</div>";
				$html .= 	"<div class='right'>";
				$html .= 		"<div class='price'><span class='price dollar'>$</span>44,00</div>";
				$html .= 		"<div class='discount'>Get 10% Discount</div>";
				$html .= 	"</div>";
				$html .= 	"<div class='clear'></div>";
				$html .= "</div>";
				
				$html .= "<form action='bookinfo.html' method='POST'>";
				$html .= 	"<div class='bottom'>";
				$html .= 		"<div class='left'>";
				$html .= 			"<div class='promotext'>Enter Promotional Code: <span class='optional'>(Optional)</span> <a href='#'>What's this?</a></div>";
				$html .= 			"<input class='optcode' name='optcode' />";
				$html .= 			"<div class='clear'></div>";
				$html .= 		"</div>";
				$html .= 		"<div class='right'>";
				$html .= 			"<input type='submit' name='booknow' class='booknow' value='Book Now' />";
				$html .= 		"</div>";
				$html .= 		"<div class='clear'></div>";
				$html .= 	"</div>";
				$html .= "</form>";
				
				$html .= " <div class='desc'>";
				$html .= "	<h2>Description</h2>";
				$html .= "		<p>".html_entity_decode($row['description'])."</p>";
				$html .= "	<h2>Include</h2>";
				$html .= "		<p>".html_entity_decode($row['include'])."</p>";
				$html .= "	<h2>No Include</h2>";
				$html .= "		<p>".html_entity_decode($row['notInclude'])."</p>";
				$html .= "	<h2>Itinerary</h2>";
				$html .= "		<p>".html_entity_decode($row['itinerary'])."</p>";
				$html .= "	<h2>Recommendation</h2>";
				$html .= "		<p>".html_entity_decode($row['recommendation'])."</p>";				
				$html .= " </div>";
		    }
			return $html;
		} 
		
	}
			        
}