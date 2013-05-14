<?php

/**
 * Classe reprennant commentaire_metier
 *
 * @author sarah
 */
class Commentaire_metier extends Generic_metiers implements Metier_interface {

    private $commentaire;
    private $utilisateur;
    private $date;
    private $tache;

    /**
     * Function construct
     * @param string $commentaire - commentaire
     * @param string $utilisateur - utilisateur ayant commenté
     * @param string $date - date du commentaire
     * @param string $tache - tache commentée
     */
    public function __construct($commentaire, $utilisateur, $date, $tache) {
        $this->commentaire = $commentaire;
        $this->utilisateur = $utilisateur;
        $this->date = $date;
        $this->tache = $tache;
        $this->validationArray = array(
            "commentaire" => array("required" => true,
            )
        );
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setCommentaire($comment) {
        // Passe dans le validateur et prend une exception si erreur
        try {
            $this->isDataValid("commentaire", $comment);
            $this->commentaire = $comment;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function getUtilisateur() {
        return $this->utilisateur;
    }

    public function setUtilisateur($user) {
        try {
            $this->idDataValid("utilisateur",$user);
            $this->utilisateur = $user;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        try {
            $this->isDataValid("date", $date);
            $this->date = $date;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function getTache() {
        return $this->tache;
    }

    public function setTache($tache) {
        try {
            $this->isDataValid("tache", $tache);
            $this->tache = $tache;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

}
?>