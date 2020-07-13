<!-- BARRA LATERAL -->
<aside id="sidebar">
	
	<div id="buscador" class="bloque">
		<h3>Buscar</h3>

		<form action="/entradas/buscar" method="POST"> 
			<input type="text" name="busqueda" />
			<input type="submit" value="Buscar" />
		</form>
	</div>

	
	<?php if(isset($_SESSION['usuario'])): ?>

		<?php if ($_SESSION['usuario']['role_id']==3): ?>
			<div id="usuario-logueado" class="bloque">
			<h3>Bienvenido, <?=$_SESSION['usuario']['username']?></h3>
			<a href="/publicacion/mostrarForm"  class="boton boton-naranja">Crear publicacion</a>
			<a href="/entradas/mostrarForm"  class="boton boton-verde">Crear entradas</a>
			<a href="/categorias/mostrarForm"class="boton">Crear categoria</a>
			<a href="/usuario/mostrarDatosForm" class="boton boton-naranja">Mis datos</a>
			<a href="/usuario/cerrarSesion" class="boton boton-rojo">Cerrar sesión</a>
		</div>
			
		<?php endif ?>

		<?php 
			if($_SESSION['usuario']['role_id']==1): ?>
			<div id="usuario-logueado" class="bloque">
				<h3>Bienvenido, <?=$_SESSION['usuario']['username']?></h3>
				<a href="/usuario/formContenidista"  class="boton boton-verde">Crear contenedista</a>
				<a href="#"class="boton">estadisticas</a>
				<a href="/usuario/mostrarUsuarios" class="boton boton-naranja">usuarios</a>
				<a href="/usuario/cerrarSesion" class="boton boton-rojo">Cerrar sesión</a>
			</div>
		<?php endif ?>

		<?php 
			if($_SESSION['usuario']['role_id']==2): ?>
			<div id="usuario-logueado" class="bloque">
				<h3>Bienvenido, <?=$_SESSION['usuario']['username']?></h3>
				<a href="/usuario/formSuscribir" class="boton boton-naranja">Suscribite</a>
				<a href="/usuario/cerrarSesion" class="boton boton-rojo">Cerrar sesión</a>
			</div>
		<?php endif ?>

		<?php 
			if($_SESSION['usuario']['role_id']==4): ?>
			<div id="usuario-logueado" class="bloque">
				<h3>Bienvenido, <?=$_SESSION['usuario']['username']?></h3>
				<a href="/usuario/cerrarSesion" class="boton boton-rojo">Cerrar sesión</a>
			</div>
		<?php endif ?>
		
	<?php endif ?>

	
	<?php if(!isset($_SESSION['usuario'])): ?>
	<div id="login" class="bloque">
		<h3>Login</h3>
		
		<?php if(isset($_SESSION['error_login'])): ?>
			<div class="alerta alerta-error">
				<?=$_SESSION['error_login'];?>
			</div>
		<?php endif; ?>
		
		<form action="/usuario/loginUsuario"  method="POST"> 
			<label for="email">Email</label>
			<input type="email" name="email" />

			<label for="password">Contraseña</label>
			<input type="password" name="password" />

			<input type="submit" value="Entrar" />
		</form>
	</div>

	<div id="register" class="bloque">
		<h3>Resgistrate</h3>
		
		<!-- Mostrar errores -->
		<?php if(isset($_SESSION['completado'])): ?>
			<div class="alerta alerta-exito">
				<?=$_SESSION['completado']?>
			</div>
		<?php elseif(isset($_SESSION['errores']['general'])): ?>
			<div class="alerta alerta-error">
				<?=$_SESSION['errores']['general']?>
			</div>
		<?php endif; ?>
		
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
		
	</div>
	<?php endif; ?>
</aside>