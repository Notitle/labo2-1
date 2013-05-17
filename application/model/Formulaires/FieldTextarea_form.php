<?php

class FieldTextarea_form extends Field_form
{

    private $row;
    private $cols;
    
    function __construct($name,$value,$row, $cols)
    {
        parent::__construct($name, $value, "textarea");
        $this->row = $row;
        $this->cols = $cols;
    }

    
    public function getRow()
    {
        return $this->row;
    }

    public function setRow($row)
    {
        $this->row = $row;
    }

    public function getCols()
    {
        return $this->cols;
    }

    public function setCols($cols)
    {
        $this->cols = $cols;
    }


}

?>
