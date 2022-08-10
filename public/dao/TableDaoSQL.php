<?php 

require_once 'models/Table.php';

class TableDaoSQL implements TableDAO{
    private $conn;

    public function __construct(PDO $driver) {
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
    public function getTable($id_user){
        $array = [];

        $sql = $this->conn->prepare("SELECT * FROM tbl_tasks WHERE id_user = :id_user");

        if($qtde = $this->conn->prepare("SELECT COUNT(*) FROM tbl_tasks WHERE id_user = :id_user") > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            $array = $this->_getTableToObject($data);

            return $array;
        }        
        
    }   
    private function _getTableToObject($id_user){
            
    }
}