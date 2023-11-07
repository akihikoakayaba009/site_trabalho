<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo2.css">
    <title>Tela de Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label for="email">Email:</label>
        <input type="text" name="email" required><br><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
<?php
include 'conexao.php';

// Verifique se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha dados do formulário
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta para verificar as credenciais do usuário (substitua com sua estrutura de tabela)
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";

    $result = $conexao->query($sql);

    // Verifique se as credenciais são válidas
    if ($result->num_rows == 1) {
        // Credenciais válidas, redirecione o usuário para a página central (pagina_central.php)
        header("Location: pagina_central.html");
    } else {
        // Credenciais inválidas, redirecione o usuário para a página de cadastro (adicionar.php)
        header("Location: adicionar.php");
    }
    // Feche a conexão com o banco de dados
    $conexao->close();
}
?>