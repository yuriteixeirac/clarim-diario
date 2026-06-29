<?php

use App\Config\Database;

session_start();

$pdo = Database::getConnection();

$stmt = $pdo->query("SELECT * FROM postagem ORDER BY criado_em DESC");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

ob_start();
foreach ($results as $postagem) { ?>
    <a href="/postagens/<?php echo $postagem["id"]; ?>">
        <article>
            <div id="row">
                <h2><?php echo $postagem["titulo"]; ?></h2>
                <p><?php echo $postagem["criado_em"]; ?></p>
            </div>
            <p><?php echo $postagem["corpo"]; ?></p>
        </article>
    </a>
<?php }

$postagens = ob_get_clean();

echo $postagens;
