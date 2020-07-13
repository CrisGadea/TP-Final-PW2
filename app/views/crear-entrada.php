
<?php require_once 'includes/cabecera.php'; ?>	
<?php require_once 'includes/lateral.php'; ?>


<!-- CAJA PRINCIPAL -->
<div id="principal">
	
	<h1>Crear entradas</h1>
	<p>
		Añade nuevas noticias al blog para que los usuarios puedan
		leerlas y disfrutar de nuestro contenido.
	</p>
	<br/>
	<form action="entradas/crearEntrada" method="POST">
		<label for="title">Titulo:</label>
		<input type="text" name="title" />

		<label for="subtitle">Subtitulo:</label>
		<input type="text" name="subtitle" />

		<label for="bod">Cuerpo:</label>
		<input type="text" name="body" />

		<label for="image">Imagen:</label>
		<input type="text" name="image" />

		<label for="address">Direccion:</label>
		<input type="text" name="address" />
		
		<label for="categoria">Categoría</label>

		<select name="categoria">
			<?php 
			foreach ($data["categorias"] as $categoria ) {
				echo $categoria['description'];
			
			?>
				<option value="<?=$categoria['id']?>">
					<?=$categoria['description']?>
				</option>
				
			<?php
				};
				
			?>
		</select>


	
		<input type="submit" value="Guardar" />
	</form>
	
</div> <!--fin principal-->
			
<?php require_once 'includes/pie.php'; ?>