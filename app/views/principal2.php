<?php require_once 'includes/cabecera.php'; ?>
		
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">

	<h1>Ultimas entradas</h1>
	
	<?php 
	
	  
	 if ($data["entradas"]!=null) {
	 	while($entrada = mysqli_fetch_assoc($data["entradas"])):
				
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
		
	
	 }?>
		
			

	<div id="ver-todas">
		<a href="/entradas/getEntradas?publicacionId=<?= $_GET["id"] ?>">Ver todas las entradas</a>
	</div>
</div> <!--fin principal-->
			
<?php require_once 'includes/pie.php'; ?>