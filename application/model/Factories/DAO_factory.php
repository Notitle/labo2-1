<?php

class DAO_factory {
    private static $my_pdo;
    private $configArray;
    private $Task_dao;
    private $History_dao;


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
    
    public function gethistoryDao() {
        if (isset($this->History_dao)) {
            $c = $this->History_dao;
        } else {
            if (!isset(self::$my_pdo)) {
                $c = $this->creerMypdo();
            }
            $this->History_dao = new History_DAO(self::$my_pdo);
            $c = $this->History_dao;
        }
        return $c;
    }
    
    public function getProjectDao() {
        if (isset($this->Project_dao)) {
            $c = $this->Project_dao;
        } else {
            if (!isset(self::$my_pdo)) {
                $c = $this->creerMypdo();
            }
            $this->Project_dao = new Project_DAO(self::$my_pdo);
            $c = $this->Project_dao;
        }
        return $c;
    }

    private function creerMypdo() {

        self::$my_pdo = new MyPDO_DAO($this->configArray);
    }
}
?>
