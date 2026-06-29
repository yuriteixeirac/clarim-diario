<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: /login");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];

    header("Location: /registrar/$tipo");
    die();
}
?>

<form action="" method="post">
    <label for="tipo">tipo de conteúdo</label>
    <select name="tipo" id="tipo">
        <option value="postagem">postagem</option>
        <option value="midia">mídia</option>
    </select>
    <button type="submit">continuar</button>
</form>
