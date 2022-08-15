<?php

require_once 'models/Table.php';

class TableDaoSQL implements TableDAO
{
    private $conn;

    public function __construct(PDO $driver)
    {
        $this->conn = $driver;
    }
    public function insert(Table $t)
    {

        $sql = $this->conn->prepare("INSERT INTO tbl_tasks (desc_task, date_task, id_user) VALUES (:desc_task, :date_task, :id_user)");

        $sql->bindValue(':desc_task', $t->desc_task);
        $sql->bindValue(':date_task', $t->date_task);
        $sql->bindValue(':id_user', $t->id_user);
        $sql->execute();
    }

    public function getListInfo($id)
    {
        $listData = $this->conn->prepare("SELECT * FROM tbl_tasks WHERE id_user = :id_user");
        $listData->bindParam(':id_user', $id);
        $listData->execute();



        if ($listData->rowCount() !== 0) {
            $data = $listData->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $item) {

                $t = new Table();
                $t->id_task = $item['id_task'];
                $t->desc_task = $item['desc_task'];
                $t->date_task = $item['date_task'];
                $t->id_user = $item['id_user'];
                $array[] = $t;
            }
        }
        return $array;
    }

    public function delete($id_task, $id_user)
    {

        $sql = "DELETE FROM tbl_tasks WHERE id_task = :id_task AND id_user = :id_user ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id_task', $id_task);
        $stmt->bindValue(':id_user', $id_user);
        $stmt->execute();
    }

    public function update(Table $t)
    {
        $sql = $this->conn->prepare('UPDATE tbl_tasks SET desc_task = :desc_task WHERE id_task = :id_task');
        $sql->bindValue(':id_task', $t->getIdTask());
        $sql->bindValue(':desc_task', $t->getDescTask());
        $sql->execute();
        

    }
}
