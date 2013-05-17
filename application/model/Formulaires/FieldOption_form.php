<?php

/**
 * Description of FieldOption_form
 *
 * @author internet07
 */
class FieldOption_form extends FieldSelect_form {
    private $option_liste=array();
    /**
     * constructeur
     * @param type $valueOption
     */        
    function __construct($valueOption) {
        parent::__construct($valueOption,"option");
        $this->option_liste = $valueOption;
    }
    
    public function getValueOption() {
        return $this->option_liste;
    }
    /**
     *  tableau d'objet ->options
     * @param type $valueOption
     * @return type
     */
    public function setValueOption($valueOption) {
        
        foreach ($valueOption as $value) {
            $this->option_liste[] = $value;
        }
        return $$this->option_liste;
    }



//selected
}

?>