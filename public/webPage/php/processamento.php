<?php 

	function selecionarEvento($id){
		require "conexao.php";
		
		$sql = "SELECT * FROM tbleventos WHERE idEvnt = $id";
	    
	    $resultado = mysqli_query($conexao, $sql);
	    
	    $evento = mysqli_fetch_array($resultado);
	    
	    return $evento;
	}

	function selecionarImagem($id){
		require "conexao.php";

		$sql = "SELECT * FROM tblFiguras where idEvento = $id and tipoFigura = 'Plano_de_Fundo' order by idFigura desc limit 1";

        $resultado = mysqli_query($conexao, $sql);

        $imagem = mysqli_fetch_array($resultado);

        return $imagem;
	}

	function selecionarLogo($id){
		require "conexao.php";

		$sql = "SELECT * FROM tblFiguras where idEvento = $id and tipoFigura = 'Logo' order by idFigura desc limit 1";

        $resultado = mysqli_query($conexao, $sql);

        $logo = mysqli_fetch_array($resultado);

        return $logo;
	}

	function selecionarGaleria($id){
		require "conexao.php";

		$sql = "SELECT * FROM tblFiguras where idEvento = $id and tipoFigura = 'Galeria' order by idFigura desc limit 6";

        $resultado = mysqli_query($conexao, $sql);

        $galeria = array();
	    	while ($linha = mysqli_fetch_array($resultado)) {
	        $galeria[] = $linha;
	    }

        return $galeria;
	}

	function selecionarAtividades($id){
		require "conexao.php";

		$sql = "SELECT * FROM tblCursos, tblministrantes where tblCursos.idMinist = tblministrantes.idMinist and tblCursos.idEvento = ".$id;

	  	$resultado = mysqli_query($conexao, $sql);

        $atividades = array();
	    	while ($linha = mysqli_fetch_array($resultado)) {
	        $atividades[] = $linha;
	    }

		return $atividades;
 	}

	function pegarPartAtv(){
		require "conexao.php";

		$sql1 = "SELECT MAX(idPart) from tblParticipantes";

	  	$resultado1 = mysqli_query($conexao, $sql1);

		$partAtv = mysqli_fetch_array($resultado1, MYSQLI_ASSOC);

		return $partAtv;
	}

 ?>