<?php 
	
	function cadastrarAtividade($nome, $tipo, $dtinicio, $dttermino, $conteudo, $cargahoraria, $limitpart, $idminist, $idevento, $hrinicio, $hrtermino, $local){
		$sql="INSERT into tblCursos values(null, '$nome', '$tipo', '$dtinicio',";
		if ($dttermino == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$dttermino',";
		}
		$sql.="'$conteudo', '$cargahoraria',";
		if ($limitpart == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$limitpart',";
		}
		$sql.="'$idminist', '$idevento',";
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
		return $resultado ? "Atividade cadastrada com sucesso" : "Erro.";
	}

	function consultarAtividades(){
		$sql = "SELECT * from tblcursos curso, tblministrantes minis, tbleventos evento where curso.idminist = minis.idminist and curso.idEvento = evento.idEvnt";
		$resultado = mysqli_query(conn(), $sql);
  		$atividades = array();
	    while ($linha = mysqli_fetch_array($resultado)) {
	        $atividades[] = $linha;
	    }
	    desconn();
	    return $atividades;
	}

	function consultarAtvEvnt($id){
		$sql = "SELECT * from tblcursos where idEvento = $id";
		$resultado = mysqli_query(conn(), $sql);
  		$atividades = array();
	    while ($linha = mysqli_fetch_array($resultado)) {
	        $atividades[] = $linha;
	    }
	    desconn();
	    return $atividades;
	}

	function alterarAtividade($nome, $tipo, $dtinicio, $dttermino, $conteudo, $cargahoraria, $limitpart, $idminist, $idevento, $hrinicio, $hrtermino, $local, $id){
		$sql="UPDATE tblCursos set nmCurso = '$nome', tpCurso = '$tipo', dtInicioCurso = '$dtinicio', dtTermCurso = ";
		if ($dttermino == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$dttermino',";
		}
		$sql.=" contProgCurso = '$conteudo', crgHrCurso = '$cargahoraria', limitPart = "; 
		if ($limitpart == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$limitpart',";
		}
		$sql.=" idMinist = $idminist, idEvento = $idevento, horaInicioCurso = ";
		if ($hrinicio == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$hrinicio',";
		}
		$sql.=" horaTermCurso = ";
		if ($hrtermino == "")
		{
			$sql.="null,";
		}
		else
		{
			$sql.="'$hrtermino',";
		}
		$sql.=" localCurso = ";
		if ($local == "")
		{
			$sql.="null";
		}
		else
		{
			$sql.="'$local'";
		}
		$sql.=" where idCurso = $id";

		$resultado = mysqli_query(conn(), $sql);
		return $resultado ? "Atividade alterada com sucesso" : "Erro.";
	}

	function excluirAtividade($id){
		$sql = "DELETE FROM tblCursos where idCurso = $id";
		$resultado = mysqli_query(conn(), $sql);
  		return $resultado ? "Atividade deletada com sucesso" : "Erro.";
	}

	function verAtividade($id) {
	    $sql = "SELECT * FROM tblCursos WHERE idCurso= $id";
	    $resultado = mysqli_query(conn(), $sql);
	    $atividade = mysqli_fetch_array($resultado);
	    desconn();
	    return $atividade;
	}

 ?>