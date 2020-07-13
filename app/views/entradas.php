<?php require_once 'views/includes/cabecera.php'; ?>
		
<?php require_once 'views/includes/lateral.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h1>Todas las entradas</h1>
	
	<?php 
		$entradas = $data["entradas"];
		if(!empty($entradas)):
			while($entrada = mysqli_fetch_assoc($entradas)):
	?>
				<article class="entrada">
					<a href="entrada.php?id=<?=$entrada['id']?>">
						<h2><?=$entrada['title']?></h2>
						<span class="fecha"><?=$entrada['section_id'].' | '.$entrada['date']?></span>
						<p>
							<?=substr($entrada['body'], 0, 180)."..."?>
						</p>
					</a>
				</article>
	<?php
			endwhile;
		endif;
	?>
</div> <!--fin principal-->
			
<?php require_once 'views/includes/pie.php'; ?>