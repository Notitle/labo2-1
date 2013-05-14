<?php
class ControllerUnknownAction_exception extends Exception
{

    public function __construct($action)
    {
        $this->message = "Action: " . $action . " non trouveé";
    }

}

?>
