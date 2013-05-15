<?php
class Task_controller implements Controller_interface {

    public function defaultAction()
    {
        $this->liste(); // action par défaut si pas d'action dans le controller
    }
    public function liste(){
        //die("hello");
        $Fdao = new DAO_factory(Application::getConfigDb());  // instancoation de la classe DAO_factory
        $Cdao = $Fdao->getTaskDao(); //on utilise la fn getTask. On va en avoir besoin dans la vue
        $vue =  new View_vue(array(
            "Liste_Taches"=>$Cdao->getTaskList())
        );
        $vue->display($this, 'liste');
    }
    
    public function __toString() {
        return 'Task';
    }
}

?>
    
