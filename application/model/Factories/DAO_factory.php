<?php

class DAO_factory {
    private static $my_pdo;
    private $configArray;
    private $Task_dao;
    
      public function __construct($configArray) {
        $this->configArray = $configArray;
    }
    
    public function getTaskDao() {
        if (isset($this->Task_dao)) {
            $c = $this->Task_dao;
        } else {
            if (!isset(self::$my_pdo)) {
                $c = $this->creerMypdo();
            }
            $this->Task_dao = new Task_DAO(self::$my_pdo);
            $c = $this->Task_dao;
        }
        return $c;
    }

    private function creerMypdo() {

        self::$my_pdo = new MyPDO_DAO($this->configArray);
    }
}
?>
