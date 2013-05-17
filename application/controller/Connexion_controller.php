<?php

class Connexion_controller implements Controller_interface
{

    public function __construct()
    {
        
    }

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
        $vue = new View_vue(array("form" => new Generic_form("formulaire", "", Generic_form::METHOD_POST)));
        $vue->display($this, "login");
    }

}

?>
