<?php

class Main_controller implements Controller_interface
{

    public function __construct()
    {
        
    }

    public function __toString()
    {
        return "Main";
    }

    public function defaultAction()
    {

        if (!isset($_SESSION['user']))
        {
            $c = new Connexion_controller();
            $c->defaultAction();
        }
        else
        {
            echo "Vous etes connecté";
        }
    }

}

?>
