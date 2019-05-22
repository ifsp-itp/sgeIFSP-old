<?php

require "model/figura.php";

function add($idevento) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);
        $foto = $_FILES["foto"];
        alert(adicionarFigura($foto, $idevento, $tipo));
        redirecionar("../../evento/index");
    } else {
        $data['getEvento'] = $idevento;
        display("figura/form", $data);
    }
}

?>
