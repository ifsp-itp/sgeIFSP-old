<?php

//app aux
require_once("app.php");

function display($view, $data = array()) {
    extract($data);
    require("view/template.php");
}

function displayNoTemplate($view, $data = array()) {
    extract($data);
    require(buildViewPath($view));
}

function displayNoView($view, $data = array()) {
    extract($data);
    header("Location: ".$view);
}

function buildViewPath($viewName) {
    $viewFilePath = 'view/' . $viewName . '.view.php';
    return $viewFilePath;
}

$uri = explode("/", $_SERVER["REQUEST_URI"]);
$controllerName = $uri[2];

if (!$controllerName){
    $controllerName = "login";
}

$controllerFileName = "controller/" . $controllerName . "Controller.php";
if (file_exists($controllerFileName)) {
    require_once($controllerFileName);
} else {
    echo "O arquivo ".$controllerFileName." não existe.";
}


if (isset($uri[3]) and ! empty($uri[3])) {
    $action = $uri[3];
} else {
    $action = "index";
}

$params = array();

if (count($uri) > 4) {
    //tem mais parametros
    $params = array_slice($uri, 4);
    //print_r($params);
}

try {
    if(is_callable($action)){ //a funcao existe?

            $rc = new ReflectionFunction($action);
            $role = $rc->getDocComment();
            $role = trim(substr($role, 3, -2));
            //var_dump($role);
            
            $released = true;
            $userRole = authGetUserRole();

            //print_r($_SESSION);

            if(!empty($role) && $role !== $userRole) {
                //regra nao eh igual a encontrada na action do controlador
                $released = false;
                $authMsg = "Você não tem permissão para acessar esta área.";
            }

            if(empty($role) && !authIsLoggedIn()) {
                $released = false;
                $authMsg = "Você precisa autenticar-se para acessar esta área.";
            }

            if(!empty($role) && $role == "anon") {
                //acesso anonimo
                $released = true;
            }

            if($released) {
                call_user_func_array($action, $params); //chama a funcao passando parametros   
            } else {
                alert($authMsg, "warning");
                redirecionar("/sgeIF/login"); die();
            }


    } else {
        die("A função ".$action." do controlador ".$controllerFileName." não existe.");
    }
} catch (ArgumentCountError $e) {
    echo "Página não encontrada.";
}

?>