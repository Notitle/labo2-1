<?php

class Phase_metier
{

    private $id;
    private $name;
    private $project;

    public function __construct($id, $name, $projectID)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setProject($projectID);
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

    public function getProject()
    {
        return $this->project;
    }

    public function setProject($projectID)
    {
        $this->project = Application::getDAOFactory()->getProjectDao()->getProjectById($projectID);
    }

}

?>
