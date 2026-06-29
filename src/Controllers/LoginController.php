<?php

namespace App\Controllers;

use function App\helpers\view;

class LoginController
{
    public function login()
    {
        return view("auth/login", [
            "titulo" => "login",
        ]);
    }
}
