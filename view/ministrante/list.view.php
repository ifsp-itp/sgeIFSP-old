<div class="row">
<div class="col-12">

<?php foreach ($ministrantes as $ministrante): ?>

    <b>Nome do Ministrante: </b><?=$ministrante['nmMinist']?><br>
    <b>CPF do Ministrante: </b><?=$ministrante['cpfMinist']?><br>
    <b>E-mail do Ministrante: </b><?=$ministrante['emailMinist']?><br>
    <b>Telefone do Ministrante: </b><?=$ministrante['phoneMinist']?><br><br>
    <a href='/sgeIF/ministrante/edit/<?=$ministrante['idMinist']?>'>Alterar Ministrante</a><br>
    <a href='/sgeIF/ministrante/del/<?=$ministrante['idMinist']?>'>Excluir Ministrante</a><br><br>

<?php endforeach; ?>

</div>
</div>