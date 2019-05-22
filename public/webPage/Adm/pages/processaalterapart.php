<?php 
require"conexao.php";
$id=$_POST["id"];
$email=$_POST["email"];
$nome=$_POST["nome"];
$cpf=$_POST["cpf"];
$tel=$_POST["tel"];
$ocupacao=$_POST["Ocupacao"];

$sql="UPDATE tblParticipantes set nmPart='$nome', cpfPart='$cpf', emailPart='$email', phonePart='$tel', ocupPart='$ocupacao' where idPart=$id;";

if (mysqli_query($conexao, $sql)) {


header("Location:readpart.php?aviso=2");

} else {

echo "Erro:" . mysqli_error($conexao);

}

mysqli_close($conexao);






?>