<?php

namespace App\helpers;

function view(string $template, $data = [])
{
    extract($data);

    ob_start();
    include "../templates/{$template}.php";
    $content = ob_get_clean();

    ob_start();
    include "../templates/layout.php";
    return ob_get_contents();
}
