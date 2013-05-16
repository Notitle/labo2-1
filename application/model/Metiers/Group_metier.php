<?php

class Group_metier extends Generic_metier
{

    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->setId($id);
        $this->setName($name);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}

?>
