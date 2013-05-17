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
        $_SESSION["user"] = "nyl";
        
        if (!isset($_SESSION['user']))
        {
            $c = new Connexion_controller();
            $c->defaultAction();
        }
        else
        {
            $user = Application::getDAOFactory()->getUserDao()->getUserByLogin($_SESSION['user']);
            if ($user->getGroup()->getId() == 3)
            {
                echo "Vous êtes administrateur !";
            }
            elseif ($user->getGroup()->getId() == 2)
            {
                echo "Vous êtes reponssable !";
            }
            elseif ($user->getGroup()->getId() == 1)
            {
                echo "Vous êtes administrateur !";
            }
        }
    }

}

?>
