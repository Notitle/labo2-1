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
        $liste = Application::getDAOFactory()->getTaskDAO()->getTaskList();
        
        $history = $liste[0]->getHistory();
        
        var_dump($history[1]->getName());
        echo "<br />";



        $vue = new View_vue(array());
        $vue->display($this, "login");
    }

}

?>
