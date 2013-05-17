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
       
       $form = new Generic_form("connect","",Generic_form::METHOD_POST);
       $form->addField(new Field_form("user", "", "text","Nom d'utilisateur   "));
       $form->addField(new Field_form("pdw", "", "password", "Mot de passe "));
       $form->addField(new Field_form("submit", "Envoyer", "submit"));
       
        $vue = new View_vue(array("form" => $form));
        $vue->display($this, "login");
                
    }
    
    public function addTask(){
        /*
         * 
         */
    }

}

?>
