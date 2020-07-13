<?php require_once 'views/includes/cabecera.php'; ?>
		
<?php require_once 'views/includes/lateral.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h1>usuarios creados</h1>
	
	<?php 
		$usuarios = $data["usuariosDto"];

		if(!empty($usuarios)):
			foreach ($usuarios as $usuario) {
		?>
		<article >
					
					<h2><?php  echo $usuario->getUsername()?>
					    <div><?php echo $usuario->getRole() ?> <a href="/usuario/darDeBaja?id=<?=$usuario->getId()?>" style="background-color: red">dar de baja</a></div>
					</h2>
					<p>
						<?php echo $usuario->getEmail()?>
					</p>
					
			</article>
	<?php
	
	}
	endif;
	?>
</div> <!--fin principal-->
			
<?php require_once 'views/includes/pie.php'; ?>