<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $titulo; ?> | prikito blog</title>
	<link rel="stylesheet" href="/static/style/style.css">
</head>
<body>
    <?php
    include "partials/header.php";
    session_start();
    ?>

    <div id="content">
        <aside>
            <?php include "partials/nav.php"; ?>
        </aside>
        <main>
            <?php echo $content; ?>
        </main>
    </div>
</body>
</html>
