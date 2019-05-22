<?php

require "model/atividade.php";
require "model/ministrante.php";

function index() {
    $data["atividades"] = consultarAtividades();
    display("atividade/list", $data);
}

function add($idevento) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);
        alert(cadastrarAtividade($nome, $tipo, $dtinicio, $dttermino, $conteudo, $cargahoraria, $limitpart, $idminist, $idevento, $hrinicio, $hrtermino, $local));
        redirecionar("../../atividade/index");
    } else {
        $data["ministrantes"] = consultarMinistrantes();
        $data['getEvento'] = $idevento;
        display("atividade/form", $data);
    }
}

function edit($id) {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);
        alert(alterarAtividade($nome, $tipo, $dtinicio, $dttermino, $conteudo, $cargahoraria, $limitpart, $idminist, $idevento, $hrinicio, $hrtermino, $local, $id));
       redirecionar("../index");
    } else {
        $data["ministrantes"] = consultarMinistrantes();
        $data['atividade'] = verAtividade($id);
        display("atividade/form", $data);
    }
}

function del($id) {
    alert(excluirAtividade($id));
    redirecionar("../index");
}

?>