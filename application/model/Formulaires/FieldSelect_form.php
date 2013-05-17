<?php

/**
 * Description of FieldSelect_formµ
 *
 * @author internet07
 */
class FieldSelect_form extends Field_form {

    private $options;
    

    function __construct($name, $options) {
        parent::__construct($name, $options, "select");
        $this->options = $options;
    }

    public function getOption_liste() {
        return $this->options;
    }

    public function setOption_liste($options) {
        $this->options = $options;
    }
}

?>
