<?php  
require"conexao.php";

	$id=$_GET["id"];

$sql="DELETE from tblparticipantes where idPart=$id";

if (mysqli_query($conexao, $sql)) {

header("location:login.php?aviso=6");
session_destroy();

} else {

echo "Erro:" . mysqli_error($conexao);

}

mysqli_close($conexao);

?>