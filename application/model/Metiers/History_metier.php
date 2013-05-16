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

 

    /**
     * Remplis l'objet
     * @param type $id
     * @param type $com
     * @param type $desc
     * @param type $state
     * @param type $user
     * @param type $date
     * @param type $tache
     * @param type $blocking
     */
    public function rempli($id, $tache, $date, $desc, $com, $state, $user, $blocking)
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
        $this->tache = Application::getDAOFactory()->getTaskDao()->getTaskById($this->tacheID);
        $this->blockingTask = Application::getDAOFactory()->getTaskDao()->getTaskById($this->blockingTaskID);
    }

    private function setId($data)
    {

        $this->id = $data;
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

    public function getUser()
    {
        return $this->utilisateur;
    }

    public function getTask()
    {
        return $this->tache;
    }

    public function getBlockingTask()
    {
        return $this->blockingTask;
    }

}

?>