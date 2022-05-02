<?php
include_once '../../configuracion.php';
// include_once '../estructura/cabeceraSegura.php';
$datos=data_submitted();
//desde los datos recibido buscamos el obj CompraEstado,
// obtenemos sus objetos y los datos necesarios para realizar la modificacion
$abmcompraEstado=new abmCompraEstado();
$datosCompraEstado = $abmcompraEstado->editarEstadoCompraCliente($datos);
if($abmcompraEstado->modificacion($datosCompraEstado)){
    $mensaje = "Compra cancelada con exito";
    header("Location: ../ejercicios/comprasUsuario.php?Message=" . urlencode($mensaje));
}else{
    $mensaje = "La compra no se pudo cancelar";
    header("Location: ../ejercicios/comprasUsuario.php?Message=" . urlencode($mensaje));
}