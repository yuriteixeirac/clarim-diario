<?php

namespace App\Controllers;

use function App\helpers\view;

class HomeController
{
    public function index(): string
    {
        return view("main", [
            "title" => "lalala",
        ]);
    }
}
