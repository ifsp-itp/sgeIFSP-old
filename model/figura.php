<?php 
	function adicionarFigura($foto, $idevento, $tipo){
		if (!empty($foto["name"])) {
		    $largura = 5000;
		    $altura = 5000;
		    $tamanho = 9999999;
		 
		    $error = array();
	 
	      	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
	        	$error[1] = "Isso não é uma imagem.";
	      	} 
	  
	    	$dimensoes = getimagesize($foto["tmp_name"]);
	  
		    if($dimensoes[0] > $largura) {
		    	$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		    }
		 
		    if($dimensoes[1] > $altura) {
		    	$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		    }
		    
		    if($foto["size"] > $tamanho) {
		    	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		    }
	 
		    if (count($error) == 0) {
		    	preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
		        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

	          	if ($tipo == 'Logo') {
	            	$caminho_imagem = "img/" . $nome_imagem;
	          	} else {
	            	$caminho_imagem = "webPage/img/" . $nome_imagem;
	          	}
	 
        	move_uploaded_file($foto["tmp_name"], "../sgeIF/public/".$caminho_imagem);
    
	        $sql = "INSERT INTO tblFiguras (caminho, tipoFigura, idEvento) VALUES ('$caminho_imagem','$tipo','$idevento')";
	        $resultado = mysqli_query(conn(), $sql);
		    return $resultado ? "Figura adicionada com sucesso." : "Erro.";
			}

			if (count($error) != 0) {
      			foreach ($error as $erro) {
        			echo $erro . "<br />";
      			}
			}
		}
	}
 ?>