<?php

function filtrarInput($input, $metodo) {
    if ($metodo === "POST") {//Si el método es POST
        $variableFiltrada = isset(filter_input_array(INPUT_POST)[$input]) ? htmlspecialchars(filter_input_array(INPUT_POST)[$input]) : null;
    } else if ($metodo === "GET") {//Si el método es GET
        $variableFiltrada = isset(filter_input_array(INPUT_GET)[$input]) ? htmlspecialchars(filter_input_array(INPUT_GET)[$input]) : null;
    }
    return $variableFiltrada;
}

function filtrarArrayInput($arrayInputName, $clavesAComprobar, &$errorInputVacio) {
    $arrayInputs = isset(filter_input_array(INPUT_POST)[$arrayInputName]) ? filter_input_array(INPUT_POST)[$arrayInputName] : null;
    if (isset($arrayInputs)) {//Si el array existe
        //Filtro con htmlspecialchars todos los campos del array
        foreach ($arrayInputs as &$value) {
            $value = htmlspecialchars($value);
        }
        //Compruebo si los campos necesarios existen y si están vacios
        foreach ($clavesAComprobar as $inputs) {
            if (!isset($arrayInputs[$inputs]) || (isset($arrayInputs[$inputs]) && trim($arrayInputs[$inputs]) == "")) {//Si no existe o si existe y está vacio
                $errorInputVacio = true; //Cambio el valor del error a true
            }
        }
    }
    return $arrayInputs;
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
