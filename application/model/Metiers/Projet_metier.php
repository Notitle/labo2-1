<?php

class Projet_metier
{

    private $id;
    private $name;
    private $parentCategory;
    private $deleted;

    public function __construct($id, $name, $parentID, $deleted)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setParentCategory($parentID);
        $this->setDeleted($deleted);
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

    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    public function setParentCategory($parentCategory)
    {
        $this->parentCategory = Application::getDAOFactory()->getCategoryDao()->getCategoryById($parentCategory);
    }

    public function getDeleted()
    {
        return $this->deleted;
    }

    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

}

?>
