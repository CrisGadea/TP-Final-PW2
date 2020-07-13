<?php
	if(!isset($_POST['busqueda'])){
		header("Location: index.php");
	}
?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">

	<h1>Busqueda: <?=$_POST['busqueda']?></h1>
	
	<?php 
		$entradas = $data["entradas"];

		if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
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
		else:
	?>
		<div class="alerta">No hay entradas en esta categoría</div>
	<?php endif; ?>
</div> <!--fin principal-->
			
<?php require_once 'includes/pie.php'; ?>