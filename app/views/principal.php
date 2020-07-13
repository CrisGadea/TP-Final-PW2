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

<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">

    <h1>Publicaciones</h1>

    <?php

    if (isset($error["usuario"])) {
    	echo $error["usuario"];
    }
    if ($data["publicaciones"]!=null) {
        while($publicacion = mysqli_fetch_assoc($data["publicaciones"])):

            ?>
            <article class="entrada">
                <a href="/entradas/getEntradasByPublicationId?id=<?=$publicacion['id']?>">

                    <h2><?=$publicacion['description']?></h2>
                    <span class="fecha"><?=$publicacion['number']?></span>

                </a>
            </article>
        <?php
        endwhile;


    }?>



    <div id="ver-todas">
        <a href="/publicacion/getPublicaciones">Ver todas las publicaciones</a>
    </div>
</div> <!--fin principal-->

<?php require_once 'includes/pie.php'; ?>
