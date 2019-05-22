<?php require "view/head.php"; ?>
<?php require "view/menu.php"; ?>
<?php require "view/body.php"; ?>

	<li class="breadcrumb-item active">
		<?php if (alertHasMsg()) : ?>
			<?=alertShow();?>
		<?php elseif (!alertHasMsg()) : ?>
			Bem-vindo ao sgeIF, <?php print($_SESSION["nome"]) ?>. Sinta-se à vontade.
		<?php endif; ?>
					
	</li>
</ol>    
<main>
    <?php require buildViewPath($view); ?>
</main> 
       
<?php require "view/footer.php"; ?>