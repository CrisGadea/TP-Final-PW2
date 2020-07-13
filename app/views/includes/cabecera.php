
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>InfoNete Noticias</title>
		<link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
	</head>
	<body>
		<!-- CABECERA -->
		<header id="cabecera">
			<!-- LOGO -->
			<div id="logo">
				<a href="/index">
                    InfoNete
				</a>
			</div>
			<!-- MENU -->
			<nav id="menu">
				<ul>
					<li>
						<a href="/index">Inicio</a>
					</li>
					<?php 
						if ($data["categorias"]!=null) {
							foreach ($data["categorias"] as $categoria ) {
				       ?>
				       <li>
						<a href="/entradas/getEntradasBySectionId?id=<?=$categoria['id']?>"><?=$categoria['description']?></a>
						</li>
						<?php }
						}
					?>
				</ul>
			</nav>
			<div class="clearfix"></div>
		</header>
		<div id="contenedor">