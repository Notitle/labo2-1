<?php

/**
 * Classe reprennant commentaire_metier
 *
 * @author sarah
 */
class History_metier extends Generic_metier
{

    private $id;
    private $commentaire;
    private $description;
    private $state;
    private $utilisateurID;
    private $utilisateur;
    private $date;
    private $tacheID;
    private $tache;
    private $blockingTaskID;
    private $blockingTask;

    public function __construct($id, $com, $desc, $state, $user, $date, $tache, $blocking)
    {
        $this->setId($id);
        $this->setCommentaire($com);
        $this->setDescription($desc);
        $this->setState($state);
        $this->setUserID($user);
        $this->setDate($date);
        $this->setTaskID($tache);
        $this->setBlockingTaskID($blocking);
        $this->utilisateur = Application::getDAOFactory()->getUserDao()->getUserByLogin($this->utilisateurID);
        $this->tache=Application::getDAOFactory()->getTaskDao()->getTaskById($this->tacheID);
        $this->blockingTask=Application::getDAOFactory()->getTaskDao()->getTaskById($this->tacheID);
        
        $this->validationArray = array(
            "id" => array("required" => true, "type" => "integer"),
            "commentaire" => array("required" => true, "type" => "string"),
            "description" => array("required" => true, "type" => "string"),
            "state" => array("required" => true, "type" => "string"),
            "utilisateur" => array("required" => true, "type" => "integer"),
            "date" => array("required" => true),
            "tache" => array("required" => true, "type" => "string"),
            "state" => array("required" => true, "type" => "integer"),
            "blockingTache" => array("required" => true, "type" => "integer"),
        );
    }

    private function setId($data)
    {
        try
        {
            $this->isDataValid("id", $data);
            $this->id = $data;
        }
        Catch (Validateur_exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function setCommentaire($data)
    {
        try
        {
            $this->isDataValid("commentaire", $data);
            $this->commentaire = $data;
        }
        Catch (Validateur_exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function setDescription($data)
    {
        try
        {
            $this->isDataValid("description", $data);
            $this->description = $data;
        }
        Catch (Validateur_exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function setState($data)
    {
        try
        {
            $this->isDataValid("state", $data);
            $this->state = $data;
        }
        Catch (Validateur_exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function setUserID($data)
    {
        try
        {
            $this->isDataValid("utilisateur", $data);
            $this->utilisateurID = $data;
        }
        Catch (Validateur_exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function setDate($data)
    {
        try
        {
            $this->isDataValid("date", $data);
            $this->date = $data;
        }
        Catch (Validateur_exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function setTaskID($data)
    {
        try
        {
            $this->isDataValid("tache", $data);
            $this->tacheID = $data;
        }
        Catch (Validateur_exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function setBlockingTaskID($data)
    {
        try
        {
            $this->isDataValid("blockingTache", $data);
            $this->blockingTaskID = $data;
        }
        Catch (Validateur_exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function getUser(){
        return $this->utilisateur;
    }
    public function getTask(){
        return $this->tache;
    }
    public function getBlockingTask(){
        return $this->blockingTask;
    }
}

?>