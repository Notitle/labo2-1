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
        
        $history = $liste[1]->getHistory();
        
        $history2 = ($history[0]->getTask()->getHistory());
        
        var_dump($history2[0]->getTask()->getPhase()->getName());
        echo "<br />";
        
        $user = Application::getDAOFactory()->getUserDao()->getUserByLogin('nyl');
        
        $table = $user->getTasks();
        
        $fucking_history = $table[0]->getHistory();
        
        var_dump($fucking_history[0]->getDate());


        $vue = new View_vue(array());
        $vue->display($this, "login");
    }

}

?>
