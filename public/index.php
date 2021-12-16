<?php

declare(strict_types=1);

use Fhooe\Router\Router;

require "../vendor/autoload.php";

/**
 * Turn on debugging output to get more useful error messages while developing.
 */
const DEBUG = false;
if (DEBUG) {
    echo "<br>WARNING: Debugging is enabled. Set DEBUG to false for production use in " . __FILE__;
    echo "<br>Connect via SSH and send tail -f /var/log/apache2/error.log";
    echo " to see errors not displayed in Browser<br><br>";
    error_reporting(E_ALL);
    ini_set("html_errors", "1");
    ini_set("display_errors", "1");
    ini_set("display_startup_errors", "1");
}

/**
 * Instantiated Router invocation. Create an object, define the routes and run it.
 */
// Create a new Router object.
$router = new Router();

// Set a base path if your code is not in your server's document root.
$router->setBasePath("/code/fhooe-router-skeleton/public");

// Set a 404 callback that is executed when no route matches.
$router->set404Callback(function () {
    require __DIR__ . "/../views/404.html";
});

// Define your routes with the get() and post() methods.
$router->get("/", function () {
    require __DIR__ . "/../views/index.html";
});

$router->get("/form", function () {
    require __DIR__ . "/../views/form.php";
});

$router->post("/form", function () {
    require __DIR__ . "/../views/form.php";
});

// Run the router to get the party started.
$router->run();

/**
 * Static Router invocation. Get the route and handle it here yourself.
 */
/*$route = Router::getRoute("/code/fhooe-router-skeleton/public");

switch ($route) {
    case "GET /":
        require __DIR__ . "/../views/index.html";
        break;
    case "GET /form":
    case "POST /form":
        require __DIR__ . "/../views/form.php";
        break;
    default:
        require __DIR__ . "/../views/404.html";
        break;
}*/
