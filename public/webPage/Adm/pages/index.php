<?php 

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

session_start();

if(!isset($_SESSION["logado"])){
  header("Location: index.php?aviso=3");
}

if(isset($_GET["aviso"])){
    if($_GET["aviso"] == 1){
    echo "<script> alert('Bem vindo, ".$_SESSION["nome"]. ". Sinta-se à vontade.'); </script>";
    }
  }

  $idEvnt = $_SESSION["idEvnt"];

  require "conexao.php";

  $sql = "SELECT * from tbleventos where idEvnt = $idEvnt";

  $resultado = mysqli_query($conexao, $sql);
        
  $evento = mysqli_fetch_array($resultado);

  $nmEvnt = $evento["nmEvnt"];

  $eventoSemAcento = sanitizeString($nmEvnt);

  $idPart = $_SESSION["id"];

  $nomePart = $_SESSION["nome"];

  $partSemAcento = sanitizeString($nomePart);

  $sql1 = "SELECT * from tblpartcurso INNER JOIN tblparticipantes ON tblparticipantes.idPart = tblPartCurso.idPart INNER JOIN tblCursos ON tblCursos.idCurso = tblPartCurso.idCurso WHERE tblparticipantes.idPart = $idPart";

  $rst1 = mysqli_query($conexao, $sql1);

  $atividades = array();

  while ($linha = mysqli_fetch_array($rst1)){
    $atividades[] = $linha;
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Área do Participante</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Participante</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Configurações de usuário<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="readpart.php">Dados do participante</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>          

    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Certificados Disponíveis</h1>
                        <p>Baixe aqui os Certificados relativos as Atividades que você frequentou.</p>

                        <?php
                            $certEvnt = '../../../certificados/'.$eventoSemAcento.'/'.$partSemAcento.'.pdf';

                            if (file_exists($certEvnt)) {
                                echo "<a href = '$certEvnt' download>Certificado Geral do Evento</a><br>";
                            } else {
                                echo "Certificado ainda não disponível, desculpe.<br>";
                            }

                            foreach ($atividades as $atividade){
                                $atvSemAcento = sanitizeString($atividade['nmCurso']);

                                $certAtv = '../../../certificados/'.$eventoSemAcento.'/'.$atvSemAcento.'/'.$partSemAcento.'.pdf';

                                if (file_exists($certAtv)) {
                                    echo "<a href = '$certAtv' download>Certificado de Atividade - ".$atividade['nmCurso']."</a>";
                                } else {
                                    echo "Certificado ainda não disponível, desculpe.";
                                }
                            }
                        ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
