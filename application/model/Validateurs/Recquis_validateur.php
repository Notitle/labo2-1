<?php
/**
 * Classe qui contient la fonction qui certifie si un champ est recquis  
 */
class Requis_validateur implements Validateur_interface {
    
    /**
     * Vérifie une qu'une valeur donnée est bien envoyée et que cette valeur n'est pas une chaine de character vide
     * @param string $valeur - Valeur a vérifier
     * @throws Required_validateur_exception
     */
    public function valide($valeur) {
        if (!isset($valeur) || $valeur === "")
            throw new Required_validateur_exception("Valeur Requise");
    }

}

?>
