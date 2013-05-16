<?php

/**
 * Classe reprennant l'utilisateur_metier
 *
 * @author sarah
 */
class Utilisateur_metier extends Generic_metier
{

    private $identifiant;
    private $nom;
    private $prenom;
    private $password;
    private $email;
    private $group;

    /**
     * Function construct
     * @param string $identifiant - identifiant de l'user
     * @param string $nom - nom de l'user
     * @param string $prenom - prénom de l'user
     * @param string $password - password de l'user
     * @param string $email - email de l'user
     */
    public function __construct($identifiant = null, $prenom = null, $nom = null, $email = null, $password = null, $deleted = null, $group = null)
    {
        $this->setIdentifiant($identifiant);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setGroup($group);

        $this->validationArray = array(
            "identifiant" => array("required" => true, "type" => "string"),
            "nom" => array("required" => true, "type" => "string"),
            "prenom" => array("required" => true, "type" => "string"),
            "password" => array("required" => true, "type" => "string"),
            "email" => array("required" => true, "type" => "string")
        );
    }

    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    public function setIdentifiant($id)
    {
        // Passe dans le validateur et prend une exception si erreur
        try
        {
            $this->isDataValid("identifiant", $id);
            $this->identifiant = $id;
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($name)
    {
        try
        {
            $this->isDataValid("nom", $name);
            $this->nom = $name;
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        try
        {
            $this->isDataValid("prenom", $prenom);
            $this->prenom = $prenom;
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($pwd)
    {
        try
        {
            $this->isDataValid("password", $pwd);
            $this->password = $pwd;
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($mail)
    {
        try
        {
            $this->isDataValid("email", $mail);
            $this->email = $mail;
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function setGroup($group)
    {
        $this->group = Application::getDAOFactory()->getGroupDao()->getGroupById($group);
    }

    public function getTasks()
    {
        return Application::getDAOFactory()->getTaskDao()->getTasksByUser($this);
    }

}

?>
