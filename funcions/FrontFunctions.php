<?php

function filtrarInput($input, $metodo) {
    if ($metodo === "POST") {//Si el método es POST
        $variableFiltrada = isset(filter_input_array(INPUT_POST)[$input]) ? htmlspecialchars(filter_input_array(INPUT_POST)[$input]) : null;
    } else if ($metodo === "GET") {//Si el método es GET
        $variableFiltrada = isset(filter_input_array(INPUT_GET)[$input]) ? htmlspecialchars(filter_input_array(INPUT_GET)[$input]) : null;
    }
    return $variableFiltrada;
}

function loadController($controllerName) {
    $controller = $controllerName . 'Controller';
    if (class_exists($controller)) {
        return new $controller();
    } else {
        // Si no existe la clase del controlador le redirecciono directamente al index con la acción por defecto
        header("Location: ./index.php");
    }
}

function executeAction($controller) {
    if (isset($_GET["action"]) && method_exists($controller, $_GET["action"])) {
        loadAction($controller, $_GET["action"]);
    } else {
        loadAction($controller, DEFAULT_ACTION);
    }
}

function loadAction($controller, $action) {
    $controller->$action();
}
