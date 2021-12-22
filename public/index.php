<?php

declare(strict_types=1);

use Fhooe\Router\Router;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

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

// Create a monolog instance for logging in the skeleton. Pass it to the router to receive its log messages too.
$logger = new Logger("skeleton-logger");
$logger->pushHandler(new StreamHandler(__DIR__ . "/../logs/router.log"));
$router->setLogger($logger);

// Create a new twig instance for advanced templates.
$twig = new Environment(
    new FilesystemLoader("../views"),
    [
        "cache" => "../cache",
        "auto_reload" => true
    ]
);
$twig->addFunction(new TwigFunction("url_for", [Router::class, "urlFor"]));
$twig->addFunction(new TwigFunction("get_base_path", [Router::class, "getBasePath"]));

// Set a base path if your code is not in your server's document root.
$router->setBasePath("/code/fhooe-router-skeleton/public");

// Set a 404 callback that is executed when no route matches.
$router->set404Callback(function () {
    require __DIR__ . "/../views/404.php";
});

// Define your routes with the get() and post() methods.
$router->get("/", function () {
    require __DIR__ . "/../views/index.html";
});

$router->get("/form", function () {
    require __DIR__ . "/../views/form.php";
});

$router->post("/formresult", function () {
    require __DIR__ . "/../views/formresult.php";
});

$router->get("/twigform", function () use ($twig) {
    $twig->display("twigform.html.twig");
});

$router->post("/twigform", function () use ($twig) {
    $twig->display("twigform.html.twig", ["emailInput" => $_POST["emailInput"]]);
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
        require __DIR__ . "/../views/404.php";
        break;
}*/
