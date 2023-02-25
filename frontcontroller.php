<?php

include './models/LoginModel.php';
include './controllers/LoginController.php';
include './funcions/FrontFunctions.php';
include './views/LoginView.php';

if (isset($_SESSION["token"]) && isset($_SESSION["user"])) {//Si existe la sesión el controlador y la acción por defecto será listar hoteles
    if (isset($_GET["controller"]) && $_GET["controller"] == "Pedidos") {//Acción por defecto de Bookings
        define("DEFAULT_ACTION", "listPedidos");
    } else {//Acción por defecto principal si ha iniciado sesión
        define("DEFAULT_ACTION", "listPedidos");
        define("DEFAULT_CONTROLLER", "Pedidos");
    }
} else {//Si no existe la sesión será el login y le redirijo al index sin parámetros
    define("DEFAULT_ACTION", "showLogin");
    define("DEFAULT_CONTROLLER", "Login");
    if (isset($_GET["controller"]) || isset($_GET["action"])) {//Si no existe la sesión e intenta acceder con algún parámetro en la url le redirijo al index sin parámetros
        header("Location: ./index.php");
    }
}
//Cargamos y ejecutamos el controlador y su acción correspondiente:
if (isset($_GET["controller"])) {//Si recibe un controlador ejecuto su acción
    $controller = loadController($_GET["controller"]);
    executeAction($controller);
} else {//En caso contrario ejecuto el controlador y la acción por defecto
    $controller = loadController(DEFAULT_CONTROLLER);
    executeAction($controller);
}