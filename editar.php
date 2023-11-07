<?php

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $descricao_perfil = $_POST['informacoes_perfil'];

    $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ?, informacoes_perfil = ? WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssi", $nome, $email, $senha, $descricao_perfil, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("location: listar.php?id=" . $id); // Redireciona para listar.php com o ID atualizado
    } else {
        echo "Nenhuma alteração realizada ou ID não encontrado: " . $conexao->error;
    }
    

    $stmt->close();
}
else {
    $sql = "SELECT id, nome, email, senha, informacoes_perfil FROM usuarios";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
        $usuarios = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Nenhum usuário encontrado";
        exit;
    }
}

$conexao->close();

?>

<form method="post" action="editar.php">
    <label for="selecionar_id">Selecione o ID do Usuário:</label>
    <select name="id" id="selecionar_id">
        <?php
        foreach ($usuarios as $usuario) {
            echo "<option value='" . $usuario['id'] . "'>" . $usuario['id'] . "</option>";
        }
        ?>
    </select><br>
    Nome: <input type="text" name="nome"><br>
    Email: <input type="text" name="email"><br>
    Senha: <input type="text" name="senha"><br>
    Informações do perfil: <input type="text" name="informacoes_perfil"><br>
    <input type="submit" value="Salvar">
</form>

