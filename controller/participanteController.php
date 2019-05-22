<?php 

require "model/participante.php";
require "model/atividade.php";
	
function index() {
    $data["participantes"] = listarParticipantesGeral();
    displayNoTemplate("participante/listEmail", $data);
}

function listarPorAtv($idevento) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idatividade = $_POST["idatividade"];
        $data["participantes"] = listarParticipantesAtv($idatividade);
        $data["atividade"] = verAtividade($idatividade);
        displayNoTemplate("participante/list", $data);
    } else {
    	$data["atividades"] = consultarAtvEvnt($idevento);
		$data['getEvento'] = $idevento;
        display("participante/form", $data);
    }
}

function gerarCert() {
    extract($_POST);
    alert(gerarCertificados($idatividade, $emissor));
    redirecionar("../evento/index");
}

 ?>