<?php

/**
 * Classe reprennant categorie_metier
 *
 * @author sarah
 */
class categorie_metier extends Generic_metiers implements Metier_interface {

    private $categorie;
    private $id;

    public function __construct($categorie) {
        $this->categorie = $categorie;
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
