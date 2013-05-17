<?php

class Form_vue
{

    private $formModel;

    public function __construct($f)
    {
        $this->setFormModel($f);
    }

    public function getHTML()
    {
        $output = "<form name='" . $this->formModel->getName() . "' method='" . $this->formModel->getMethod() . "' action='" . $this->formModel->getTarget() . "'>";
        foreach($this->formModel->getFieldList() as $field)
        {
            switch ($field->getType())
            {
                case "text": 
                case "password":
            }
        }
        $output .= "</form>";
        return $output;
    }

    public function setFormModel(Generic_form $f)
    {
        $this->formModel = $f;
    }

}

?>
