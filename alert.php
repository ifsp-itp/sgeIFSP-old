<?php

function alertInit() {
    if(!isset($_SESSION["alert"])){
        $_SESSION["alert"] = array();
    }
}

function alertGetMessages() {
    if(!empty($_SESSION["alert"])) {
        return $_SERVER["alert"];
    }
}

function alert($msg) {
    $_SESSION["alert"][] = $msg;
}

function alertClear() {
    $_SESSION["alert"] = array();
}

function alertShow() {
    if(!empty($_SESSION["alert"])) {
        $msgs = $_SESSION["alert"];
        alertClear();
        return implode(',',$msgs);
    }
}

function alertHasMsg() {
    return !empty($_SESSION["alert"]);
}

alertInit();

?>