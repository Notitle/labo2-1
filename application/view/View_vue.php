<?php

/**
 * Objet de génération de la vue
 * @author loic -
 */
class View_vue
{

    private $dataVue = array();

    /**
     * Objet de génération de la vue
     * @param Array $array les variables à passer à la vue
     */
    public function __construct($array)
    {
        foreach ($array as $element)
        {
            $this->setDatavue(key($array), $element);
        }
    }

    /**
     * Renvoie la valeur correspondante
     * @param String $nom
     * @return mixed
     */
    public function getDatavue($nom)
    {
        return $this->dataVue[$nom];
    }

    /**
     * Utilisé dans le constructeur, remplis l'objet avec les parametres à passer aux templates
     * @param String $nom
     * @param Mixed $valeur
     * @access private
     */
    private function setDatavue($nom, $valeur)
    {
        $this->dataVue[$nom] = $valeur;
    }

    /**
     * Affiche le template associé au controller.
     * @param Controller_interface $cont
     * @param String $action
     * @throws Exception
     * @deprecated : Utilisez combine à la place
     */
    public function display($cont, $action)
    {
        $repertoire = (string) $cont;
        $path = Application::getConfigPath();
        if (!is_file($path["base"] . "/" . $path["vue"] . "/" . $repertoire . "/" . $action . ".phtml"))
        {
            throw new Exception("Le template " . $path["base"] . "/" . $path["vue"] . "/" . $repertoire . " est introuvable");
        }
        require_once($path["base"] . "/" . $path["vue"] . "/" . $repertoire . "/" . $action . ".phtml");
    }

    /**
     * Génère une URL valable
     * @param type $array
     * @return string
     */
    public function url($array)
    {
        $path = Application::getConfigPath();
        $buffer = "/MVC/";
        foreach ($array as $part)
        {
            $buffer.= $part . "/";
        }
        return $buffer;
    }

    /**
     * Combine les fichiers de templates pour afficher la page correspondante au controller et à l'action demandée
     * @param Controller_interface $cont
     * @param type $action
     */
    public function combine($cont, $action)
    {
        $repertoire = (string) $cont;
        $path = Application::getConfigPath();

        $config = &Application::getConfigMVC();
        $arrayTag = &$config['ViewTag'];

        ob_start();
        include($path["base"] . "/" . $path["vue"] . "/layout/generic.phtml");
        $wrapper = ob_get_contents();
        ob_end_clean();

        ob_start();
        include($path["base"] . "/" . $path["vue"] . "/" . $repertoire . "/" . $action . ".phtml");
        $contenu = ob_get_contents();
        ob_end_clean();
        
        $wrapper = preg_replace("/(\{content\})/", $contenu, $wrapper);

        foreach ($arrayTag as $key => $tag)
        {
            ob_start();
            include($path["base"] . "/" . $path["vue"] . "/" . $tag);
            $contenu = ob_get_contents();
            ob_end_clean();

            $wrapper = preg_replace("/(\{" . $key . "\})/", $contenu, $wrapper);
        }
        echo $wrapper;
    }

}

?>
