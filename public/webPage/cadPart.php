<?php  
 
  $idEvnt = $_GET["id"];

  require"conexao.php";  
  
  if(isset($_GET["aviso"])){
  if($_GET["aviso"] == 1){
    echo "<script> alert('Participante cadastrado com sucesso.'); </script>";
  }
    if($_GET["aviso"] == 2){
    echo "<script> alert('Já existe um participante com esse login (e-mail), por favor, escolha outro.'); </script>";
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

    <title>Cadastro de Participante</title>

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

<!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
           <h2 class="section-heading text-uppercase">Cadastro de Participante</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">

            <form action="php/participante.php" method="POST">
              <input type="hidden" name="idEvnt" value="<?php echo $idEvnt; ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome Completo" required data-validation-required-message="Por Favor Entre com o Nome Completo.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="tel" name="tel" type="tel" placeholder="Telefone" required data-validation-required-message="Por Favor Entre com o Numero de Teletone.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="cpf" name="cpf" type="text" placeholder="CPF" required data-validation-required-message="Por Favor Entre com o CPF.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" name="email" type="email" placeholder="E-Mail" required data-validation-required-message="Por Favor Entre com o E-Mail.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Senha" name="senha" required>
              </div>
                <div class="form-group">
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirme a senha" name="repita_senha" required>
              </div>
                </div>
                <div class="col-md-6">
                <label for="exampleInputLastName">Ocupação de Participante</label><br>
                
                <input  id="exampleInputLastName" aria-describedby="nameHelp" type="radio" value="Estudante Escola Municipal" name="Ocupacao" checked><label for="exampleInputLastName" class="section-heading text-uppercase">Estudante Escola Municipal</label><br>

                <input  id="exampleInputLastName" aria-describedby="nameHelp" type="radio" value="Estudante Escola Estadual" name="Ocupacao"><label for="exampleInputLastName" class="section-heading text-uppercase">Estudante Escola Estadual</label><br>
                
                <input  id="exampleInputLastName" aria-describedby="nameHelp" type="radio" value="Estudante de Escola Federal" name="Ocupacao"><label for="exampleInputLastName" class="section-heading text-uppercase">Estudante de Escola Federal</label><br>

                <input  id="exampleInputLastName" aria-describedby="nameHelp" type="radio" value="Professor" name="Ocupacao"><label for="exampleInputLastName" class="section-heading text-uppercase">Professor</label><br>

                <input  id="exampleInputLastName" aria-describedby="nameHelp" type="radio" value="Outro profissional" name="Ocupacao"><label for="exampleInputLastName" class="section-heading text-uppercase">Outro profissional</label>
              </div>

              
                
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Cadastrar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>