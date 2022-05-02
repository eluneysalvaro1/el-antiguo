<?php
include_once '../../configuracion.php';
    $sesion= new session();
    $datos = data_submitted();
    $mensaje = $sesion->accionBorrarProductoCarrito($datos);
    header("Location: ../ejercicios/carrito.php?Message=" . urlencode($mensaje));
include_once '../estructura/footer.php';
?>