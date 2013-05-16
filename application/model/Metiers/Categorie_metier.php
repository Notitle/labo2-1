<?php

/**
 * Classe reprennant categorie_metier
 *
 * @author sarah
 */
class Categorie_metier extends Generic_metier
{

    private $nom;
    private $id;
    private $parentCategory;

    /**
     * Function construct
     * @param string $categorie - nom de la categorie
     * @param string $id - nom de l'id
     */
    public function __construct($id, $nom, $parentid)
    {
        $this->setName($nom);
        $this->setId($id);
        $this->parentCategory = Application::getDAOFactory()->getCategoryDao()->getCategoryById($parentid);

        $this->validationArray = array(
            "categorie" => array("required" => true, "type" => "string"),
            "id" => array("required" => true, "type" => "integer")
        );
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setName($categ)
    {
// Passe dans le validateur et prend une exception si erreur
        try
        {
            $this->isDataValid("categorie", $categ);
            $this->nom = $categ;
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
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
        catch (Exception $e)
        {
            $e->getMessage();
        }
    }

}

?>
