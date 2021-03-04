<?php

use Fhooe\Router\Router;

require "../vendor/autoload.php";

const DEBUG = true;
if (DEBUG) {
    echo "<br>WARNING: Debugging is enabled. Set DEBUG to false for production use in " . __FILE__;
    echo "<br>Connect via SSH and send tail -f /var/log/apache2/error.log";
    echo " to see errors not displayed in Browser<br><br>";
    error_reporting(E_ALL);
    ini_set('html_errors', '1');
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
}

$route = Router::getRoute("/code/fhooe-router-skeleton/public");

switch ($route) {
    case "GET /":
        require __DIR__ . "/../views/index.html";
        break;
    default:
        require __DIR__ . "/../views/404.html";
        break;
}