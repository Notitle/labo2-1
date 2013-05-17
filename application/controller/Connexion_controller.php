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
        $form = new Generic_form("login", "", Generic_form::METHOD_POST);
        
        $field = new Field_form("loginUser", "", "text");
        $field->setClass("maclassecss");
        
        $form->addField($field);

        $vue = new View_vue(array("form" => new Generic_form("formulaire", "", Generic_form::METHOD_POST)));
        $vue->display($this, "login");
    }

}

?>
