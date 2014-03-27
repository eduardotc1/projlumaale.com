<?php
date_default_timezone_set('America/Cancun');
define('__X__',true);
$Path = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';


function getSubString($string, $length=NULL)
{
    if ($length == NULL)
        $length = 50;
    $stringDisplay = substr(strip_tags($string), 0, $length);
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= ' ...';
    return $stringDisplay;
}

if ($_SERVER['SERVER_ADDR'] == '192.168.1.102' || $_SERVER['SERVER_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_ADDR'] == '192.168.1.110') {
	define('DBHOST', 'localhost');
	define('DBNAME', 'gaytravel');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('LANG', 'ES');
	}else{
	define('DBHOST', 'localhost');
	define('DBNAME', 'gaytravel');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('LANG', 'ES');
		}
	




?>