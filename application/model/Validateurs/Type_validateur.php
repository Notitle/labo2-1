<?php

class Type_validateur implements Validateur_interface {
    private $type;
    
    public function __construct($type) {
        $this->type=$type;
    }
    public function valide($valeur,$type) {
        
        if (!is_string($type))
            throw new Type_validateur_exception('La chaine "' . $valeur . '" doit être un "' . $this->type . '" ');
        
        if (!is_bool($type))
            throw new Type_validateur_exception('La chaine "' . $valeur . '" doit être un"' . $this->type . '" ');

        if (!is_numeric($type)){
            if(!is_int($type))
                throw new Type_validateur_exception($valeur . ' doit être un "' . $this->type . '" ');
            if(!is_decimal($type))
                throw new Type_validateur_exception($valeur . ' doit être un "' . $this->type . '" ');
        }
            throw new Type_validateur_exception('La chaine "' . $valeur . '" doit être un "' . $this->type . '", non di dju ');
    }

}

?>
