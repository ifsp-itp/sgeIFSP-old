<?php 

	function cadastrarAdministrador($email, $senha, $nome){
		$sql="INSERT into tbladministrador values(null, '$nome', '$email', SHA1('$senha'))";
		$resultado = mysqli_query(conn(), $sql);
		return $resultado ? "Administrador cadastrado com sucesso" : "Erro.";
	}

	function verAdministrador($id) {
	    $sql = "SELECT * from tbladministrador where idAdm = $id";
        $resultado = mysqli_query(conn(), $sql);
	    $administrador = mysqli_fetch_array($resultado);
	    desconn();
	    return $administrador;
	}

	function alterarAdministrador($id, $email, $senha, $nome){
		$sql="UPDATE tbladministrador set nomeAdm = '$nome', login = '$email', senha = SHA1('$senha') where idAdm = $id";
		$resultado = mysqli_query(conn(), $sql);
		return $resultado ? "Administrador alterado com sucesso" : "Erro.";
	}

	function excluirAdministrador($id){
		$sql = "DELETE FROM tbladministrador where idAdm = $id";
  		$resultado = mysqli_query(conn(), $sql);
  		return $resultado ? "Administrador excluído com sucesso, sessão encerrada." : "Erro.";
	}
 ?>