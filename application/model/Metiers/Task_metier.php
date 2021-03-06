<?php

/**
 * Description of tache_metier
 *
 * @author sarah
 */
class Task_metier extends Generic_metier
{

    private $id;
    private $tache;
    private $date;
    private $phase;
    private $etat;
    private $utilisateur;
    private $commentaire;
    private $history;
    private $DAO;

    /**
     * Function construct
     * @param string $id - id de la tache
     * @param string $tache - Description de la tache
     * @param string $date - Instant où la tâche est modifiée
     * @param string $etat - Etat de la tâche
     * @param string $utilisateur - Utilisateur de la tâche
     * @param string $commentaire - Commentaire sur la tâche
     */
    public function __construct($id, $tache, $date, $catID)
    {
        $this->setId($id);
        $this->setTache($tache);
        $this->setDate($date);
        $this->phase = Application::getDAOFactory()->getPhaseDao()->getPhaseById($catID);
        $this->history = Application::getDAOFactory()->gethistoryDao()->getHistoryByTask($this);

        $this->validationArray = array(
            "id" => array("required" => true, "type" => "string"),
            "tache" => array("required" => true, "type" => "string"),
            "date" => array("required" => true, "type" => "date"),
                /* "etat" => array("required" => true, "type" => "string"),
                  "utilisateur" => array("required" => true, "type" => "string"),
                  "commentaire" => array("type" => "string") */
        );
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTache()
    {
        return $this->tache;
    }

    public function setTache($tache)
    {
        $this->tache = $tache;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getEtat()
    {
        return $this->commentaire;
    }

    public function setEtat($comment)
    {
        $this->commentaire = $comment;
    }

    public function getHistory()
    {
        return $this->history;
    }

    public function getPhase()
    {
        return $this->phase;
    }
    
    public function save()
    {
        Application::getDAOFactory()->getTaskDao()->set($this);
    }

}

?>
