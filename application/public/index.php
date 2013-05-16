<?php
session_start();
session_regenerate_id(true);
require_once("../utils/Application.php");
Application::config("../config.php")->run();
?>
