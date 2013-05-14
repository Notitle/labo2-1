<?php

class vueNotFound_exception extends Exception
{
     public function __construct($vue)
     {
         $this->message = "Fichier de vue ".$vue." non trouvé";
     }
}

?>
