<?php

session_start();

use App\Config\Database;
use App\Models\Postagem;

if (!isset($_SESSION["usuario_id"])) {
    header("Location: /");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pdo = Database::getConnection();

    $postagem = new Postagem(titulo: $_POST["titulo"], corpo: $_POST["corpo"]);

    $stmt = $pdo->prepare(
        "INSERT INTO postagem (titulo, corpo) VALUES (:titulo, :corpo)",
    );

    $stmt->execute([
        "titulo" => $postagem->getTitulo(),
        "corpo" => $postagem->getCorpo(),
    ]);

    echo "postagem feita!";
    header("Location: /");
    die();
}
?>

<form action="" method="post" id="postagem-form">
    <div class="field">
        <label for="titulo">titulo</label>
        <input type="text" id="titulo" name="titulo" placeholder="titulo da postagem">
    </div>
    <div class="field">
        <label for="corpo">corpo</label>
        <textarea name="corpo" id="corpo" placeholder="corpo da postagem"></textarea>
    </div>
    <button>enviar</button>
</form>
