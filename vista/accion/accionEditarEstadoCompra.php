<?php
include_once '../../configuracion.php';
$datos = data_submitted();
$abmCompraEstado = new abmCompraEstado();
$listaCompraEstado = $abmCompraEstado->buscar(['idCompraEstado' => $datos['idCompraEstado']]);
$objCompraEstado = $listaCompraEstado[0];
$datosNuevos = $abmCompraEstado->editarEstadoCompra($datos , $objCompraEstado);
if($abmCompraEstado->modificacion($datosNuevos)){
    $mensaje = "Estado de la compra modificado con exito!";
    header("Location: ../ejercicios/editarEstadoCompra.php?Message=" . urlencode($mensaje));
}else{
    $mensaje = "El estado de la compra no se modifico, contacte al administrador!";
    header("Location: ../ejercicios/editarEstadoCompra.php?Message=" . urlencode($mensaje));
}
?>