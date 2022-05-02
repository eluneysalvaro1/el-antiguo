<?php
    include_once '../estructura/cabecera.php';
    include_once '../../configuracion.php';
    $datos = data_submitted();
    $abmUsuario = new abmUsuario();
    $abmUsuario->accionCrearUsuario($datos);
    include_once '../estructura/footer.php';
?>