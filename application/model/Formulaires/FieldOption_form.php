<?php

/**
 * Description of FieldOption_form
 *
 * @author internet07
 */
class FieldOption_form extends FieldSelect_form {

    private $option_liste = array();
    private $ValueOption;
    private $isSelected;

    /**
     * constructeur
     * @param type $valueOption
     */
    function __construct($valueOption) {
        parent::__construct($valueOption, $isSelected, "option");
        $this->option_liste = $valueOption;
        $this->isSelected = $isSelected;
    }

    public function getIsSelected() {
        return $this->isSelected;
    }

    public function setIsSelected($isSelected) {
        $this->isSelected = $isSelected;
    }

    public function getOption_liste() {
        return $this->option_liste;
    }

    public function setOption_liste($option_liste) {
        foreach ($option_liste as $value) {
            $this->option_liste[] = $value;
        }
        return $this->option_liste;
    }

    public function getValueOption() {
        return $this->ValueOption;
    }

    public function setValueOption($ValueOption) {
        $this->ValueOption = $ValueOption;
    }

//selected
}

?>