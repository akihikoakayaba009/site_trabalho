<?php

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT nome, email, senha, informacoes_Perfil FROM usuarios WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        echo "Nenhum usuário encontrado";
        exit;
    }

    $stmt->close();
} else {
    echo "ID não fornecido.";
    exit;
}

$conexao->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Usuário</title>
</head>
<body>

    <h1>Detalhes do Usuário</h1>

    <ul>
        <li><strong>Nome:</strong> <?php echo $usuario['nome']; ?></li>
        <li><strong>Email:</strong> <?php echo $usuario['email']; ?></li>
        <li><strong>Senha:</strong> <?php echo $usuario['senha']; ?></li>
        <li><strong>Informações do Perfil:</strong> <?php echo $usuario['informacoes_Perfil']; ?></li>
    </ul>

</body>
</html>
