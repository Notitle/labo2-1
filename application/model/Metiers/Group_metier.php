<?php

/**
 * Représente un groupe d'utilisateurs
 * @author loic
 */
class Group_metier extends Generic_metier
{

    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->addValidationRule("id", array("type" => "integer", "required" => true));
        $this->addValidationRule("name", array("type" => "string", "required" => true));
        $this->setId($id);
        $this->setName($name);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        try
        {
            $this->isDataValid("id", $id);
            $this->id = $id;
        }
        catch (Validateur_exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        try
        {
            $this->isDataValid("name", $name);
            $this->name = $name;
        }
        catch (Validateur_exception $e)
        {
            echo $e->getMessage();
        }
    }

}

?>
