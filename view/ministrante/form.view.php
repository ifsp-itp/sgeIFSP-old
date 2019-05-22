<?php
    if(isset($ministrante)) {
        $nome = $ministrante['nmMinist'];
        $cpf = $ministrante['cpfMinist'];
        $email = $ministrante['emailMinist'];
        $tel = $ministrante['phoneMinist'];
        $action = "/sgeIF/ministrante/edit/" . $ministrante['idMinist'];
    } else {
        $nome = null;
        $cpf = null;
        $email = null;
        $tel = null;
        $action = "/sgeIF/ministrante/add";
    }
?>

<div class="card-header">Cadastro de Ministrantes</div>
<div class="card-body">
    <form action="<?=$action?>" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nome Completo</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="nome" value="<?=$nome?>" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">E-mail</label>
                <input class="form-control" id="exampleInputLastName" type="email" aria-describedby="emailHelp" name="email" value="<?=$email?>" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CPF</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="cpf" value="<?=$cpf?>" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Telefone</label>
                <input class="form-control" id="exampleInputLastName" type="number" aria-describedby="nameHelp" name="tel" value="<?=$tel?>" required>
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Registrar Ministrante">
    </form>
</div>