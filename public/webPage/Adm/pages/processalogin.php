<?php
require"conexao.php";

session_start();
$idEvnt = $_POST["idEvnt"];
$login = $_POST["login"];
$password = sha1($_POST["password"]) ;

	$sql="SELECT * from tblparticipantes where emailPart='$login'";
	$resultado = mysqli_query($conexao, $sql);
	$linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
	$nome = $linha["nmPart"];
	$id = $linha["idPart"];

	if($linha['emailPart'] == $login && $linha['senhaPart'] == $password) {

		echo "string";

		$_SESSION["nome"] = $nome;
		$_SESSION["logado"] = $login;
		$_SESSION["id"] = $id;	
		$_SESSION["idEvnt"] = $idEvnt;
		header("Location:index.php?aviso=1");

	}else {
		header("Location:login.php?aviso=2");
	}

?>