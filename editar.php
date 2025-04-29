<?php include 'conexao.php'; ?>
<?php
$id = $_GET['id'];
$res = $conexao->query("SELECT * FROM usuarios WHERE id=$id");
$row = $res->fetch_assoc();
?>

<h2>Editar Usuário</h2>
<form method="POST">
    Nome: <input type="text" name="nome" value="<?= $row['nome'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $row['email'] ?>"><br>
    <button type="submit">Atualizar</button>
</form>

<?php
if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $conexao->query("UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id");
    header("Location: dashboard.php");
}
?>
