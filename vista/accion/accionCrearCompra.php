<?php
include_once '../../configuracion.php';
$sesion = new session();
$datos = data_submitted();
$mensaje = $sesion->accionCrearCompra($datos);
header("Location: ../ejercicios/comprasUsuario.php?Message=" . urlencode($mensaje));
?>