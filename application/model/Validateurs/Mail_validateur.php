<?php

/**
 * Enfant(viens gamin c'est pour rire) de regex pour verifier les mails.
 *
 * @author Jerome
 */
class Mail_validateur extends Regex_validateur {
    
    /**
     * regex pour un mail, verifier quand meme si elle fonctionne cette pute
     * 
     */

    public function __construct() {
        parent::__construct('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#');
    }
    /**
     * 
     * @param type $valeur
     * @throws Mail_validateur_exception
     */
    protected function valide($valeur) {
        parent::valide($valeur);
        if(!preg_match($this->regex,$valeur)) 
            throw new Mail_validateur_exception('Le mail "' . $valeur . '" n\'est pas valide');
    }

}

?>
