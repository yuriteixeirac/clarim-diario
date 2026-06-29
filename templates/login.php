<?php
use App\Config\Database;

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pdo = Database::getConnection();

    $stmt = $pdo->prepare(
        "SELECT id, password FROM usuario WHERE username = :username",
    );

    $stmt->execute(["username" => $_POST["username"]]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($_POST["password"], $usuario["password"])) {
        $_SESSION["usuario_id"] = $usuario["id"];

        header("Location: /");
        exit();
    } else {
        echo "not ok cabra";
    }
}
?>

<form action="" method="post" id="login-form">
    <div class="field">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="Insira nome de usuário...">
    </div>
    <div class="field">
        <label for="password">Senha</label>
        <div>
            <input id="password" name="password" type="password" placeholder="********">
            <button type="button" onclick="olharSenha()">⚈ ̫ ⚈</button>
        </div>
    </div>
    <button type="submit">Enviar</button>
</form>

<script>
  function olharSenha() {
    const senhaField = document.querySelector("input[name='password']");
    if (senhaField.type == "password") {
      senhaField.type = "text";
    } else if (senhaField.type == "text") {
      senhaField.type = "password";
    }
  }
</script>
