<?php require_once 'includes/cabecera.php'; ?>	
<?php require_once 'includes/lateral.php'; ?>


<!-- CAJA PRINCIPAL -->
<div id="principal">
	
	<h1>Nuevo contenedista</h1>
	
	<br/>
	<form action="/usuario/registrarUsuario" method="POST">
			<label for="username">Usuario</label>
			<input type="text" name="username" />

			<label for="email">Email</label>
			<div><?php echo $data["error"] ?></div>
			<input type="email" name="email" />

			<label for="password">Contraseña</label>
			<input type="password" name="password" />

			<label for="address">Direccion</label>
			<input type="text" name="address" />

			<label for="city">Ciudad</label>
			<input type="text" name="city" />

			<input type="submit" name="submit" value="Registrar" />
		</form>
	
</div> <!--fin principal-->
			
<?php require_once 'includes/pie.php'; ?>