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
            $nomController = $query[0] . "_controller";
            $this->controller = new $nomController();
            $path = $this->config["base"] . "/" . $this->config["controller"] . "/" . $nomController . ".php";
            if (!is_file($path))
            {
                throw new controllerNotFound_exception();
            }
        }
        else
        {
            $config = Application::getConfigMVC();
            $this->controller = new $config["default_controller"]();
        }

        if (isset($query[1]) && $query[1] != "")
        {
            if (method_exists($this->getController(), $query[1]))
            {
                $this->action = $query[1];
                $path = $this->config["base"] . "/" . $this->config["vue"] . "/" . $query[0] . "/" . $this->action . ".phtml";
                if (!is_file($path))
                {
                    throw new vueNotFound_exception($path);
                }
            }
            else
            {
                throw new ControllerUnknowAction_exception();
            }
        }
        else
        {
            $config = Application::getConfigMVC();
            if (method_exists($this->getController(), $config["default_action"]))
            {
                $this->action = $config["default_action"];
                $path = $this->config["base"] . "/" . $this->config["vue"] . "/" . $query[0] . "/" . $this->action . ".phtml";
                if (!is_file($path))
                {
                    throw new vueNotFound_exception($path);
                }
            }
            else
            {
                throw new ControllerUnknownAction_exception();
            }
        }
        if (isset($query[2]))
        {
            $rAction = new ReflectionMethod($this->getController(), $this->getAction());
            $params = array_slice($query, 2, $rAction->getNumberOfParameters());
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
