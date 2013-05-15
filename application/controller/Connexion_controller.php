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
        $liste = Application::getDAOFactory()->getTaskDao()->getTaskById(1);
        var_dump($liste);
        $vue = new View_vue(array());
        $vue->display($this, "login");
    }
}
?>
