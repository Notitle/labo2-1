<?php

class Et_validateur implements Validateur_interface{
    private $liste_validateur=array();
    /**
     * 
     * @param type $array
     */
    public function __construct($array){
        $this->liste_validateur = $array;
    }
    /**
     * 
     * @param type $valeur
     * @throws Multiple_validateur_exception
     */
    public function valide($valeur) {
        $list_ex = new Multiple_validateur_exception();
        $ok = false;
        foreach ($this->liste_validateur as $valid) {
            try {
                $valid->valide($valeur);
            } catch (Exception $e) {
                $ok = true;
                $list_ex->addException($e);
            }
        }
        
        if ($ok) {
            throw $list_ex;
        }
    }
}
?>
