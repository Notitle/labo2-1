<?php

/**
 * Classe reprennant categorie_metier
 *
 * @author sarah
 */
class categorie_metier extends Generic_metiers implements Metier_interface {

    private $categorie;
    private $id;

    /**
     * Function construct
     * @param string $categorie - nom de la categorie
     * @param string $id - nom de l'id
     */
    public function __construct($categorie,$id) {
        $this->categorie = $categorie;
        $this->categorie= $id;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie($categ) {
        $this->categorie = $categ;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

}

?>
