<?php 
  $idevento = $getEvento;
  $action = "/sgeIF/participante/listarPorAtv/".$idevento;
 ?>

<div class="card-header">Listar Participantes por Atividade/Gerar Certificados</div>
<br>
<div class="row">
  <div class="col-12">     
    <div class="col-md-6">
      <form action ="<?=$action?>" method = "POST">
        <label for="exampleInputLastName">Selecione a Atividade</label>
        <select class="form-control" name="idatividade"><br>
         <?php foreach ($atividades as $atividade): ?>
             <option value="<?=$atividade['idCurso']?>">
              <?=$atividade["nmCurso"]?>
             </option>
           <?php endforeach; ?>
          </select>
    </div>
    <br>
    <div class="col-md-6">
            <label for="exampleInputName">Emissor da Lista/Certificado</label>
            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="emissor" required>
          </div>
        <br>
        <button class="btn btn-primary btn-block" type="submit">Buscar</button>
        <br>
        <button class="btn btn-primary btn-block" type="submit" formaction="/sgeIF/participante/gerarCert">Gerar Certificados</button>
      </form>
  </div>
</div>