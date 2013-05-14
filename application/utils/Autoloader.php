<?php

/**
 * Classe servant au chargement automatique des classes
 * @author denis
 */
class Autoloader
{

    private $chemins;
    private $extension;

    /**
     *
     * @param Array $chemins les chemins où trouver les fichiers 
     * @param String $extension extension à ajouter au nom de classe pour trouver le fichier
     */
    public function __construct($chemins, $extension = "php")
    {
        spl_autoload_register(array($this, "load"));
        $this->chemins = $chemins;
        $this->extension = $extension;
    }

    /**
     * Charge les classes
     * @param String $classe le nom de la classe
     * @throws Exception
     */
    public function load($classe)
    {

        $path = $this->chemins["base"];
        $partie_nom = explode("_", $classe);

        if (count($partie_nom) >= 2)
        {
            $extension = $partie_nom[count($partie_nom) - 1];
            if (!array_key_exists($extension, $this->chemins))
                throw new Exception("extension $extension inconnue");

            $dossier = $this->chemins[$partie_nom[count($partie_nom) - 1]];
            $path.="/$dossier";

            if (!is_dir($path))
                throw new Exception("Dossier $path inconnu");

            //array_pop($partie_nom);
            $fichier_nom = $classe;
            $path.="/$fichier_nom.$this->extension";

            if (!is_file($path))
                throw new Exception("Fichier $path inconnu ");
        }else
        {
            $fichier_nom = "$classe.$this->extension";
            if (!is_file($classe))
                throw new Exception("fichier $classe inconnu");
            $path = $classe;
        }
        include $path;
    }

}

?>
