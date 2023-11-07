<?php
include 'conexao.php';

$sql = "SELECT id, nome, email, senha, informacoes_perfil FROM usuarios";
$result = $conexao->query($sql);
?>

<h1>usuarios</h1>
<a href="adicionar.php">Adicionar Novo usuário</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>nome</th>
            <th>email</th>
            <th>senha </th>
            <th>informacoes_perfil</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["senha"] . "</td>";
                echo "<td>" . $row["informacoes_perfil"] . "</td>";

                echo "<td><a href='editar.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Sem tarefas</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
$conexao->close();
?>
