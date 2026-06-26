<?php

require "../vendor/autoload.php";

use App\Router;

$router = new Router();

$router->get("/", function () {
    ob_start();

    echo "Hello, world!<br>";
    echo "Teste de router...";

    return ob_get_contents();
});

$router->dispatch($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
