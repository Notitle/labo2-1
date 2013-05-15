<?php

class DAO_factory {
    private static $my_pdo;
    private $Category_dao;
    private $configArray;
    private $Task_dao;
    private $History_dao;
    private $Project_dao;
    private $Group_dao;


    public function __construct($configArray) {
        $this->configArray = $configArray;
    }
    
    public function getCategoryDao() {
        if (isset($this->Category_dao)) {
            $c = $this->Category_dao;
        } else {
            if (!isset(self::$my_pdo)) {
                $c = $this->creerMypdo();
            }
            $this->Category_dao = new Category_DAO(self::$my_pdo);
            $c = $this-Category_dao;
        }
        return $c;
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
    
     public function getGroupDao() {
        if (isset($this->Group_dao)) {
            $c = $this->Group_dao;
        } else {
            if (!isset(self::$my_pdo)) {
                $c = $this->creerMypdo();
            }
            $this->Group_dao = new Group_DAO(self::$my_pdo);
            $c = $this->Group_dao;
        }
        return $c;
    }

    private function creerMypdo() {

        self::$my_pdo = new MyPDO_DAO($this->configArray);
    }
}
?>
