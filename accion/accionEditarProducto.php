<?php
include_once '../../configuracion.php';

$datos = data_submitted();
$abmProducto = new abmProducto();
$producto=['idProducto' => $datos['idProducto']];
$listaProductos = $abmProducto->buscar($producto);
$objProducto = $listaProductos[0];
$modificoProducto=$abmProducto->modificacion($datos);
if($modificoProducto){
    $mensaje = "El producto se modifico con exito";
    header("Location: ../ejercicios/listarProductos.php?Message=" . urlencode($mensaje));
}else{
    $mensaje = "Debe cambiar al menos un valor, no se modifico";
    header("Location: ../ejercicios/listarProductos.php?Message=" . urlencode($mensaje));
}

include_once '../estructura/footer.php';
?>

