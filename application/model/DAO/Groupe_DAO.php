<?php

class Group_DAO{
    private $dao;
    private $Group_liste = array();
            
        public function __construct(MyPDO_DAO $mpdo) { 
        $this->pdo = $mpdo;
        
    }
    
    public function getGroupList(){
        $sql = 'SELECT gro_id, gro_name FROM group';
        $result = $this->pdo->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        foreach ( $result as $key => $row){
            $this->Group_liste['gro_id'] = new Group_Metier($row['gro_id'], $row['gro_name']);
        }
        return $this->Group_liste;
    }
}

?>
