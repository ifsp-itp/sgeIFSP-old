<?php  

  session_start();

  if(!isset($_SESSION["logado"])){
    header("Location: login.php?aviso=3");
    }
  
  require"conexao.php";
  $id=$_GET["id"];
  $sql = "SELECT * FROM tblParticipantes where idPart = ".$_GET["id"];
  $resultado = mysqli_query($conexao, $sql);
  $linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Participante</title>

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
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Configurações de Usuario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="readpart.php">Dados Participante</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
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
                        <h1 class="page-header">Alterar dados</h1>
                        
                        <div class="col-lg-12">
            <form action="processaalterapart.php" method="POST" >
              <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="nome" name="nome" type="text" value="<?php echo $linha['nmPart'];?>">
                    
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="tel" name="tel" type="tel" value="<?php echo $linha['phonePart'];?>">
                    
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="cpf" name="cpf" type="text" value="<?php echo $linha['cpfPart'];?>">
                    
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" name="email" type="email" value="<?php echo $linha['emailPart'];?>">
                    
                  </div>
                </div>
                <div class="col-md-6">
                <label for="exampleInputLastName" class="section-heading text-uppercase">Ocupação Participante</label><br>
                
                <input  id="exampleInputLastName" aria-describedby="nameHelp" type="radio" value="Estudante Escola Municipal" name="Ocupacao" checked><label for="exampleInputLastName" class="section-heading text-uppercase">Estudante Escola Municipal</label><br>

                <input  id="exampleInputLastName" aria-describedby="nameHelp" type="radio" value="Estudante Escola Estadual" name="Ocupacao"><label for="exampleInputLastName" class="section-heading text-uppercase">Estudante Escola Estadual</label><br>
                
                <input  id="exampleInputLastName" aria-describedby="nameHelp" type="radio" value="Estudante de Escola Federal" name="Ocupacao"><label for="exampleInputLastName" class="section-heading text-uppercase">Estudante de Escola Federal</label><br>

                <input  id="exampleInputLastName" aria-describedby="nameHelp" type="radio" value="Professor" name="Ocupacao"><label for="exampleInputLastName" class="section-heading text-uppercase">Professor</label><br>

                <input  id="exampleInputLastName" aria-describedby="nameHelp" type="radio" value="Outro profissional" name="Ocupacao"><label for="exampleInputLastName" class="section-heading text-uppercase">Outro profissional</label>
              </div>

              
                
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Alterar Cadastro</button>
                </div>
              </div>
            </form>
          </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
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
