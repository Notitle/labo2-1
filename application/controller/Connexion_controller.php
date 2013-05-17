<?php

class Connexion_controller implements Controller_interface
{

    public function __toString()
    {
        return "Connexion";
    }

    public function defaultAction()
    {
        $this->login();
    }

    public function login()
    {
       
        $user = new Utilisateur_metier("sarah", $prenom = "Sarah", $nom = "Vanesse", $email = "sarah@sarah.com", $password = "1235", $deleted = false, $group = 2);        
        $user->setEmail("Sarah@ste.be");
        $user->save();
        }
    
    public function addTask(){
        /*
         * 
         */
    }

}

?>
