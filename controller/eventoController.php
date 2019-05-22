<?php

require "model/evento.php";

function index() {
    $data["eventos"] = consultarEventos();
    display("evento/list", $data);
}

function add() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);
        alert(cadastrarEvento($nome, $tipo, $dtinicio, $dttermino, $dtlimite, $conteudo, $responsavel, $cargahoraria, $hrinicio, $hrtermino, $local));
        redirecionar("../evento/index");
    } else {
        display("evento/form");
    }
}

function edit($id) {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);
        alert(alterarEvento($id, $nome, $tipo, $dtinicio, $dttermino, $dtlimite, $conteudo, $responsavel, $cargahoraria, $hrinicio, $hrtermino, $local));
        redirecionar("../index");
    } else {
        $data['evento'] = verEvento($id);
        display("evento/form", $data);
    }
}

function del($id) {
    alert(excluirEvento($id));
    redirecionar("../index");
}

?>