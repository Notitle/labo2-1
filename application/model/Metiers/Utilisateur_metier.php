<?php
/**
 * Classe reprennant l'utilisateur_metier
 *
 * @author sarah
 */
class Utilisateur_metier extends Generic_metiers implements Metier_interface {

    private $identifiant;
    private $nom;
    private $prenom;
    private $password;
    private $email;

    public function __construct($identifiant = null, $nom = null, $prenom = null, $password = null, $email = null) {
        $this->identifiant = $identifiant;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->password = $password;
        $this->email = $email;
    }

    public function getIdentifiant() {
        return $this->identifiant;
    }

    public function setIdentifiant($id) {
        $this->identifiant = $id;
    }

    
    public function getNom() {
        return $this->nom;
    }

    public function setNom($name) {
        $this->identifiant = $name;
    }

    
    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($pwd){
        $this->password=$pwd;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($mail){
        $this->email=$mail;
    }
}

?>
