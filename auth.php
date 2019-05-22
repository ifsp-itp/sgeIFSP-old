<?php

function authInit() {
    if(!isset($_SESSION["alert"])){
        $_SESSION["alert"] = array();
    }
}

function authLogin($login, $password) {
	
	$sql="SELECT * from tbladministrador where login='$login'";
	$resultado = mysqli_query(conn(), $sql);
	$linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		
	if($login == $linha['login'] && $password == $linha['senha']) {

		$id = $linha["idAdm"];
		$nome = $linha["nomeAdm"];

		$_SESSION["auth"] = array("user" => "$login", "role" => "admin");
		$_SESSION["id"] = $id;
		$_SESSION["nome"] = $nome;

		return true;
	}
	return false;
}

function authIsLoggedIn() {
	return isset($_SESSION["auth"]);
}

function authLogout() {
	if(isset($_SESSION["auth"])) {
		$_SESSION["auth"] = null;
		unset($_SESSION["auth"]);
	}	
}

function authGetUserRole() {
	if(authIsLoggedIn()) {
		return $_SESSION["auth"]["role"];
	}
}

?>