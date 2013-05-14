<?php
/**
 * Class qui controle les regex des simples champs comme nom, prenom
 *
 * @author Jerome
 */
class Simple_validateur extends Regex_validateur{
    
    public function __construct() {
        parent::__construct('#^[A-Z][a-zA-Z -]+$#');
    }

    protected function valide($valeur) {
        parent::valide($valeur);
        if(!preg_match($this->regex,$value)) 
            throw new Simple_validateur_exception('Le champ : "' . $valeur . '" n\'est pas valide');
    }
}

?>
