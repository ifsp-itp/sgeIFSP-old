<?php 
require"conexao.php";
$idEvnt = $_POST["idEvnt"];
$idpart = $_POST["id"];
$cursos = $_POST["cursos"];

foreach($_POST["cursos"] as $selecionado => $valor){
	   	$sql="INSERT into tblpartcurso values(null,
	'$idpart',
	'$valor'
	)";
	if (mysqli_query($conexao, $sql)) {

	header("Location:../Adm/pages/login.php?idEvnt=$idEvnt&aviso=5");   
	

	} else {

	echo "Erro:" . mysqli_error($conexao);

	}
}
           

	


		

 ?>