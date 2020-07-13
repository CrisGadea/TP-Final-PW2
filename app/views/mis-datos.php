<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>	
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h1>Mis datos</h1>
	
	<?php if(isset($_SESSION['completado'])): ?>
		<div class="alerta alerta-exito">
			<?=$_SESSION['completado']?>
		</div>
	<?php elseif(isset($_SESSION['errores']['general'])): ?>
		<div class="alerta alerta-error">
			<?=$_SESSION['errores']['general']?>
		</div>
	<?php endif; ?>
		
	<form action="/usuario/actualizarUsuario" method="POST"> 
		<label for="username">Username</label>
		<input type="text" name="username" value="<?=$_SESSION['usuario']['username']; ?>"/>
		<?php 
		if ( isset($_SESSION['errores']['username']) ) {
			echo $_SESSION['errores']['username'];
		}	
		 ?>

		<label for="password">Password</label>
		<input type="password" name="password" value="<?=$_SESSION['usuario']['password']; ?>"/>
		<?php 
		if ( isset($_SESSION['errores']['password']) ) {
			echo $_SESSION['errores']['password'];
		}	
		 ?>

		<label for="email">Email</label>
		<input type="email" name="email" value="<?=$_SESSION['usuario']['email']; ?>"/>
		<?php 
		if ( isset($_SESSION['errores']['email']) ) {
			echo $_SESSION['errores']['email'];
		}	
		 ?>
		

		<input type="submit" name="submit" value="Actualizar" />
	</form>
	

</div> <!--fin principal-->
			
<?php require_once 'includes/pie.php'; ?>
