<?php

/**
 * Class qui calcul la valeur max et min d'un champs
 *
 * @author Jerome
 */
class OutOfRange_validateur implements Validateur_interface {

    private $min;
    private $max;

    /**
     * fonction construct qui ... ben construit ? wouaip,wouaip elle construit des trucs
     * @param int $max valeur max dans un champs
     * @param int $min valeur min dans un champs
     */
    public function __construct($min, $max) {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * fonction qui renvoie une exception si la chaine est trop grande ou trop petite
     * @param int $max valeur max dans un champs
     * @param int $min valeur min dans un champs
     * @throws OutOfRange_validateur_exception
     */
    public function valide($valeur) {
        $length = strlen('' . $valeur);
        if ($length < $this->min)
            throw new OutOfRange_validateur_exception('La chaine "' . $valeur . '" doit contenir plus de ' . $valeur->min . ' caractère(s)');
        if ($$length > $this->max)
            throw new OutOfRange_validateur_exception('La chaine "' . $valeur . '" doit contenir moins de ' . $valeur->max . ' caractère(s)');
    }

}

?>
