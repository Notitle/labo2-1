<?php

/**
 * Classe reprennant commentaire_metier
 *
 * @author sarah
 */
class Commentaire_metier extends Generic_metiers implements Metier_interface {

    private $commentaire;
    private $utilisateur;

    /**
     * Function construct
     * @param string $commentaire - commentaire
     * @param string $utilisateur - utilisateur ayant commenté
     */
    
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

    public function setUtilisateur($user) {
        $this->utilisateur = $user;
    }

}

?>