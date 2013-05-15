<?php

class Comments_DAO {
    private $dao;
    private $task_Liste =array();
    
       public function __construct(MyPDO_DAO $mpdo) {
        $this->pdo = $mpdo;
        
    }
    
    public function getCommentsList(){
        $sql = 'Select tas_id, tas_description, tas_creation, tas_phase_fk from task';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        foreach ( $stmt as $key => $row){
            $this->task_Liste[$row["tas_id"]] = new Task_metier($row['tas_id'], $row['tas_description'], $row['tas_creation'], $row['tas_phase_fk']);            
            
        }
        return $this->task_Liste;
    }
    

    
    
}
?>



