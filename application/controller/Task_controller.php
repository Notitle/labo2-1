<?php

class Task_controller implements Controller_interface
{

    public function defaultAction()
    {
        $this->liste(); // action par défaut si pas d'action dans le controller
    }

    public function liste()
    {
        //die("hello");

        $Cdao = Application::getDAOFactory()->getTaskDao();
        $vue =  new View_vue(array(
            "Liste_Taches"=>$Cdao->getTaskList())
        );
        $vue->display($this, 'liste');
    }

    public function __toString()
    {
        return 'Task';
    }

}
?>
    
