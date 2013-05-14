<?php

/**
 * Charge les bons controleurs et les bonnes actions en fonction de l'url
 * @author loic
 */
class RouteSolver_utils
{

    private $controller;
    private $action;
    private $params;
    private $url;
    private $config;

    /**
     * @author Loic
     * 
     * @param String $url
     * @throws ControllerNotFound_exception
     * @throws ControllerNotPassed_exception
     * @throws VueNotFound_exception
     * @throws ControllerUnknowAction_exception
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->config = Application::getConfigPath();
        $query = explode("/", $this->url);

        if (isset($query[0]) && $query[0] != "")
        {
            //Un controller a été demandé : 
            $nomController = $query[0] . "_controller";
            $this->controller = new $nomController();
            $path = $this->config["base"] . "/" . $this->config["controller"] . "/" . $nomController . ".php";
            if (!is_file($path))
            {
                //Le controller n'existe pas, on retourne une exception;
                throw new ControllerNotFound_exception($path);
            }
        }
        else
        {
            //aucun controller n'a été demandé: envoi du controller par défaut
            $config = Application::getConfigMVC();
            $this->controller = new $config["default_controller"]();
        }

        if (isset($query[1]) && $query[1] != "")
        {
            //Une action a été demandée: 
            if (method_exists($this->getController(), $query[1]))
            {
                //L'action demandée existe: 
                $this->action = $query[1];
                $path = $this->config["base"] . "/" . $this->config["vue"] . "/" . $query[0] . "/" . $this->action . ".phtml";
                if (!is_file($path))
                {
                    //Le fichier de vue lié à l'action n'existe pas
                    throw new VueNotFound_exception($path);
                }
            }
            else
            {
                //L'action demandée n'existe pas
                throw new ControllerUnknownAction_exception($this->action);
            }
        }
        else
        {
            //Aucune action n'a été demandée: Envoi de l'action par défaut du controller
            $this->action = "defaultAction";
        }
        if (isset($query[2]))
        {
            $params = array_splice($query, 0, 2);
            $this->params = $params;
        }
    }

    /**
     * Retourne le controller.
     * @author Loic
     * @return Controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Retourne l'action
     * @author Loic
     * @return String
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Retourne les parametres de l'action
     * @author Loic
     * @return Array
     */
    public function getParams()
    {
        return $this->params;
    }

}

?>
