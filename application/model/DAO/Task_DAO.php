<?php

class Task_DAO {
    private $dao;
    private $task_Liste =array();
    
       public function __construct(MyPDO_DAO $mpdo) {
        $this->pdo = $mpdo;
        
    }
    
    public function getTaskList(){
        $sql = 'Select tas_id as Num, tas_description as description from task';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        foreach ( $stmt as $key => $row){
            $this->task_Liste[$row["id"]] = new Task_metier();
            $this->task_Liste[$row["id"]]->Popule($row);
        }
    }
}
?>
