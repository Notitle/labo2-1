<?php

class History_DAO{
    private $dao;
    private $History_liste = array();
            
        public function __construct(MyPDO_DAO $mpdo) { 
        $this->pdo = $mpdo;
        
    }
    
    public function getHistoryList(){
        $sql = 'SELECT his_id, his_task_fk, his_time, his_description, his_comment, 
            his_state, his_user_fk, his_blocking_fk FROM history';
        $result = $this->pdo->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        foreach ( $result as $key => $row){
            $this->History_liste["his_id"] = new History_metier($row['his_id'], $row['his_task_fk'], $row['his_time'],
                    $row['his_description'], $row['his_comment'], $row['his_state'], $row['his_user_fk'], $row['his_blocking_fk']);
        }
        return $this->History_liste;
    }
}
?>


