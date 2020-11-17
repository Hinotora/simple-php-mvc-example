<?php
/*
    File for application starting.
*/

$config = require 'config.php';
error_reporting($config['ERROR_MODE']);

$router = new Core\Router();
$router->run();