<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" href="static/style.css">
</head>
<body>
    <?php include "partials/header.php"; ?>
    <?php echo $content; ?>
    <?php include "partials/footer.php"; ?>
</body>
</html>
