<?php

require 'config.php';
require 'dao/TableDaoSQL.php';



/* $info = []; */
$id_task = filter_input(INPUT_GET, 'id_task');
$id_user = filter_input(INPUT_GET, 'id_user');

if ($id_task && $id_user) {
    $sql = $conn->prepare("SELECT * FROM tbl_tasks WHERE id_task = :id_task AND id_user = :id_user");
    $sql->bindValue(':id_task', $id_task);
    $sql->bindValue(':id_user', $id_user);
    $sql->execute();

    if ($sql->rowCount() !== 0) {

        $info = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("location: " . $base);
        exit;
    }
} else {
    header("location: " . $base);
    exit;
}

?>


<!-- <h1>Editar</h1>

<form action="editTask_action.php" method="POST">
    <input type="hidden" name="id_task" value ="<?= $info['id_task'] ?>">
    <label>
        Tarefa: <br>
        <input type="text" name="desc_task" value="<?= $info['desc_task'] ?>">
    </label><br><br>

    <input type="submit" value="Salvar">
</form> -->
