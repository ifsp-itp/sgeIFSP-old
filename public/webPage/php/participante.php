<?php 
require"conexao.php";
$email=$_POST["email"];
$nome=$_POST["nome"];
$cpf=$_POST["cpf"];
$tel=$_POST["tel"];
$senha=sha1($_POST["senha"]);
$repita_senha=sha1($_POST["repita_senha"]);
$ocupacao=$_POST["Ocupacao"];
$idEvnt = $_POST["idEvnt"];

$sql="SELECT * from tblparticipantes where emailPart='".$email."';";
print($sql);
	$resultado = mysqli_query($conexao, $sql);
	$linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

	if($linha['emailPart'] == $email) {

		echo "Já existe um participante com esse login, por favor, escolha outro.";
		header("Location:../cadPart.php?aviso=2&id=".$idEvnt);

	}

	else {

		if ($senha == $repita_senha) {
	$sql1="INSERT into tblParticipantes values(null,
		'$nome',
		'$cpf',
		'$email',
		'$tel',
		'$ocupacao',
		'$senha'
	)";
		}
				
		if (mysqli_query($conexao, $sql1)) {

			echo "Registro adicionado com sucesso.";

			session_start();

			header("Location:../partcurso.php?aviso=1&idEvnt=".$idEvnt);

		} else {

		echo "Erro:" . mysqli_error($conexao);

		}
	}

 ?>