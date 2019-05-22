<?php 
	
	function cadastrarMinistrante($nome,$cpf,$email,$tel){
		$sql="INSERT into tblministrantes values(null,'$nome','$cpf','$email','$tel');";
		$resultado = mysqli_query(conn(), $sql);
		return $resultado ? "Ministrante cadastrado com sucesso" : "Erro.";
	}

	function consultarMinistrantes(){
		$sql = "SELECT * FROM tblMinistrantes";
  		$resultado = mysqli_query(conn(), $sql);
		$ministrantes = array();
	    while ($linha = mysqli_fetch_array($resultado)) {
	        $ministrantes[] = $linha;
	    }
	    desconn();
    	return $ministrantes; 
	}

	function alterarMinistrante($nome,$cpf,$email,$tel,$id){
		$sql="UPDATE tblministrantes set nmMinist = '$nome', cpfMinist = '$cpf', emailMinist = '$email', phoneMinist = '$tel' where idMinist = $id";
		$resultado = mysqli_query(conn(), $sql);
		return $resultado ? "Ministrante alterado com sucesso" : "Erro.";
	}

	function excluirMinistrante($id){
		$sql = "DELETE FROM tblMinistrantes where idMinist = $id";
  		$resultado = mysqli_query(conn(), $sql);
		return $resultado ? "Ministrante deletado com sucesso" : "Erro.";
	}

	function verMinistrante($id) {
	    $sql = "SELECT * FROM tblMinistrantes WHERE idMinist= $id";
	    $resultado = mysqli_query(conn(), $sql);
	    $atividade = mysqli_fetch_array($resultado);
	    desconn();
	    return $atividade;
	}
 ?>