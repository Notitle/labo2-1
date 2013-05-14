<?php

/**
 * Classe reprennant commentaire_metier
 *
 * @author sarah
 */
class utilisateur_metier extends Generic_metiers implements Metier_interface {

    private $commentaire;
    private $utilisateur;

    public function __construct($commentaire, $utilisateur) {
        $this->commentaire = $commentaire;
        $this->utilisateur = $utilisateur;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setCommentaire($comment) {
        $this->commentaire = $comment;
    }

    public function getUtilisateur() {
        return $this->utilisateur;
    }

    public function setIdentifiant($user) {
        $this->utilisateur = $user;
    }

}

?>
