<?php
class Task_controller implements Controller_onterface {

    public function liste(){
        //die("hello");
        $Fdao = new DAO_factory(Application::getConfig("DB"));
        $Cdao = $Fdao->getTaskDao();
        
        return new View(array(
            "Liste_Taches"=>$Cdao->getTaskList())
        );
    }
    
    public function __toString() {
        return 'Task';
    }
}

?>
    
