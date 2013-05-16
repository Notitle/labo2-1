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
    /**
     * select d'une tache via un id
     * @param type $id
     * @return type
     */
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
    /**
     * modif/ajout d'une tache
     * @param Task_metier $tm
     */
    public function setTask(Task_metier $tm){
        if ($tm->id != 0) {
            $tache = $this->PDO->prepare("UPDATE task SET tas_description = :b, tas_creation = :c, tas_phase_fk = :d WHERE tas_id = :a");
            $tache->execute(array(':a' => $tm->id, ':b' => $tm->tache,':c' => $tm->date, ':d' => $tm->phase));
            $this->task_liste[$tm->$id] = $tm;
        }
        
        else{
            $tache = $this->PDO->prepare("INSERT INTO task (tas_description, tas_creation, tas_phase_fk) VALUES (:b, :c, :d) WHERE pha_id = :a");
            $tache->execute(array(':a' => $tm->id, ':b' => $tm->tache,':c' => $tm->date, ':d' => $tm->phase));
            $this->task_liste[$tm->$id] = $tm;
        }
    }
    /**
     * suppression d'une tâche
     * @param type $id
     * @return string
     */
    public function deleteTask ($id){
         if(isset ($this->task_Liste[$id])){
             unset($this->task_Liste[$id]);
         }
         else{
             return "La tâche n'existe pas, Nom d'un chien ! Le capitaine Jérôme a encore bu trop de Whisky !!!!!!!!!!!!!!!!!! !";
         }
         $task=$this->PDO->prepare("DELETE FROM task WHERE tas_id=:a" );
         $task->execute(array(':a'=>$id));
    }
    /**
     * select d'une tache via l'objet phase
     * @param Phase_metier $phase
     * @return type
     */
    public function getTaskByPhase (Phase_metier $phase){
        $query='
            SELECT tas_id, tas_description, tas_creation, tas_phase_fk
            FROM task
            WHERE tas_phase_fk =:a';
        $result = $this->pdo->prepare($query);
        $result -> setFetchMode (PDO::FETCH_ASSOC);
        $result -> execute(array(":a"=>$phase->getId()));
        $return=array();
        foreach ($result as $key => $row){
            if(!isset($this->task_Liste[$row["tas_id"]])){
                $this->task_Liste[$row["tas_id"]]=new Task_metier($row["tas_id"],$row["tas_description"],$row["tas_creation"],$row["tas_phase_fk"]);
            }
            $return[]= $this->task_Liste[$row["tas_id"]];
        }
          return $return;
    }

}

?>

 	
