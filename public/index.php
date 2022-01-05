<?php

declare(strict_types=1);

use Fhooe\Router\Router;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;
use Utilities\Utilities;
use Exercises\Login;
use Exercises\Register;
use Exercises\Product;

require "../vendor/autoload.php";

session_start();

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
        "auto_reload" => true,
        "debug" => true
    ]
);
$twig->addFunction(new TwigFunction("url_for", [Router::class, "urlFor"]));
$twig->addFunction(new TwigFunction("get_base_path", [Router::class, "getBasePath"]));
$twig->addExtension(new \Twig\Extension\DebugExtension());

if (isset($_SESSION)) {
    $twig->addGlobal("_session", $_SESSION);
}

// Set a base path if your code is not in your server's document root.
$router->setBasePath("/code/fhooe-router-skeleton/public");

// Set a 404 callback that is executed when no route matches.
$router->set404Callback(function () {
    require __DIR__ . "/404.php";
});

$router->get("/", function () use ($twig) {
    $twig->display("index.html.twig");
});

$router->get("/form", function () {
    require __DIR__ . "/../views/form.php";
});

$router->post("/form", function () {
    require __DIR__ . "/../views/form.php";
});

$router->get("/twigform", function () use ($twig) {
    $twig->display("twigform.html.twig");
});

$router->post("/twigformresult", function () use ($twig) {
    $twig->display("twigformresult.html.twig", ["nameInput" => $_POST["nameInput"]]);
});

$router->get("/normalhtml", function() {
    require __DIR__ . "/../views/normalhtml.html";
});

$router->get("/imprint", function () use ($twig) {
    // TODO Replace the text in $this->imprint with a imprint of your own using valid HTML5 syntax
    // TODO Use string operator .= or heredoc for concatenating the lines
    /*
     * For a small site the imprint has to contain
     * name/company name
     * purpose of the site
     * address of the owner of the site
     */

    // $imprint = "<p> Place the requested Imprint here </p>";
    //
    $imprint = <<<IMPRINT
    <pre class="important"> 
    Distribution of My Best Pictures
    Main Road 1 
    1234 Timbuktu 
    Mali</pre>
    IMPRINT;
    //*/
    $twig->display("imprint.html.twig", ["imprint" => $imprint]);
});

$router->get("/register", function () use ($twig) {
    $twig->display("register.html.twig");
});

$router->post("/register", function () use($twig) {
    $register = new Register($twig);
    $register->isValid();
});

$router->get("/login", function () use ($twig) {
    $twig->display("login.html.twig");
});

$router->post("/login", function () use($twig) {
    $login = new Login($twig);
    $login->isValid();
});

$router->get("/logout", function () use($twig) {
    $_SESSION = [];
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), "", time() - 86400, "/");
    }
    session_destroy();
    $redirect = Router::urlFor("GET /");
    Utilities::redirectTo($redirect);
});

$router->get("/product", function () use ($twig) {
    $_SESSION['redirect']="/product";
    if (!isset($_SESSION['isloggedin']) || $_SESSION['isloggedin'] !== Utilities::generateLoginHash()) {
        // Use this method call to enable login protection for this page
        Utilities::redirectTo(Router::urlFor("GET /login"));
    }
    $product = new Product($twig);
    $productCategory = $product->fillProductCategory();
    $twig->display("product.html.twig", ["productCategory" => $productCategory]);
});

$router->post("/product", function () use($twig) {
    $product = new Product($twig);
    $product->isValid();
});

// Run the router to get the party started.
$router->run();
