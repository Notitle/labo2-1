<?php

class Project_DAO{
    private $dao;
    private $Project_liste = array();
            
        public function __construct(MyPDO_DAO $mpdo) { 
        $this->pdo = $mpdo;
        
    }
    
    public function getProjectList(){
        $sql = 'SELECT pro_id, pro_name, pro_category_fk, pro_deleted FROM project';
        $result = $this->pdo->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        foreach ( $result as $key => $row){
            $this->Project_liste["pro_id"] = new History_metier($row['his_id'], $row['pro_name'], $row['pro_category_fk'], $row['pro_deleted']);
        }
        return $this->Project_liste;
    }
}

?>
