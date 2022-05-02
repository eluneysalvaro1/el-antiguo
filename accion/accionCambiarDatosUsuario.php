<?php
    include_once '../../configuracion.php';
    $sesion = new session();
    $datos = data_submitted();
    $abmUsuario = new abmUsuario(); 
    $mensajeHeader = $abmUsuario->accionCambiarDatosUsuario($datos, $sesion);
    header("Location: " . $mensajeHeader['header'] . '?Message=' . urlencode($mensajeHeader['mensaje']));
?>