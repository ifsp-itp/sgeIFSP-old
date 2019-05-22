<?php 
	$counter = 0
 ?>

<center>
	<font face = 'arial'>
	<table border = '1' width = '100%' height = '25%' bordercolor = 'black'>
		<tr>
			<td colspan='4'><img src = '/sgeIF/public/img/ifsp.png' height = '25%' width = '47%'><center><h3>Sistema de Gestão de Eventos IFSP Itapetininga</h3></center></td>
			</tr>
		<tr>
			<td colspan = '4'><b><center>Atividade: <?=$atividade['nmCurso']?></center></b></td>
		</tr>
		<tr>
			<td><b>Nº<b></td>
			<td><b>Nome<b></td>
			<td><b>ID<b></td>
			<td><b>Assinatura<b></td>
		</tr>

		<?php 
			foreach ($participantes as $participante):
				$counter = $counter + 1;
		?>
			
		<tr>
			<td>
				<?php
					echo $counter;
				?>

			</td>
			
			<td>
				<?=$participante['nmPart']?>
			</td>
			
			<td>
				<?=$participante['idPartCurso']?>
			</td>
			
			<td width = '35%'>
				
			</td>
		</tr>
			<?php endforeach; ?>
	</table>
	</center>