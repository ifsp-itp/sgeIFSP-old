<?php 
	
	function cadastrarEvento($nome, $tipo, $dtinicio, $dttermino, $dtlimite, $conteudo, $responsavel, $cargahoraria, $hrinicio, $hrtermino, $local){
		$sql="INSERT into tbleventos values(null,
		'$nome', '$tipo', '$dtinicio',";

		if ($dttermino == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$dttermino',";
		}
		if ($dtlimite == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$dtlimite',";
		}

		$sql.="'$conteudo', '$responsavel', '$cargahoraria',";
		if ($hrinicio == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$hrinicio',";
		}
		if ($hrtermino == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$hrtermino',";
		}
		if ($local == "")
		{
			$sql.="null";
		}
		else
		{
			$sql.="'$local'";
		}
		$sql.=");";

		$resultado = mysqli_query(conn(), $sql);
		return $resultado ? "Evento cadastrado com sucesso." : "Erro.";

	}

	function consultarEventos(){
		$sql = "SELECT * FROM tblEventos";
		$resultado = mysqli_query(conn(), $sql);
  		$eventos = array();
	    while ($linha = mysqli_fetch_array($resultado)) {
	        $eventos[] = $linha;
	    }
	    desconn();
    	return $eventos; 
	}

	function alterarEvento($id, $nome, $tipo, $dtinicio, $dttermino, $dtlimite, $conteudo, $responsavel, $cargahoraria, $hrinicio, $hrtermino, $local){
		$sql="UPDATE tblEventos set nmEvnt = '$nome', tpEvnt = '$tipo', dtInicioEvnt = '$dtinicio.', dtTermEvnt = "; 
		if ($dttermino == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$dttermino',";
		}
		$sql.=" dtLimitInsc = ";
		if ($dtlimite == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$dtlimite',";
		}
		$sql.=" contProgEvnt = '$conteudo', respEvnt = '$responsavel', crgHrEvnt = '$cargahoraria', horaInicioEvnt = ";
		if ($hrinicio == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$hrinicio',";
		}
		$sql.=" horaTermEvnt = ";
		if ($hrtermino == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$hrtermino',";
		}
		$sql.=" localEvnt = ";
		if ($local == "")
		{
			$sql.="null";
		}
		else
		{
			$sql.="'$local'";
		}
		$sql.=" where idEvnt = $id";

		$resultado = mysqli_query(conn(), $sql);
		return $resultado ? "Evento alterado com sucesso." : "Erro.";

	}

	function excluirEvento($id){
		$sql = "DELETE FROM tblEventos where idEvnt = $id";
		$resultado = mysqli_query(conn(), $sql);
  		return $resultado ? "Evento excluído com sucesso." : "Erro.";
	}

	function verEvento($id) {
	    $sql = "SELECT * FROM tbleventos WHERE idEvnt= $id";
	    $resultado = mysqli_query(conn(), $sql);
	    $evento = mysqli_fetch_array($resultado);
	    desconn();
	    return $evento;
	}

 ?>