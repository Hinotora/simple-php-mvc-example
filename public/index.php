<?php
/*
    Define global variables to fast access to root and app folders.
*/
define("BASE_PATH", dirname(__DIR__).'/');
define("APP_PATH", BASE_PATH.'app/');

/*
    Autoload classes and namespaces (use composer update to create these files).
*/
require_once BASE_PATH.'vendor/autoload.php';

/*
    To start an application use dedicaded file in /app/boostrap.php.
*/
require_once APP_PATH.'bootstrap.php';