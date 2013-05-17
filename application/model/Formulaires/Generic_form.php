<?php

class Generic_form
{

    const METHOD_GET = "get";
    const METHOD_POST = "post";
    
    private $fieldList;
    private $method;
    private $target;
    private $name;

    public function __construct($name,$action,$method)
    {
        $this->setName($name);
        $this->setTarget($action);
        $this->setMethod($method);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getFieldList()
    {
        return $this->fieldList;
    }

    public function addField(Field_form $field)
    {
        $this->fieldList[] = $field;
    }
    
    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function setTarget($target)
    {
        $this->target = $target;
    }

}

?>
