<?php
/**
 * Frontcontroller to bootstrap essentials and return a response.
 */
define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/../vendor/mos/anax"));
define("ANAX_APP_PATH", __DIR__ . "/..");

if (!is_readable(__DIR__ . "/../vendor/autoload.php")) {
    die("Missing vendor, did you do composer update?");
}
require __DIR__ . "/../vendor/autoload.php";

$di  = new \Anax\DI\CDIFactoryDefault();
$app = new \Anax\App\CAnaxDefault($di);

$app->session();
$app->loadRoutes();
$app->router->handle();
$app->theme->render();
