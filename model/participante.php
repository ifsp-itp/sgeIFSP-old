<?php 
	
	function listarParticipantesAtv($idatividade){
		$sql="SELECT * from tblpartcurso INNER JOIN tblparticipantes ON tblparticipantes.idPart = tblPartCurso.idPart INNER JOIN tblCursos ON tblCursos.idCurso = tblPartCurso.idCurso where tblCursos.idCurso = ".$idatividade." ORDER BY tblparticipantes.nmPart ASC;";
		$participantes = array();
		$resultado = mysqli_query(conn(), $sql);
    	while ($linha = mysqli_fetch_array($resultado)) {
        	$participantes[] = $linha;
    	}
    	desconn();
		return $participantes;
	}

	function listarParticipantesGeral(){
		$sql = "SELECT * from tblparticipantes ORDER BY nmPart ASC";
		$resultado = mysqli_query(conn(), $sql);
  		$participantes = array();
	    while ($linha = mysqli_fetch_array($resultado)) {
	        $participantes[] = $linha;
	    }
	    desconn();
    	return $participantes; 
	}

	function gerarCertificados($idatividade, $emissor){

		$sql0 = "SELECT max(idfigura) from tblfiguras where tipofigura = 'logo'";
		$rst0 = mysqli_query(conn(), $sql0);
		$figura = mysqli_fetch_array($rst0);

		$idfigura = $figura["max(idfigura)"];

		$sql1 = "SELECT * from tblpartcurso INNER JOIN tblparticipantes ON tblparticipantes.idPart = tblPartCurso.idPart INNER JOIN tblCursos ON tblCursos.idCurso = tblPartCurso.idCurso INNER JOIN tbleventos ON tbleventos.idEvnt = tblCursos.idEvento INNER JOIN tblministrantes ON tblMinistrantes.idMinist = tblCursos.idMinist INNER JOIN tblfiguras ON tblFiguras.idEvento = tbleventos.idEvnt where tblfiguras.idfigura = ".$idfigura." and tblCursos.idCurso = ".$idatividade." ORDER BY tblparticipantes.nmPart ASC";
		$rst1 = mysqli_query(conn(), $sql1);

		require_once('../sgeIF/public/fpdf/fpdf.php');
		require_once("../sgeIF/public/fpdf/makefont/makefont.php"); 
		define('FPDF_FONTPATH','../sgeIF/public/fpdf/font'); 		

		$caminho = "../sgeIF/public/certificados";

		function gerarCertificadoEvento($data,$datainicial,$datafim,$idpart,$nome,$idevento,$evento,$caminho,$respemis,$organizador,$logo,$eventoSemAcento,$partSemAcento){
		
		//CRIA O PDF
			$pdf=new FPDF();
			$pdf->SetTitle('Certificado de '. utf8_decode($nome)); 
			
			// ABRE O PDF PARA EDIÇÃO
			$pdf->Open();
			
			// ADICIONA UMA PÁGINA AO ARQUIVO
			$pdf->AddPage('L','A4');
			$pdf->AddFont('Century','','Century.php');
						
			// ADICIONA IMAGEM (CABEÇALHO)
			$pdf->Image('../sgeIF/public/img/logoif.jpg',20,10,80,30);
			
			// ADICIONA IMAGEM (CABEÇALHO)
			
			$lv = "../sgeIF/public/" . $logo;
			
			

			$pdf->Image($lv,210,10,70,40);

			$pdf->SetFont('Century', '', 56);
			$pdf->SetY(60);
			$pdf->SetX(80);
			$pdf->Cell(145,0,utf8_decode('Certificado'),0,0,'C');
			
			$pdf->SetY(75);
			$pdf->SetX(40);
			
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Century', '', 18);
			
			
			
				$pdf->MultiCell(220, 10, utf8_decode("Certificamos que $nome participou do $evento, $data nas dependências do Instituto Federal de Educação, Ciência e Tecnologia de São Paulo - IFSP, Câmpus Itapetininga."),0,"J",false);
				
			//data e cidade
			
			setlocale(LC_TIME, 'portuguese');
			date_default_timezone_set('America/Sao_Paulo');

			$date = date('Y-m-d');
			$d =  strftime("%d de %B de %Y", strtotime($date));
						
  
			$pdf->SetFont('Century', '', 18);
			$pdf->SetY(140);
			$pdf->SetX(140);
			$pdf->Cell(145,0,utf8_decode("Itapetininga, $d."),0,0,'C');
			 
			//ADICIONA A ASSINATURA
			$pdf->Image('../sgeIF/public/img/assinaturaragnar.jpg',58,150,53,16);
			
			//NOME DO ASSINANTE
			$pdf->SetFont('Century', '', 12);
			$pdf->SetY(177);
			$pdf->SetX(8);
			$pdf->Cell(145,0,utf8_decode('Prof. Ms. Ragnar Orlando Hammarstrom'),0,0,'C');

			//ADICIONA A ASSINATURA
			$pdf->Image('../sgeIF/public/img/assinaturamaria.jpg',200,150,43,16);
			
			//NOME DO ASSINANTE
			$pdf->SetFont('Century', '', 12);
			$pdf->SetY(177);
			$pdf->SetX(150);
			$pdf->Cell(145,0,utf8_decode('Nair Maria Monteiro de Moraes'),0,0,'C');
			
			//TITULO OU FUNCAO DO ASSINANTE
			$pdf->ln(7);
			$pdf->SetX(10);
			$pdf->Cell(145,0,utf8_decode("Diretor Geral"),0,0,'C');
			//TITULO OU FUNCAO DO ASSINANTE
			$pdf->SetX(150);
			$pdf->Cell(145,0,utf8_decode("Coordenadora de Extensão"),0,0,'C');
			
			
			

			

			//adiciona mais uma pagina ao arquivo
			$pdf->AddPage('L','A4');
			$pdf->AddFont('Century','','Century.php');

			$pdf->Image('../sgeIF/public/img/cpi.jpg',30,60,80,40);

			$pdf->Image('../sgeIF/public/img/extensao.PNG',30,110,80,40);

			$pdf->Image('../sgeIF/public/img/republica.PNG',150,30,130,90);

			//GERA O ARQUIVO PDF COM O NOME DO ALUNO E SALVA NO SERVIDOR EM PASTA ESPECIFICA DO EVENTO
			$pdf->Output($caminho."/$eventoSemAcento/".$partSemAcento.".pdf","F");

			$sql2 = "INSERT INTO tblcertificados (codRegistro, idPart, idEvento, dataGeracao, dtInicio, dtTermino, responsEmissao, organizador) 
			VALUES (NULL,
			".$idpart.",
			".$idevento.",
			CURTIME(),
			'".$datainicial."',
			'".$datafim."',
			'".$respemis."',
			'".$organizador."'
			);";

			$rst2 = mysqli_query(conn(), $sql2);

			return $rst2;

	}

	function geraCertificadoAtividade($data,$datainicial,$datafim,$idpart,$nome,$idevento,$evento,$idatv,$atividade,$tpatv,$caminho,$contprog,$cargahoraria,$respemis,$organizador,$logo,$eventoSemAcento,$atvSemAcento,$partSemAcento)

	{
		
		//CRIA O PDF
			$pdf=new FPDF();
			$pdf->SetTitle('Certificado de '. utf8_decode($nome)); 
			
			// ABRE O PDF PARA EDIÇÃO
			$pdf->Open();
			
			// ADICIONA UMA PÁGINA AO ARQUIVO
			$pdf->AddPage('L','A4');
			$pdf->AddFont('Century','','Century.php');
						
			// ADICIONA IMAGEM (CABEÇALHO)
			$pdf->Image('../sgeIF/public/img/logoif.jpg',20,10,80,30);
			
			// ADICIONA IMAGEM (CABEÇALHO)
			$lv = "../sgeIF/public/" . $logo;

			$pdf->Image($lv,210,10,70,40);

			$pdf->SetFont('Century', '', 56);
			$pdf->SetY(60);
			$pdf->SetX(80);
			$pdf->Cell(145,0,utf8_decode('Certificado'),0,0,'C');
			
			$pdf->SetY(75);
			$pdf->SetX(40);
			
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Century', '', 18);
			
			
			
				$pdf->MultiCell(220, 10, utf8_decode("Certificamos que $nome participou do(a) $tpatv \"$atividade\", com carga horária de $cargahoraria, durante o $evento, $data nas dependências do Instituto Federal de Educação, Ciência e Tecnologia de São Paulo - IFSP, Câmpus Itapetininga."),0,"J",false);
				
			//data e cidade
			
			setlocale(LC_TIME, 'portuguese');
			date_default_timezone_set('America/Sao_Paulo');

			$date = date('Y-m-d');
			$d =  strftime("%d de %B de %Y", strtotime($date));
						
  
			$pdf->SetFont('Century', '', 18);
			$pdf->SetY(140);
			$pdf->SetX(140);
			$pdf->Cell(145,0,utf8_decode("Itapetininga, $d."),0,0,'C');
			 
			//ADICIONA A ASSINATURA
			$pdf->Image('../sgeIF/public/img/assinaturaragnar.jpg',58,150,53,16);
			
			//NOME DO ASSINANTE
			$pdf->SetFont('Century', '', 12);
			$pdf->SetY(177);
			$pdf->SetX(8);
			$pdf->Cell(145,0,utf8_decode('Prof. Ms. Ragnar Orlando Hammarstrom'),0,0,'C');

			//ADICIONA A ASSINATURA
			$pdf->Image('../sgeIF/public/img/assinaturamaria.jpg',200,150,43,16);
			
			//NOME DO ASSINANTE
			$pdf->SetFont('Century', '', 12);
			$pdf->SetY(177);
			$pdf->SetX(150);
			$pdf->Cell(145,0,utf8_decode('Nair Maria Monteiro de Moraes'),0,0,'C');
			
			//TITULO OU FUNCAO DO ASSINANTE
			$pdf->ln(7);
			$pdf->SetX(10);
			$pdf->Cell(145,0,utf8_decode("Diretor Geral"),0,0,'C');
			//TITULO OU FUNCAO DO ASSINANTE
			$pdf->SetX(150);
			$pdf->Cell(145,0,utf8_decode("Coordenadora de Extensão"),0,0,'C');
			
			
			

			

			//adiciona mais uma pagina ao arquivo
			$pdf->AddPage('L','A4');
			$pdf->AddFont('Century','','Century.php');

			$pdf->Image('../sgeIF/public/img/extensao.png',45,90,60,30);

			$pdf->Image('../sgeIF/public/img/cpi.jpg',45,130,60,30);

			$pdf->Image('../sgeIF/public/img/republica.PNG',150,30,130,90);

			$pdf->SetY(30);
			$pdf->SetX(40);
			
			$pdf->SetFont('Century', '', 13);

			$pdf->MultiCell(75, 10, utf8_decode("CONTEÚDO PROGRAMÁTICO $contprog"),0,"J",false);

			//GERA O ARQUIVO PDF COM O NOME DO ALUNO E SALVA NO SERVIDOR EM PASTA ESPECIFICA DO EVENTO
			$pdf->Output($caminho."/$eventoSemAcento/$atvSemAcento/".$partSemAcento.".pdf","F");

			$sql3 = "INSERT INTO tblcertificados (codRegistro, idPart, idEvento, dataGeracao, idCurso, dtInicio, dtTermino, responsEmissao, conteudoProg, organizador) 
			VALUES (NULL,
			".$idpart.",
			".$idevento.",
			CURTIME(),
			".$idatv.",
			'".$datainicial."',
			'".$datafim."',
			'".$respemis."',
			'".$contprog."',
			'".$organizador."'
			);";

			$rst3 = mysqli_query(conn(), $sql3);

	}

	function geraCertificadoMinist($data,$datainicial,$datafim,$idminist,$nomeminist,$idevento,$evento,$idatv,$atividade,$tpatv,$caminho,$respemis,$organizador,$logo,$eventoSemAcento,$ministSemAcento)

	{
		
		//CRIA O PDF
			$pdf=new FPDF();
			$pdf->SetTitle('Certificado de '. utf8_decode($nomeminist)); 
			
			// ABRE O PDF PARA EDIÇÃO
			$pdf->Open();
			
			// ADICIONA UMA PÁGINA AO ARQUIVO
			$pdf->AddPage('L','A4');
			$pdf->AddFont('Century','','Century.php');
						
			// ADICIONA IMAGEM (CABEÇALHO)
			$pdf->Image('../sgeIF/public/img/logoif.jpg',20,10,80,30);
			
			// ADICIONA IMAGEM (CABEÇALHO)

			$lv = "../sgeIF/public/" . $logo;

			$pdf->Image($lv,210,10,70,40);

			$pdf->SetFont('Century', '', 56);
			$pdf->SetY(60);
			$pdf->SetX(80);
			$pdf->Cell(145,0,utf8_decode('Certificado'),0,0,'C');
			
			$pdf->SetY(75);
			$pdf->SetX(40);
			
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Century', '', 18);
			
			
			
				$pdf->MultiCell(220, 10, utf8_decode("Certificamos que Prof. $nomeminist proferiu o(a) $tpatv \"$atividade\" no $evento, $data nas dependências do Instituto Federal de Educação, Ciência e Tecnologia de São Paulo - IFSP, Câmpus Itapetininga."),0,"J",false);
				
			//data e cidade
			
			setlocale(LC_TIME, 'portuguese');
			date_default_timezone_set('America/Sao_Paulo');

			$date = date('Y-m-d');
			$d =  strftime("%d de %B de %Y", strtotime($date));
						
  
			$pdf->SetFont('Century', '', 18);
			$pdf->SetY(140);
			$pdf->SetX(140);
			$pdf->Cell(145,0,utf8_decode("Itapetininga, $d."),0,0,'C');
			 
			//ADICIONA A ASSINATURA
			$pdf->Image('../sgeIF/public/img/assinaturaragnar.jpg',58,150,53,16);
			
			//NOME DO ASSINANTE
			$pdf->SetFont('Century', '', 12);
			$pdf->SetY(177);
			$pdf->SetX(8);
			$pdf->Cell(145,0,utf8_decode('Prof. Ms. Ragnar Orlando Hammarstrom'),0,0,'C');

			//ADICIONA A ASSINATURA
			$pdf->Image('../sgeIF/public/img/assinaturamaria.jpg',200,150,43,16);
			
			//NOME DO ASSINANTE
			$pdf->SetFont('Century', '', 12);
			$pdf->SetY(177);
			$pdf->SetX(150);
			$pdf->Cell(145,0,utf8_decode('Nair Maria Monteiro de Moraes'),0,0,'C');
			
			//TITULO OU FUNCAO DO ASSINANTE
			$pdf->ln(7);
			$pdf->SetX(10);
			$pdf->Cell(145,0,utf8_decode("Diretor Geral"),0,0,'C');
			//TITULO OU FUNCAO DO ASSINANTE
			$pdf->SetX(150);
			$pdf->Cell(145,0,utf8_decode("Coordenadora de Extensão"),0,0,'C');
			
			
			

			

			//adiciona mais uma pagina ao arquivo
			$pdf->AddPage('L','A4');
			$pdf->AddFont('Century','','Century.php');

			$pdf->Image('../sgeIF/public/img/cpi.jpg',30,60,80,40);

			$pdf->Image('../sgeIF/public/img/extensao.PNG',30,110,80,40);

			$pdf->Image('../sgeIF/public/img/republica.PNG',150,30,130,90);

			//GERA O ARQUIVO PDF COM O NOME DO ALUNO E SALVA NO SERVIDOR EM PASTA ESPECIFICA DO EVENTO
			$pdf->Output($caminho."/$eventoSemAcento/ministrantes/".$ministSemAcento.".pdf","F");

			$sql4 = "INSERT INTO tblcertificados (codRegistro, idMinist, idEvento, dataGeracao, idCurso, dtInicio, dtTermino, responsEmissao,  organizador) 
			VALUES (NULL,
			".$idminist.",
			".$idevento.",
			CURTIME(),
			".$idatv.",
			'".$datainicial."',
			'".$datafim."',
			'".$respemis."',
			'".$organizador."'
			);";

			$rst4 = mysqli_query(conn(), $sql4);

	}

		while ($linha = mysqli_fetch_array($rst1)) {
			$idpart = $linha["idPart"];
			$nome = $linha["nmPart"];
			$idminist = $linha["idMinist"];
			$nomeminist = $linha["nmMinist"];
			$datainicial = $linha["dtInicioEvnt"];
			$datafim = $linha["dtTermEvnt"];
			$organizador = $linha["respEvnt"];
			$idevento = $linha["idEvnt"];
			$evento = $linha["nmEvnt"];
			$atividade = $linha["nmCurso"];
			$tpatv = $linha["tpCurso"];
			$cargahoraria = $linha["crgHrCurso"];
			$contprog = $linha["contProgCurso"];
			$idatv = $linha["idCurso"];
			$respemis = $emissor;
			$logo = $linha["caminho"];

			if($datafim == ""){
				$datafim = $datainicial;
			}
			
			$meses = array("janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro");
			$aux = explode("-",$datainicial);
			
			if($aux[2]>2000) {
				$diainicial = $aux[0];
				$mesinicial = $meses[$aux[1]-1];
				$anoinicial = $aux[2];				
			} else {		
				$diainicial = $aux[2];
				$mesinicial = $meses[$aux[1]-1];
				$anoinicial = $aux[0];
			}
			
			$aux = explode("-",$datafim);
			
			if($aux[2]>2000) {
				$diafim = $aux[0];
				$mesfim = $meses[$aux[1]-1];
				$anofim = $aux[2];
				$data_aux = $aux[0]."_".$aux[1]."_".$aux[2];				
			} else {		
				$diafim = $aux[2];
				$mesfim = $meses[$aux[1]-1];
				$anofim = $aux[0];
				$data_aux = $aux[2]."_".$aux[1]."_".$aux[0];
			}		
			
			if($diainicial == $diafim) {
				$data = "realizado no dia ".$diainicial." de ".$mesinicial." de ".$anoinicial;		
			}
			
			if($diainicial != $diafim && $mesinicial == $mesfim) {
				$data = "realizado entre os dias ".$diainicial." e ".$diafim." de ".$mesinicial." de ".$anoinicial;
			} else if($diainicial != $diafim && $mesinicial != $mesfim) {
				$data = "realizado entre os dias ".$diainicial." de ".$mesinicial." e ".$diafim." de ".$mesfim." de ".$anofim;
			}
			
			if($anoinicial != $anofim) {
				$data = "realizado entre os dias ".$diainicial." de ".$mesinicial." de ".$anoinicial." e ".$diafim." de ".$mesfim." de ".$anofim;
			}

			function sanitizeString($str) {
			    $str = preg_replace('/[áàãâä]/ui', 'a', $str);
			    $str = preg_replace('/[éèêë]/ui', 'e', $str);
			    $str = preg_replace('/[íìîï]/ui', 'i', $str);
			    $str = preg_replace('/[óòõôö]/ui', 'o', $str);
			    $str = preg_replace('/[úùûü]/ui', 'u', $str);
			    $str = preg_replace('/[ç]/ui', 'c', $str);
			    // $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
			    $str = preg_replace('/[^a-z0-9]/i', '_', $str);
			    $str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
			    return $str;
			}	

			$eventoSemAcento = sanitizeString($evento);
			$partSemAcento = sanitizeString($nome);
			$atvSemAcento = sanitizeString($atividade);
			$ministSemAcento = sanitizeString($nomeminist);

			if(!is_dir($caminho."/$eventoSemAcento")) {
				mkdir($caminho."/$eventoSemAcento");
			}

			if(!is_dir($caminho."/$eventoSemAcento/$atvSemAcento")) {
				mkdir($caminho."/$eventoSemAcento/$atvSemAcento");
			}

			if(!is_dir($caminho."/$eventoSemAcento/ministrantes")) {
				mkdir($caminho."/$eventoSemAcento/ministrantes");
			}			

			$rstFinal = gerarCertificadoEvento($data,$datainicial,$datafim,$idpart,$nome,$idevento,$evento,$caminho,$respemis,$organizador,$logo,$eventoSemAcento,$partSemAcento);
			geraCertificadoAtividade($data,$datainicial,$datafim,$idpart,$nome,$idevento,$evento,$idatv,$atividade,$tpatv,$caminho,$contprog,$cargahoraria,$respemis,$organizador,$logo,$eventoSemAcento,$atvSemAcento,$partSemAcento);
			geraCertificadoMinist($data,$datainicial,$datafim,$idminist,$nomeminist,$idevento,$evento,$idatv,$atividade,$tpatv,$caminho,$respemis,$organizador,$logo,$eventoSemAcento,$ministSemAcento);
			}
			
			return $rstFinal ? "Certificados gerados com sucesso." : "Erro.";
	}
 ?>