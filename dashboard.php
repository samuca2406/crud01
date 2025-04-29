<?php
include("conexao.php");
$sql = "SELECT * FROM usuarios";
$result = mysqli_query($conexao, $sql);
?>

<style>
.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
}

.table-container, .panel {
    flex: 1 1 48%;
}

@media (max-width: 768px) {
    .container {
        flex-direction: column;
        align-items: center;
    }

    .table-container, .panel {
        flex: 1 1 100%;
    }
}

.table-container {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

th {
    background-color: #f4f4f4;
}

.btn {
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    margin-right: 5px;
}

.btn-edit {
    background-color: #ffc107;
    color: #000;
}

.btn-delete {
    background-color: #dc3545;
    color: #fff;
}
</style>

<div class="container">
    <div class="table-container">
        <h2>Lista de Usuários</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['nome']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td>
<a class="btn btn-edit" href="editar.php?id=<?= $row['id']; ?>">Editar</a>
<a class="btn btn-delete" href="deletar.php?id=<?= $row['id']; ?>" onclick="return confirm('Tem certeza que deseja deletar este usuário?');">Deletar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
