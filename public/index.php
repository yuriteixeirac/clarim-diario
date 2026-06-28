<?php

require "../vendor/autoload.php";

use App\Controllers\HomeController;
use App\Controllers\LoginController;

use App\Router;

$router = new Router();

$router->get("/", [HomeController::class, "index"]);

$router->get("/login", [LoginController::class, "login"]);
$router->post("/login", [LoginController::class, "login"]);

echo $router->dispatch($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
