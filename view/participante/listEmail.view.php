<center>
	<font face = 'arial'>
	<table border = '1' width = '100%' height = '25%' bordercolor = 'black'>
		<tr>
			<td colspan='4'><img src = '/sgeIF/public/img/ifsp.png' height = '25%' width = '47%'><center><h3>Sistema de Gestão de Eventos IFSP Itapetininga</h3></center></td>
			</tr>
		<tr>
			<td colspan = '4'><b><center>Lista de Participantes Cadastrados</center></b></td>
		</tr>
		<tr>
			<td><b>Nome<b></td>
			<td><b>E-mail<b></td>
		</tr>

		<?php 
			foreach ($participantes as $participante):
		?>

		<tr>
			<td>
				<?=$participante['nmPart']?>
			</td>
			<td>
				<?=$participante['emailPart']?>
			</td>
			</tr>

		<?php endforeach; ?>
		
	</table>

	</center>