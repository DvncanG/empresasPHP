<?php

session_start();
include './models/LoginModel.php';
include './controllers/AppController.php';
include './models/AppModel.php';
include './views/AppView.php';
include './controllers/LoginController.php';
include './controllers/AdminController.php';
include './controllers/UserController.php';
include './funcions/FrontFunctions.php';
include './views/LoginView.php';

if (isset($_SESSION["token"]) && isset($_SESSION["user"])) {
    if (isset($_GET["controller"]) && $_GET["controller"] == "Admin") {
        define("DEFAULT_ACTION", "listUsuarios");
    } else {
        define("DEFAULT_ACTION", "listApp");
        define("DEFAULT_CONTROLLER", "App");
    }
} else {
    define("DEFAULT_ACTION", "showLogin");
    define("DEFAULT_CONTROLLER", "Login");
    if (isset($_GET["controller"]) || isset($_GET["action"])) {
        header("Location: ./index.php");
    }
}

if (isset($_GET["controller"])) {
    $controller = loadController($_GET["controller"]);
    executeAction($controller);
} else {//En caso contrario ejecuto el controlador y la acción por defecto
    $controller = loadController(DEFAULT_CONTROLLER);
    executeAction($controller);
}