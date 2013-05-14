<?php

class Non_validateur implements Validateur_interface{
    private $validateur;

    public function __construct(Validateur_interface $ex){
        $this->validateur = $ex;
    }
    
    public function valide($valeur) {
        try
        {
            $ex->valide($valeur);
            throw new Non_validateur_exception();
        }
        catch (Validateur_exception $e)
        {
            
        }
    }
}
?>
