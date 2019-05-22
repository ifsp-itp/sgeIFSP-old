<div class="row">
<div class="col-12">

<?php foreach ($eventos as $evento): ?>

    <b>Nome do Evento: </b><?=$evento['nmEvnt']?><br>
    <b>Tipo do Evento: </b><?=$evento['tpEvnt']?><br>
    <b>Data de Início: </b><?=$evento['dtInicioEvnt']?><br>
    <b>Data de Término: </b><?=$evento['dtTermEvnt']?><br>
    <b>Hora de Início: </b><?=$evento['horaInicioEvnt']?><br>
    <b>Hora de Término: </b><?=$evento['horaTermEvnt']?><br>
    <b>Data Limite de Inscrição: </b><?=$evento['dtLimitInsc']?><br>
    <b>Conteúdo Programático: </b><?=$evento['contProgEvnt']?><br>
    <b>Local do Evento: </b><?=$evento['localEvnt']?><br>
    <b>Responsável: </b><?=$evento['respEvnt']?><br>
    <b>Carga Horária: </b><?=$evento['crgHrEvnt']?><br><br>
    <a href='/sgeIF/public/webPage/index.php?id=<?=$evento['idEvnt']?>'>Visitar Página do Evento</a><br>
    <a href='/sgeIF/figura/add/<?=$evento['idEvnt']?>'>Adicionar Figuras ao Evento</a><br>
    <a href='/sgeIF/evento/edit/<?=$evento['idEvnt']?>'>Alterar Evento</a><br>
    <a href='/sgeIF/evento/del/<?=$evento['idEvnt']?>'>Excluir Evento</a><br>
    <a href='/sgeIF/atividade/add/<?=$evento['idEvnt']?>'>Cadastrar Atividade</a><br>
    <a href='/sgeIF/participante/listarPorAtv/<?=$evento['idEvnt']?>'>Consultar Participantes Cadastrados</a><br><br>

<?php endforeach; ?>

</div>
</div>