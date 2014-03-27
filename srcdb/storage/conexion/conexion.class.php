<?php
class Conexion
{
	private static $_instance = NULL;
	private $dns;
	private $user;
	private $password;
	private $options;
	private $dbh;
		
    /* La función construct es privada para evitar que el objeto pueda ser creado mediante new */
    private function __construct(){
		$this->setConexion();
		$this->conectar();
    }
	
	public static function singletonConexion()
	{
		if (!(self::$_instance instanceof self)){
			self::$_instance=new self();
		}
		return self::$_instance;
	}
	
	// Evita que el objeto se pueda clonar
	private function __clone()
	{
		trigger_error("Operación Invalida: en ". get_class($this) ." class.", E_USER_ERROR );
	}
		
    /* Método para establecer los parámetros de la conexión */
    private function setConexion(){
		include_once 'conf.class.php';
		$conf = Conf::singletonConexion();
		$this->dns = $conf->getDnsDB();
		$this->user = $conf->getUserDB();
		$this->password = $conf->getPassDB();
		$this->options = $conf->getOptionsDB();	 
    }
	
    /* Realiza la conexión a la base de datos. */
    private function conectar()
	{		
		try {
			$this->options = array(PDO::MYSQL_ATTR_INIT_COMMAND => $this->options);
			$this->dbh = new PDO($this->dns, $this->user, $this->password, $this->options);
			$this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			throw new RestException(501, 'MySQL: ' . $e->getMessage());
		}
    }
	
    public function prepare($sql)
    {
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $this->dbh->prepare($sql);
    }
	
    public function query($sql)
    {
		return $this->dbh->query($sql);
    }
		
}
