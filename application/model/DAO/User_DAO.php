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
}
?>
