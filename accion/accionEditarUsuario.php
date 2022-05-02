<?php
    include_once '../../configuracion.php';
    include_once '../estructura/cabecera.php';
    $datos = data_submitted();
    $abmUsuario = new abmUsuario();
    $mensaje = $abmUsuario->accionEditarUsuario($datos);
    header("Location: ../ejercicios/listarUsuarios.php?Message=" . urlencode($mensaje));
    include_once '../estructura/footer.php';
?>