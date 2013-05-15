<?php
/**
 * class qui verifie l'état d'un pass
 * Pass doit etre entre 4 et 8 char et doit contenir au moins UN chiffre.
 * @author Jerome
 */
class Pass_validateur extends Regex_validateur {
    public function __construct() {
        parent::__construct('#^(?=.*\d).{4,8}$#');
    }
    /**
     * 
     * @param type $valeur
     * @throws Pass_validateur_exception
     */
    protected function valide($valeur) {
        parent::valide($valeur);
        if(!preg_match($this->regex,$valeur)) 
            throw new Pass_validateur_exception('Le pass : "' . $valeur . '" n\'est pas valide. Il doit contenir entre 4 et 8 characteres et doit avoir au moins UN chiffre');
    }
}

?>
