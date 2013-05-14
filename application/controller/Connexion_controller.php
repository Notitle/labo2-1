<?php

class Connexion_controller implements Controller_interface
{
    public function __construct()
    {
    }
    
    public function defaultAction()
    {
        $this->login();
       
    }
    
    public function login()
    {
        echo "Action par défaut";
    }
}
?>
