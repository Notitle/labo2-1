<?php

/**
 * Description of tache_metier
 *
 * @author sarah
 */
class Task_metier extends Generic_metiers implements Metier_interface {

    private $id;
    private $tache;
    private $date;
    private $etat;
    private $utilisateur;
    private $commentaire;

    /**
     * Function construct
     * @param string $id - id de la tache
     * @param string $tache - Description de la tache
     * @param string $date - Instant où la tâche est modifiée
     * @param string $etat - Etat de la tâche
     * @param string $utilisateur - Utilisateur de la tâche
     * @param string $commentaire - Commentaire sur la tâche
     */
    public function __construct($id, $tache, $date, $etat, $utilisateur, $commentaire) {
        $this->id = $id;
        $this->tache = $tache;
        $this->date = $date;
        $this->etat = $etat;
        $this->utilisateur = $utilisateur;
        $this->commentaire = $commentaire;
    }

    public function getId() {
        return $this->Id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTache() {
        return $this->tache;
    }

    public function setTache($tache) {
        $this->tache = $tache;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getEtat() {
        return $this->commentaire;
    }

    public function setEtat($comment) {
        $this->commentaire = $comment;
    }

    public function getUtilisateur() {
        return $this->commentaire;
    }

    public function setUtilisateur($comment) {
        $this->commentaire = $comment;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setCommentaire($comment) {
        $this->commentaire = $comment;
    }

    public function Popule($array) {
        foreach ($array as $cle => $prop) {
            $this->$cle = $prop;
        }
    }

}

?>
