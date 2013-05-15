<?php

/**
 * Classe reprennant categorie_metier
 *
 * @author sarah
 */
class categorie_metier extends Generic_metier {

    private $categorie;
    private $id;
    private $parentId;
    private $validationArray;

    /**
     * Function construct
     * @param string $categorie - nom de la categorie
     * @param string $id - nom de l'id
     */
    public function __construct($categorie, $id) {
        $this->setCategorie($categorie);
        $this->setId($id);
        $this->validationArray = array(
            "categorie" => array("required" => true, "type" => "string"),
            "id" => array("required" => true, "type" => "integer")
        );
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie($categ) {
// Passe dans le validateur et prend une exception si erreur
        try {
            $this->isDataValid("categorie", $categ);
            $this->categorie = $categ;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        try {
            $this->isDataValid("id", $id);
            $this->id = $id;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

}

?>
