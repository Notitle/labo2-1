<?php
class Task_controller implements Controller_interface {

    public function defaultAction()
    {
        $this->liste();
    }
    public function liste(){
        //die("hello");
        $Fdao = new DAO_factory(Application::getConfigDb());
        $Cdao = $Fdao->getTaskDao();
        
        return new View_vue(array(
            "Liste_Taches"=>$Cdao->getTaskList())
        );
    }
    
    public function __toString() {
        return 'Task';
    }
}

?>
    
