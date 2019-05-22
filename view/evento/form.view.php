<?php
if(isset($evento)) {
    $nome = $evento['nmEvnt'];
    $tipo = $evento['tpEvnt'];
    $dtinicio = $evento['dtInicioEvnt'];
    $dttermino = $evento['dtTermEvnt'];
    $dtlimite = $evento['dtLimitInsc'];
    $conteudo = $evento['contProgEvnt'];
    $responsavel = $evento['respEvnt'];
    $cargahoraria = $evento['crgHrEvnt'];
    $hrinicio = $evento['horaInicioEvnt'];
    $hrtermino = $evento['horaTermEvnt'];
    $local = $evento['localEvnt'];
    $action = "/sgeIF/evento/edit/" . $evento['idEvnt'];
} else {
    $nome = null;
    $tipo = null;
    $dtinicio = null;
    $dttermino = null;
    $dtlimite = null;
    $conteudo = null;
    $responsavel = null;
    $cargahoraria = null;
    $hrinicio = null;
    $hrtermino = null;
    $local = null;
    $action = "/sgeIF/evento/add";
}
?>

<div class="card-header">Cadastro de Eventos</div>
<div class="card-body">
  <form action="<?=$action?>" method="POST">
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="exampleInputName">Nome do Evento</label>
            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="nome" value="<?=$nome?>" required>
          </div>
          <div class="col-md-6">
            <label for="exampleInputLastName">Tipo do Evento (Workshop, Festival...)</label><br>
            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="tipo" value="<?=$tipo?>" required>
          </div>
          <div class="col-md-6">
            <label for="exampleInputLastName">Data de Início</label>
            <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="date" name="dtinicio" value="<?=$dtinicio?>" required>
          </div>
          <div class="col-md-6">
            <label for="exampleInputLastName">Data de Término (Opcional)</label>
            <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="date" name="dttermino" value="<?=$dttermino?>">
          </div>
          <div class="col-md-6">
            <label for="exampleInputLastName">Hora de Início (Opcional)</label>
            <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="time" name="hrinicio" value="<?=$hrinicio?>">
          </div>
          <div class="col-md-6">
            <label for="exampleInputLastName">Hora de Término (Opcional)</label>
            <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="time" name="hrtermino" value="<?=$hrtermino?>">
          </div>
          <div class="col-md-6">
            <label for="exampleInputLastName">Data Limite para Inscrição (Opcional)</label>
            <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="date" name="dtlimite" value="<?=$dtlimite?>">
          </div>
          <div class="col-md-6">
            <label for="exampleInputLastName">Conteúdo Programático</label>
            <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text" value="<?=$conteudo?>" name="conteudo" required>
          </div>
          <div class="col-md-6">
            <label for="exampleInputLastName">Local do Evento (Opcional)</label>
            <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text" value="<?=$local?>" name="local">
          </div>
          <div class="col-md-6">
            <label for="exampleInputLastName">Responsável</label>
            <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text" value="<?=$responsavel?>" name="responsavel" required>
          </div>
          <div class="col-md-6">
            <label for="exampleInputLastName">Carga Horária</label>
            <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text" value="<?=$cargahoraria?>" name="cargahoraria" required>
          </div>
        </div>
      </div>
      <input class="btn btn-primary btn-block" type="submit" value="Registrar Evento">
  </form>
</div>