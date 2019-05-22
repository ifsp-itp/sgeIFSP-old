<?php

require "model/ministrante.php";

function index() {
    $data["ministrantes"] = consultarMinistrantes();
    display("ministrante/list", $data);
}

function add() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);
        alert(cadastrarMinistrante($nome,$cpf,$email,$tel));
        redirecionar("../ministrante/index");
    } else {
        display("ministrante/form");
    }
}

function edit($id) {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);
        alert(alterarMinistrante($nome,$cpf,$email,$tel,$id));
        redirecionar("../index");
    } else {
        $data['ministrante'] = verMinistrante($id);
        display("ministrante/form", $data);
    }
}

function del($id) {
    alert(excluirMinistrante($id));
    redirecionar("../index");
}

?>