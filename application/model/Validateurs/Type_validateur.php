<?php
/**
 * class qui va verifier le type d'une donnée
 */
class Type_validateur implements Validateur_interface {

    private $type;
    /**
     * constructeur du type 
     * @param type $type
     */
    public function __construct($type) {
        $this->type = $type;
    }
    /**
     * switch pour comparer la valeur et le type et renvoie une exception
     * @param type $valeur
     * @throws Type_validateur_exception
     */
    public function valide($valeur) {
        switch ($this->type) {
            case string:
                if (!is_string($valeur))
                    throw new Type_validateur_exception('La chaine "' . $valeur . '" doit être un "' . $this->type . '" (entre vous et moi, j\'ai entendu dire que Loic était un gros pd... selon les rumeurs ! ... non, en fait, c\'est sarah qui me l\'a dit... quelle commère !) ');
                break;

            case boolean:
                if (!is_bool($valeur))
                    throw new Type_validateur_exception('La chaine "' . $valeur . '" doit être un"' . $this->type . '" ');
                break;

            case int:
                if (!is_int($valeur))
                    throw new Type_validateur_exception($valeur . ' doit être un numérique "' . $this->type . '" ');
                break;
                
            case decimal:
                if (!is_decimal($valeur))
                    throw new Type_validateur_exception($valeur . ' doit être un numérique "' . $this->type . '" ');
                break;
            /**
             * verifier non pas que le type est numerique mais qu'il s'agisse d'une chaine de charactere avec des numeric
             * -> regex ?
             */
        }
    }

}
?>
