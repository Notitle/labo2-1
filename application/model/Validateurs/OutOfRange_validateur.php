<?php

/**
 * Description of Length_validateur
 *
 * @author internet07
 */
class Length_validateur implements Validateur_interface{
    private $min;
    private $max;
    /**
     * fonction construct qui ... ben construit ? wouaip,wouaip elle construit des trucs
     * @param int $max valeur max dans un champs
     * @param int $min valeur min dans un champs
     */
    public function __construct($min,$max) {
        $this->min=$min;
        $this->max=$max;
    }
    
        /**
     * fonction construct qui valide le c
     * @param int $max valeur max dans un champs
     * @param int $min valeur min dans un champs
     * @throws OutOfRange_validateur_exception
     */
    
    public function valide($valeur) {
        if ($this->min > $valeur ||$this->max<$valeur) {
            throw new OutOfRange_validateur_exception("erreur de outofrange ");
        }        
   } 
}
?>
