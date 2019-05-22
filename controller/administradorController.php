<?php

require "model/administrador.php";

function index() {
    $id = $_SESSION["id"];
    $data["administrador"] = verAdministrador($id);
    display("administrador/view", $data);
}

function add() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);
        if ($senha == $rsenha) {
            alert(cadastrarAdministrador($email, $senha, $nome));
            redirecionar("../administrador/index");
        } else {
            alert("Senhas não coincidem.");
            display("administrador/form");
        }
    } else {
        display("administrador/form");
    }
}

function view($id) {
    $data['administrador'] = verAdministrador($id);
    display("administrador/view", $data);
}

function edit($id) {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);
        if ($senha == $rsenha) {
            alert(alterarAdministrador($id, $email, $senha, $nome));
            redirecionar("../index");
        } else {
            $data['administrador'] = verAdministrador($id);
            alert("Senhas não coincidem.");
            display("administrador/form", $data);
        }
    } else {
        $data['administrador'] = verAdministrador($id);
        display("administrador/form", $data);
    }
}

function del($id) {
    alert(excluirAdministrador($id));
    authLogout();
    redirecionar("login/index");
}

?>