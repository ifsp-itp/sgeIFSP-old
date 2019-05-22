<h1>Seja-bem vindo ao Sistema de Gestão de Eventos do IFSP Câmpus Itapetininga</h1>

<p>Sinta-se à vontade para cadastrar, consultar, modificar, ou excluir eventos, atividades relacionadas, e seus ministrantes.</p>
<h3>Além disso, é possível gerenciar aqui os dados do administrador que pode ter acesso ao sistema.</h3>

<br>

<p>Administrador atual</p>

<b>Nome do Administrador: </b><?=$administrador['nomeAdm']?><br>

<b>Login: </b><?=$administrador['login']?><br><br>

<a href='/sgeIF/administrador/edit/<?=$administrador['idAdm']?>'>Alterar Cadastro de Administrador</a><br>

<a href='/sgeIF/administrador/del/<?=$administrador['idAdm']?>'>Excluir Administrador (AVISO: encerra a sessão atual)</a><br>

<br>

<p>Por questões de segurança, apenas o Administrador logado no momento pode editar seus dados ou excluir seu cadastro.</p>