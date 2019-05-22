<?php
session_start();

define('ROOTPATH', getRootPath(true)); //http://localhost:8080/repoif/tinymvc/

//libs
require_once 'alert.php';
require_once 'auth.php';

function conn() {
    $cnx = mysqli_connect("localhost", "root", "", "sgeIFitp");
    if (!$cnx) die('Erro na conexão com o Banco de Dados.');
    return $cnx;
}

function desconn() {
    
}

function redirect($path) {
    $finalPath = ROOTPATH . $path;
    header("location: $finalPath");
}

function redirecionar($path) {
    //$finalPath = ROOTPATH . $path;
    header("location: $path");
}

function getRootPath($isServer = false) {
    //credits: https://wp-mix.com/php-absolute-path-document-root-base-url/
    // base directory
    $base_dir = __DIR__;
    // server protocol
    $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    // domain name
    $domain = $_SERVER['SERVER_NAME'];
    $doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
    // base url
    $base_url = preg_replace("!^${doc_root}!", '', $base_dir);
    // server port
    $port = $_SERVER['SERVER_PORT'];
    $disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
    // put em all together to get the complete base URL
    if ($isServer) {
        return "${protocol}://${domain}${disp_port}${base_url}/";
    }
    return "$doc_root/${base_url}/";
}

?>