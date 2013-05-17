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
        $array =  $this->formModel->getFieldList();
        
        foreach($array as $field)
        {
                $output.="<table>";
                $output.="<tr>";
                $output.= $field->getLabel() != null ? "<td><label>".$field->getLabel()."</label></td>" : null;
            
            switch ($field->getType())
            {
                case "text": 
                    $output.= "<td> <input class='".$field->getClass()."' type ='text' name='".$field->getName()."' value='".$field->getValue()."' /> </td>";
                    break;
                case "password":
                    $output.= "<td> <input type ='password' name='".$field->getName()."' value='".$field->getValue()."' /> </td>";
                    break;
                case "radio":
                     $output.= "<td> <input type ='radio' name='".$field->getName()."' value='".$field->getValue()."' /> </td>";
                    break;
                case "submit":
                        $output.= "<td> <input type='submit' name='".$field->getName()."' value='".$field->getValue()."'/> </td>";
                    break;
                case "checkbox":
                        $output.= "<td> <input type='checkbox' name='".$field->getName()."' value='".$field->getValue()."'/> </td>";
                    break;
                 case "hidden":
                        $output.= "<td> <input type='hidden' name='".$field->getName()."' value='".$field->getValue()."'/> </td>";
                    break;
                 case "textarea":
                        $output.= "<td> <textarea  name='".$field->getName()." row='".$field->getRow()." colc='".$field->getCols()."' >".$field->getValue()."</textarea> </td>";
                    break;
                case "select":
                        $output.= "<td> <select type='hidden' name='".$field->getName()."'/> </td>";
                            $output.="<option value='".$field->getValue()."'></option>";
                        $output.="</select>";
                        
                    break;
                    //checkbox, hidden, 
            }
            $output.="</tr>";
            $output .= "</table>";
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
