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
        $liste = Application::getDAOFactory()->getUserDAO()->getUserByLogin("nyl")->getGroup()->getName();
        var_dump($liste);
        echo "<br />";
        $liste = Application::getDAOFactory()->getUserDAO()->getUserByLogin("nyl")->getPassword();
        var_dump($liste);

        $vue = new View_vue(array());
        $vue->display($this, "login");
    }

}

?>
