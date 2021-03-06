<?php

class Field_form
{

    private $name;
    private $value;
    private $validators = array();
    private $id;
    private $class;
    private $type;
    private $label;
            
    function __construct($name, $value, $type, $label = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;
        $this->label = $label;
    }

    protected function addValidationRule($name, $array)
    {
        if (!is_string($name))
        {
            throw new Exception("name doit être de type string");
        }
        foreach ($array as $element => $rule)
        {
            $enum = array("required", "type", "range", "pattern");
            if (!in_array($element, $enum))
            {
                throw new Exception("validateur non reconnu: " . $element);
            }
        }
        $this->validators[$element] = $array;
    }

    public function getValidators()
    {
        return $this->validators;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function setClass($class)
    {
        $this->class = $class;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
    
    public function getLabel() {
        return $this->label;
    }

    public function setLabel($label) {
        $this->label = $label;
    }


}

?>
