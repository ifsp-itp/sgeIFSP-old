<div class="row">
<div class="col-12">
            
<?php foreach ($atividades as $atividade): ?>

    <b>Nome da Atividade: <?=$atividade['nmCurso']?></b><br>
    <b>Tipo da Atividade: </b><?=$atividade['tpCurso']?><br>
    <b>Data de Início: </b><?=$atividade['dtInicioCurso']?><br>
    <b>Data de Término: </b><?=$atividade['dtTermCurso']?><br>
    <b>Hora de Início: </b><?=$atividade['horaInicioCurso']?><br>
    <b>Hora de Término: </b><?=$atividade['horaTermCurso']?><br>
    <b>Conteúdo Programático: </b><?=$atividade['contProgCurso']?><br>
    <b>Local da Atividade: </b><?=$atividade['localCurso']?><br>
    <b>Carga Horária: </b><?=$atividade['crgHrCurso']?><br>
    <b>Limite de Participantes: </b><?=$atividade['limitPart']?><br>
    <b>Ministrante: </b><?=$atividade['nmMinist']?><br>
    <b>Evento: <?=$atividade['nmEvnt']?></b><br><br>
    <a href='/sgeIF/atividade/edit/<?=$atividade['idCurso']?>'>Alterar Atividade</a><br>
    <a href='/sgeIF/atividade/del/<?=$atividade['idCurso']?>'>Excluir Atividade</a><br><br>

<?php endforeach; ?>

</div>
</div>