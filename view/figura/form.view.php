<?php 
  $idevento = $getEvento;
  $action = "/sgeIF/figura/add/".$idevento;
 ?>      


<div class="row">
  <div class="col-12">
    <form action="<?=$action?>" method="POST" enctype="multipart/form-data" name="cadastro">
    <select name="tipo">
      <option value="Plano_de_Fundo">Plano de Fundo da Home Page</option>
      <option value="Logo">Logo Evento</option>
      <option value="Galeria">Figuras para Galeria de Imagem</option>
    </select>
    <input type="file" name="foto" /><br /><br />
    <input class="btn btn-primary btn-block" type="submit" value="Concluir">
  </form>
  </div>
</div>