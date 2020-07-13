
<?php require_once 'includes/cabecera.php'; ?>	
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h1>Crear categorias</h1>
	<p>
		Añade nuevas categorias a InfoNete para que los usuarios puedan
		usarlas al crear sus entradas.
	</p>
	<br/>
	<?php  $publicaciones=$data["publicaciones"]?>
	<form action="/categorias/crearCategoria" method="POST">
		<label for="nombre">Nombre de la categoría:</label>
		<input type="text" name="nombre" />	
		<select name="publicacion">
			<?php 
			foreach ($publicaciones as $publicacion ) {
				echo $publicacion['description'];
			
			?>
				<option value="<?=$publicacion['id']?>">
					<?=$publicacion['description']?>
				</option>
				
			<?php
				};
				
			?>
		</select>

		<input type="submit" value="Guardar" />
	</form>

</div> <!--fin principal-->
			
<?php require_once 'includes/pie.php'; ?>