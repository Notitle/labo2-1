<?php
/**
 * ET LES COMMENTAIRES Cest pour qui ? HEIN ? ON CHERCHE QUOI ? LES COMMENTS ??
 */
class Task_DAO {
    private $dao;
    private $task_Liste =array();
    
       public function __construct(MyPDO_DAO $mpdo) { // connexion
        $this->pdo = $mpdo;
        
    }
    
    public function getTaskList(){ //liste des taches (fn get)
        $sql = 'Select tas_id, tas_description, tas_creation, tas_phase_fk from task'; //requete
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //tableau associatif dna sla cariable $stmt
        
        foreach ( $stmt as $key => $row){ // bouble foreach pr parcourir le tableau associatif, utilisation de l'objet instancié à la classe task_metier avec les paramètres correspondants
            $this->task_Liste[$row["tas_id"]] = new Task_metier($row['tas_id'], $row['tas_description'], $row['tas_creation'], $row['tas_phase_fk']);            
            
        }
        return $this->task_Liste; // !! ne pas oublier le return!! ;-)
    }
}
?>
