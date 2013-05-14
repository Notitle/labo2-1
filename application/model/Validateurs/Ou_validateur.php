<?php

class Ou_validateur implements Validateur_interface
{

    private $liste_validateur = array();

    public function __construct($array)
    {
        $this->liste_validateur = $array;
    }

    public function valide($valeur)
    {
        $multiEx = new Multiple_validateur_exception();
        foreach ($this->liste_validateur as $validateur)
        {
            try
            {
                $validateur->valide($valeur);
            }
            catch (Validateur_exception $e)
            {
                $multiEx->addException($e);
            }
        }
        if (count($multiEx->getExceptions()) == count($this->liste_validateur))
        {
            throw $multiEx;
        }
    }

}
?>
