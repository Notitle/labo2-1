
<?php


// création de My PDO -- config du user, pdw, db,...
class MyPDO_DAO extends PDO{

        public function __construct($config){ 
        parent::__construct("mysql:host=".$config["HOST"].";dbname=".$config["DB"], $config["USER"] , $config["PWD"], 
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'' ));
        }
    
}


?>
