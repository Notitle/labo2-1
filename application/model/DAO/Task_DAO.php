<?php
/**
 * Classe reprennant categorie_metier
 *
 * @author rodo/loic
 */
class Task_DAO
{

    private $dao;
    private $task_Liste = array();

    public function __construct(MyPDO_DAO $mpdo)
    { // connexion
        $this->pdo = $mpdo;
    }

    /**
     * Retourne toute la liste des taches
     * @return Array
     */
    public function getTaskList()
    { //liste des taches (fn get)
        $sql = 'Select tas_id, tas_description, tas_creation, tas_phase_fk from task'; //requete
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //tableau associatif dna sla cariable $stmt

        foreach ($stmt as $key => $row)
        { // boucle foreach pr parcourir le tableau associatif, utilisation de l'objet instancié à la classe task_metier avec les paramètres correspondants
            if (!isset($this->task_Liste[$row["tas_id"]]))
            {
                $this->task_Liste[$row["tas_id"]] = new Task_metier($row['tas_id'], $row['tas_description'], $row['tas_creation'], $row['tas_phase_fk']);       
            }
        }
        return $this->task_Liste; // !! ne pas oublier le return!! ;-)
    }

    public function getTaskById($id)
    {

        if (!isset($this->task_Liste[$id]))
        {

            $query = '
                    SELECT tas_id, tas_description, tas_creation, tas_phase_fk
                    FROM task
                    WHERE tas_id = :a';
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":a" => $id));
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //tableau associatif dna sla cariable $stmt
            $row = $stmt->fetch();
            $this->task_Liste[$id] = new Task_metier($row["tas_id"], $row["tas_description"], $row["tas_creation"], $row["tas_phase_fk"]);
        }
        return $this->task_Liste[$id];
    }
    
    
}

?>
