<?php
error_reporting(defined('E_STRICT') ? E_ALL | E_STRICT : E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

date_default_timezone_set('America/Cancun');

define('DB_HOST','localhost');
define('DB_NAME','auto531_testdblumaale');	
define('DB_USER','auto531_test');
define('DB_PASS','1NHah~T&y7ub');
define('DB_OPTIONS','SET NAMES utf8');

$Path = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';
define("URL",$Path);

?>