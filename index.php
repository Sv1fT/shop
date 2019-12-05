<?php 

ini_set(('display errors'), 1);			//Включаем показ ошибок
error_reporting(E_ALL);


define('ROOT', dirname(__FILE__));
require_once ROOT.'/components/Autoload.php';
require_once ROOT.'/components/Router.php';
require_once ROOT.'/components/db.php';


$router = new Router;
$router -> run();