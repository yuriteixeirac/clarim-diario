<?php

require "../vendor/autoload.php";

use App\Controllers\HomeController;
use App\Router;

$router = new Router();

$router->get("/", [HomeController::class, "index"]);

echo $router->dispatch($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
