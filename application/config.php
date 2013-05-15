<?php
$config = array(
    "PATH" => array(
        
        
        "base" => __DIR__,
        "model" => "model",
        "vue" => "view",
        "controller" => "controller",
        "exception" => "model/Exceptions",
        "interface" => "model/Interfaces",
        "validateur" => "model/Validateurs",
        "utils" => "utils",
        "DAO" => "model/DAO",
        "metier" => "model/Metiers",
        "factory" => "model/Factories",
        "domain" =>"labo2.nylgraphics.be"
    ),
    "DB" => array(
        "HOST" => "localhost",
        "USER" => "labo2",
        "PWD" => "php1234",
        "DB" => "labo2"
    ),
    "MVC" => array(
        "default_controller" =>"Connexion_controller",
        "default_action" => "login"
    )
);
?>