<?php  

  $idEvnt = $_GET["idEvnt"];

  require "php/processamento.php";

  $atividades = selecionarAtividades($idEvnt);

  $partAtv = pegarPartAtv();

  $idPart = $partAtv["MAX(idPart)"];

  if(isset($_GET["aviso"])){
  if($_GET["aviso"] == 1){
    echo "<script> alert('Participante cadastrado com sucesso.'); </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inscrição em Atividades</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

  </head>
<body id="page-top">
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Atividades</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        
      </div>
    </nav>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Atividades</h2>
            <p>Selecione abaixo as atividades em que deseja participar.</p>
          </div>
        </div>
        <div class="col-lg-12 text-center">
          <table border = '1' width = '100%' bordercolor = 'black'>
          <form action="php/processapartcurso.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $idPart; ?>">
            <input type="hidden" name="idEvnt" value="<?php echo $idEvnt; ?>">
            
                <tr>
                  <td>
                    <div align='justify'>
                    <b>Nome da Atividade</b>
                  </td>
                  <td>
                    <b>Data (Início/Término)</b>
                  </td>
                  <td>
                    <b>Hora (Início/Término)</b>
                  </td>
                  <td>
                    <b>Local</b>
                  </td>
                  <td>
                    <b>Ministrante</b>
                  </td>

              <?php 

                foreach ($atividades as $atividade):

                  $id = $atividade["idCurso"];
                  $nome = $atividade["nmCurso"];
                  $dtInicio = $atividade["dtInicioCurso"];
                  $dtTermino = $atividade["dtTermCurso"];
                  $hrInicio = $atividade["horaInicioCurso"];
                  $hrTermino = $atividade["horaTermCurso"];
                  $ministrante = $atividade["nmMinist"];
                  $local = $atividade["localCurso"];

                  if ($dtTermino == ""){
                    $dtTermino = $dtInicio;
                  }
                
                  echo "<tr>";
                  echo "<td>";            
                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='cursos[]'  type='checkbox' value='$id'> $nome<br>" ;
                  echo "</td>";
                  echo "<td>";
                  echo "$dtInicio à $dtTermino";
                  echo "</td>";
                  echo "<td>";
                  echo "$hrInicio à $hrTermino";
                  echo "</td>";
                  echo "<td>";
                  echo "$local";
                  echo "</td>";
                  echo "<td>";
                  echo "Prof. $ministrante";
                  echo "</td>";
                  echo "</div>";
                  echo "</td>";
                  echo "</tr>";

                endforeach; ?>
          
          </table> 

          <br>

          <input class="btn btn-primary btn-block" type="submit" value="Fazer Inscrição">
          </form>
              
        </div>
      </div>
    </section>

    
    <!-- Footer -->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Itapetininga, Junho de 2018.</small>
          <small><a href="https://itp.ifsp.edu.br/ifspitap/" target="_blank"> IFSP - Campus Itapetininga</a>.</small>
          <small>Desenvolvido por Alunos do 4º Semestre de M.S.I.</small>
        </div>
      </div>
    </footer>

    
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

  </body>

</html>
