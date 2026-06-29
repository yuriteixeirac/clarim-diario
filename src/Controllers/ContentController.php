<?php

namespace App\Controllers;

use App\Config\Database;
use PDO;
use function App\helpers\view;

class ContentController
{
    public function registroRedirect(): string
    {
        return view("content/registrar-redirect", [
            "titulo" => "registrar",
        ]);
    }

    public function registrarPostagem(): string
    {
        return view("content/registrar-postagem", [
            "titulo" => "postagem",
        ]);
    }

    public function registrarMidia(): string
    {
        return view("content/registrar-midia", [
            "titulo" => "imagem",
        ]);
    }

    public function listarPostagens(): string
    {
        return view("content/postagem-list", [
            "titulo" => "postagens",
        ]);
    }

    public function detailPostagem(int $id): string
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("SELECT * FROM postagem WHERE id = :id");
        $stmt->execute([
            "id" => $id,
        ]);

        $postagem = $stmt->fetch(PDO::FETCH_ASSOC);

        return view("content/postagem-detail", [
            "titulo" => $postagem["titulo"],
            "postagem" => $postagem,
        ]);
    }

    public function listMidias(): string
    {
        return view("content/midia-list", [
            "titulo" => "midias",
        ]);
    }
}
