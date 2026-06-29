<?php

require "../vendor/autoload.php";

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\ContentController;

use App\Router;

$router = new Router();

$router->get("/", [HomeController::class, "index"]);

$router->get("/login", [LoginController::class, "login"]);
$router->post("/login", [LoginController::class, "login"]);

$router->get("/postagens", [ContentController::class, "listarPostagens"]);
$router->get("/postagens/{id}", [ContentController::class, "detailPostagem"]);

$router->get("/midias", [ContentController::class, "listMidias"]);

$router->get("/registrar", [ContentController::class, "registroRedirect"]);
$router->post("/registrar", [ContentController::class, "registroRedirect"]);

$router->get("/registrar/postagem", [
    ContentController::class,
    "registrarPostagem",
]);
$router->post("/registrar/postagem", [
    ContentController::class,
    "registrarPostagem",
]);

$router->get("/registrar/midia", [ContentController::class, "registrarMidia"]);
$router->post("/registrar/midia", [ContentController::class, "registrarMidia"]);

echo $router->dispatch($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
