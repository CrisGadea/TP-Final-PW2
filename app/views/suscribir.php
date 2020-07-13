<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>&iexcl;Suscr&iacute;bete a nuestro contenido premium!</h1><br>
    <h2>Paga tus suscripci&oacute;n ahora y obten&eacute; un descuento</h2><br><br>
    <form action="/usuario/suscribir/" method="post">
        <label for="card">Numero de tarjeta</label>
        <input type="text" name="card"/>

        <label for="vto">VTO</label>
        <input type="date" name="vto"/>

        <label for="name">Nombre</label>
        <input type="text" name="name"/>

        <label for="number">Codigo de seguridad</label>
        <input type="number" name="number"/>

        <input type="submit" name="submit" value="Realizar Pago" />
    </form>

</div> <!--fin principal-->

<?php require_once 'includes/pie.php'; ?>
