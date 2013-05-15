<?php
/**
 * Description of Phase_DAO
 *
 * @author Rodo/sarah
 */
class Group_DAO{
    /**
     *
     * @var tableau des groupes Group_liste 
     */
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
    
        public function getGroupById($id){

        if (!isset($this->Group_liste[$id]))
        {

            $query = '
                    SELECT *
                    FROM group
                    WHERE gro_id = :a';
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":a" => $id));
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //tableau associatif dna sla cariable $stmt
            $row = $stmt->fetch();
            $this->Group_liste[$id] = new Groupe_metier($row['gro_id'], $row['gro_name']);
        }
        return $this->Group_liste[$id];
    }

}

?>
