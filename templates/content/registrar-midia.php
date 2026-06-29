<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: /");
    die();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $targetDir = __DIR__ . "/../../public/static/imgs/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $nomeOriginal = $_FILES["midia"]["name"];
    $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);

    $nomeArquivo = uniqid("midia_", true) . "." . $extensao;

    $targetFile = $targetDir . $nomeArquivo;

    if (!move_uploaded_file($_FILES["midia"]["tmp_name"], $targetFile)) {
        echo "erro ao mover arquivo";
        exit();
    }

    echo "upload realizado com sucesso";
}
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="field">
        <label for="midia">midia</label>
        <input type="file" name="midia" id="midia">
    </div>
    <button>enviar</button>
</form>
