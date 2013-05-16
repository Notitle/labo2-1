<?php

/**
 * Classe abstraite qui contient les fonctions de validateurs nécéssaires à l'insersions de données dans une classe métier. 
 */
abstract class Generic_metier implements Metier_interface
{

    /**
     * Tableau de validateurs
     * @var array
     */
    protected $validationArray;

    /**
     * Vérifie une qu'une valeur données est bien validées par les validateurs associés au nom référencé dans la tableau $validationArrray
     * @param string $name - Nom de la valeur
     * @param string $value - Valeur a vérifier
     * @throws Validateur_exception
     */
    public function isDataValid($name, $value)
    {
        try
        {
            if (isset($this->validationArray[$name]["required"]) && $this->validationArray[$name]["required"])
            {
                $validator = new Requis_validateur();
                $validator->valide($value);
            }
            if (isset($this->validationArray[$name]["type"]))
            {
                $validator = new Type_validateur($this->validationArray[$name]["type"]);
                $validator->valide($value);
            }
            if (isset($this->validationArray[$name]["range"]))
            {
                $validator = new OutOfRange_validateur($this->validationArray[$name]["range"]["min"], $this->validationArray[$name]["range"]["max"]);
                $validator->valide($value);
            }
            if (isset($this->validationArray[$name]["pattern"]))
            {
                $validator = new Regex_validateur($this->validationArray[$name]["pattern"]);
                $validator->valide($value);
            }
            if (isset($this->validationArray[$name]["AND"]))
            {
                $validator = new Et_validateur($this->validationArray[$name]["AND"]);
                $validator->valide($value);
            }
            if (isset($this->validationArray[$name]["OR"]))
            {
                $validator = new Ou_validateur($this->validationArray[$name]["OR"]);
                $validator->valide($value);
            }
            if (isset($this->validationArray[$name]["NON"]))
            {
                $validator = new Non_validateur($this->validationArray[$name]["NON"]);
                $validator->valide($value);
            }
        }
        catch (Validateur_exception $e)
        {
            throw $e;
        }
    } 

}

?>
