<?php
include_once '../../configuracion.php';
    $sesion = new session();
    $datos = data_submitted();
    $arreglo = $sesion->agregarColeccionItems($datos);
    if( !isset($arreglo)){
        header("Location: ../ejercicios/carrito.php");
    }else{
        echo 'error en accion cargar carrito';
    }
include_once '../estructura/footer.php';
?>