<?php

class Multiple_validateur_exception extends Validateur_exception
{

    protected $list_exceptions = array();

    public function addException(Validateur_exception $ve)
    {
        $this->list_exceptions[] = $ve;
        $this->message .= " " . $ve->getMessage();
    }

    public function getExceptions()
    {
        return $this->list_exceptions;
    }

}

?>
