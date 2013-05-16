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
        $vue = new View_vue(array('ok' => "hello User !"));
        $vue->combine($this, "main");
    }
    


}
?>
