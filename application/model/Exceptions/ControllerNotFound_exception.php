<?php

class ControllerNotFound_exception extends Exception
{

    public function __construct($controller)
    {
        $this->message = "Controller " . $controller . " non trouvé";
    }

}

?>
