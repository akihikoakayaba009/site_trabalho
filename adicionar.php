

<head>
<title>Adicionar</title>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="estilo2.css">
</head>

<body> 
<div class="login">
<h1> Adicionar Usuário </h1>
<form method="post" action="adicionar.php">
   <div class="campos"></div> nome: <input type="text" name="nome"><br>
    Email: 
    <input type="email" name="email"><br>
    senha: 
    <input type="password" name="password" max="14" min><br>
    Informações Perfil</br>
    <textarea name="descricao_perfil" id="id" cols="30" rows="10"></textarea></p>
<div class="botao_enviar">
    <input type="submit" value="Adicionar" id="botao_enviar">
</div>
    </div>
</form>
</div>
</body
<?php
    include 'conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['password'];
        $Descricao_Perfil = $_POST['Descricao_Perfil'];

        $sql = 
        "INSERT INTO 
            usuarios (nome, email, senha, informacoes_perfil) 
        VALUES 
            ('$nome', '$email', '$senha', '$Descricao_Perfil')";
        if ($conexao->query($sql) === TRUE) {
            header("Location: login.php");
        } else {
            echo "Erro: " . $conexao->error;
        }
    }

    $conexao->close();
?>


