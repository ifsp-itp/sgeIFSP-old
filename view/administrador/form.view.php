<?php
if(isset($administrador)) {
    $nome = $administrador['nomeAdm'];
    $email = $administrador['login'];
    $senha = null;
    $rsenha = null;
    $action = "/sgeIF/administrador/edit/" . $administrador['idAdm'];
} else {
    $nome = null;
    $email = null;
    $senha = null;
    $rsenha = null;
    $action = "/sgeIF/administrador/add";
}
?>

<div class="card-header">Cadastro de Administrador</div>
      <div class="card-body">
    <form action="<?=$action?>" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nome Completo</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="nome" value="<?=$nome?>" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">E-mail (Login)</label>
                <input class="form-control" id="exampleInputLastName" type="email" aria-describedby="emailHelp" name="email" value="<?=$email?>" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Senha</label>
                <input class="form-control" id="exampleInputPassword1" type="password" name="senha" value="<?=$senha?>" required>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirme a Senha</label>
                <input class="form-control" id="exampleConfirmPassword" type="password" name="rsenha" value="<?=$rsenha?>" required>
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Registrar Administrador">
        </form>
  </div>