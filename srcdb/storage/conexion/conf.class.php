<?php
//error_reporting(defined('E_STRICT') ? E_ALL | E_STRICT : E_ALL);
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//date_default_timezone_set('America/Cancun');
class Conf {
	private static $_instance = NULL;
	private $_dns;
    private $_host;
    private $_database;
    private $_user;
    private $_password;
	private $_options;
	    
    private function __construct()
	{
		include_once 'config.inc.php';
        $this->_dns="mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $this->_user=DB_USER;
        $this->_password=DB_PASS;
        $this->_options=DB_OPTIONS;
    }
    
	private function __clone()
	{
		trigger_error("Operación Invalida: No puedes clonar una instancia de ". get_class($this) ." class.", E_USER_ERROR );
	}
		
	public static function singletonConexion()
	{
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function getDnsDB()
	{
        $var = $this->_dns;
        return $var;
    }
	
    public function getUserDB()
	{
        $var = $this->_user;
        return $var;
    }
    
    public function getPassDB()
	{
        $var = $this->_password;
        return $var;
    }

    public function getOptionsDB()
	{
        $var = $this->_options;
        return $var;
    }

	function __wakeup()
    {
        throw new Exception("No se puede serializar el objeto Singleton", 1);
    }
     
    function __sleep()
    {
        throw new Exception("No se puede serializar el objeto Singleton", 1);
    }
}
?>