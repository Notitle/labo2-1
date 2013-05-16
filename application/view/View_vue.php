<?php

/**
 * Description of Vue_vue
 *
 * @author internet06
 */
class View_vue
{

    private $dataVue = array();

    public function __construct($array)
    {
        foreach ($array as $element)
        {
            $this->setDatavue(key($array), $element);
        }
    }

    public function getDatavue($nom)
    {
        return $this->dataVue[$nom];
    }

    public function setDatavue($nom, $valeur)
    {
        $this->dataVue[$nom] = $valeur;
    }

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
