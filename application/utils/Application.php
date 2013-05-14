<?php

/**
 * Main class
 * @author Loic
 */
class Application
{

    /**
     * L'application lancée
     * @var Application
     */
    private static $app;

    /**
     * Le tableau de configuration générale
     * @var Array 
     */
    private $config;

    private function __construct()
    {
        if (!isset(self::$app))
        {
            self::$app = $this;
        }
    }

    /**
     * Fonction de configuration de l'application
     * @param Array $url - Tableau d'url de la config
     * @return type
     */
    public static function config($url)
    {
        new Application();
        require_once $url;
        self::$app->config = &$config;
        require_once self::$app->config['PATH']['base'] . "/" . self::$app->config['PATH']['utils'] . '/Autoloader.php';
        /*
         * Chargement de l'autoloader
         */


        return self::$app;
    }

    /**
     * Lance l'application
     */
    public function run()
    {
        $a = new Autoloader(self::$app->config['PATH']);
        $query = isset($_GET['query']) ? $_GET['query'] : "";
        $rs = new RouteSolver_utils($query);
        $controller = $rs->getController();
        $action = $rs->getAction();
        $controller->$action();
    }

    /**
     * Retourne la config DB
     * @return Array
     */
    public static function getConfigDb()
    {
        return self::$app->config['DB'];
    }
    
    /**
     * Retourne la config des URL
     * @return Array
     */
    public static function getConfigPath()
    {
        return self::$app->config['PATH'];
    }
    
    /**
     * Retourne la configuration MVC
     * @return Array
     */
    public static function getConfigMVC()
    {
        return self::$app->config['MVC'];
    }

}

?>
