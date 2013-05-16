<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_DAO
 *
 * @author sarah
 */
class User_DAO{
    private $dao;
    private $user_liste=array();
    
    public function __construct(MyPDO_DAO $mpdo) {
        $this->pdo=$mpdo;
    }
    public function getUserList(){
        $sql= 'SELECT use_login, use_firstname, use_lastname, use_email, 
               use_password, use_deleted, use_fk_group FROM user';
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        foreach ($stmt as $key => $row){
            $this->user_liste[$row["use_login"]]=new Utilisateur_metier(
                    $row['use_login'],$row['use_firstname'],$row['use_lastname'],
                    $row['use_email'],$row['use_password'],$row['use_deleted'],$row['use_fk_group']);
        }
        return $this->user_liste;   
    }
    
    /**
     * select d'un utilisateur via son login
     * @param type $login
     * @return type
     */
    public function getUserByLogin($login){
        if(!isset($this->user_liste[$login])){
            $query='SELECT * FROM user where use_login=:a';
            $stmt=$this->pdo->prepare($query);
            $stmt->execute(array(":a"=>$login));
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row=$stmt->fetch();
            $this->user_liste[$login]=new Utilisateur_metier(
                    $row['use_login'],$row['use_firstname'],$row['use_lastname'],
                    $row['use_email'],$row['use_password'],$row['use_deleted'],$row['use_fk_group']);
        }
        return $this->user_liste[$login];
    }
    /**
     * modif d'un utilisateur / insert s'il n'existe pas 
     * @param Utilisateur_metier $um
     */
    public function setUser(Utilisateur_metier $um) {
        if ($um->identifiant != 0) {//changer
            $utilisateur = $this->PDO->prepare("UPDATE user SET use_login=:a, use_firstname=:p, use_lastname=:l, use_email=:e, use_password=:p WHERE use_login=:a");
            $utilisateur->execute(array(':a' => $um->identifiant, ':f' => $um->prenom, ':l' => $um->nom, ':e' => $um->email, ':p' => $um->password));
            $this->user_liste[$um->identifiant] = $um;
        } else {
            $utilisateur = $this->PDO->prepare("INSERT INTO category (use_login,use_firstname,use_lastname,use_email,use_password) VALUES (:a,:f,:l,:e,:p) WHERE use_login=:a");
            $utilisateur->execute(array(':a' => $um->identifiant, ':f' => $um->prenom, ':l' => $um->nom, ':e' => $um->email, ':p' => $um->password));
            $this->user_liste[$um->identifiant] = $um;
        }
    }
    /**
     * suppression d'un utilisateur -> update de use_deleted
     * @param type $login
     * @return string
     */
    public function deleteUser ($login){ 
         if(isset ($this->user_liste[$login])){
             unset($this->user_liste[$login]);
         }
         else{
             return "L'utilisateur n'existe pas !";
         }
         $utilisateur=$this->PDO->prepare("UPDATE user SET use_deleted=1 WHERE use_login=:a" );
         $utilisateur->execute(array(':a'=>$login));
    }
    /**
     * select d'un user via un objet
     * @param Phase_metier $phase
     * @return type
     */
    public function getUserByHistory (Phase_metier $phase){
        $query='
            SELECTuse_login, use_firstname, use_lastname, use_email, use_password, use_deleted, use_fk_group
            FROM task
            WHERE tas_phase_fk =:a';
        $result = $this->pdo->prepare($query);
        $result -> setFetchMode (PDO::FETCH_ASSOC);
        $result -> execute(array(":a"=>$phase->getId()));
        $return=array();
        foreach ($result as $key => $row){
            if(!isset($this->task_Liste[$row["tas_id"]])){
                $this->task_Liste[$row["tas_id"]]=new Task_metier($row["tas_id"],$row["tas_description"],$row["tas_creation"],$row["tas_phase_fk"]);
            }
            $return[]= $this->task_Liste[$row["tas_id"]];
        }
          return $return;
    }
    
  }
?>
