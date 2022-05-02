<?php
include_once '../../configuracion.php';
    $datos = data_submitted();
    $abmProducto = new abmProducto();
    $abmProducto->accionCrearProducto($datos);
include_once '../estructura/footer.php';
?>