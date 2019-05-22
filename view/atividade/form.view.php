<?php
if(isset($atividade)) {
    $nome = $atividade['nmCurso'];
    $tipo = $atividade['tpCurso'];
    $inicio = $atividade['dtInicioCurso'];
    $termino = $atividade['dtTermCurso'];
    $limitpart = $atividade['limitPart'];
    $conteudo = $atividade['contProgCurso'];
    $idminist = $atividade['idMinist'];
    $idevento = $atividade['idEvento'];
    $cargahoraria = $atividade['crgHrCurso'];
    $hrinicio = $atividade['horaInicioCurso'];
    $hrtermino = $atividade['horaTermCurso'];
    $local = $atividade['localCurso'];
    $action = "/sgeIF/atividade/edit/" . $atividade['idCurso'];
} else {
    $nome = null;
    $tipo = null;
    $inicio = null;
    $termino = null;
    $limitpart = null;
    $conteudo = null;
    $idminist = null;
    $idevento = $getEvento;
    $cargahoraria = null;
    $hrinicio = null;
    $hrtermino = null;
    $local = null;
    $action = "/sgeIF/atividade/add/".$idevento;
}
?>

<div class="card-header">Cadastro de Atividades</div>
<div class="card-body">
<form action="<?=$action?>" method="POST">
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-6">
          <label for="exampleInputName">Identificação do Evento</label>
          <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="idevento" value="<?=$idevento?>" readonly="readonly">
        </div>
        <div class="col-md-6">
          <label for="exampleInputName">Nome da Atividade</label>
          <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="nome" value="<?=$nome?>" required>
        </div>
        <div class="col-md-6">
          <label for="exampleInputLastName">Tipo de Atividade (Minicurso, Oficina, Palestra...) </label><br>
          
          <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="tipo" value="<?=$tipo?>" required>

        </div>
        <div class="col-md-6">
          <label for="exampleInputLastName">Data de Início</label>
          <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="date" name="dtinicio" value="<?=$inicio?>" required>
        </div>
        <div class="col-md-6">
          <label for="exampleInputLastName">Data de Término (Opcional)</label>
          <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="date" name="dttermino" value="<?=$termino?>">
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
          <label for="exampleInputLastName">Conteúdo Programático</label>
          <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text" name="conteudo" value="<?=$conteudo?>" required>
        </div>
        <div class="col-md-6">
          <label for="exampleInputLastName">Local da Atividade (Opcional)</label>
          <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text" name="local" value="<?=$local?>">
        </div>
        <div class="col-md-6">
          <label for="exampleInputLastName">Carga Horária</label>
          <input class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text" name="cargahoraria" value="<?=$cargahoraria?>" required>
        </div>
         <div class="col-md-6">
          <label for="exampleInputLastName">Limite de Participantes (Opcional)</label>
          <input class="form-control" id="exampleInputLastName" type="number" aria-describedby="nameHelp" name="limitpart" value="<?=$limitpart?>">
        </div>

        <div class="col-md-6">
          <label for="exampleInputLastName">Selecione o Ministrante</label>
          <select class="form-control" name="idminist" id="idminist"><br>
           <?php foreach ($ministrantes as $ministrante): ?>
             <option value="<?=$ministrante['idMinist']?>">
              <?=$ministrante["nmMinist"]?>
             </option>
           <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
    <input class="btn btn-primary btn-block" type="submit" value="Registrar Atividade">
  </form>
</div>