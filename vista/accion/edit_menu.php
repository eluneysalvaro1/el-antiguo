<?php
include_once "../../configuracion.php";
$data = data_submitted();
$respuesta = false;
if (isset($data['idmenu'])){
    $objC = new AbmMenu();
    $respuesta = $objC->modificacion($data);
    if (!$respuesta){
        $mensaje = " La accion  MODIFICACION No pudo concretarse";
    }else $respuesta =true;
}else{
    $sms_error = "falta la clave del menu";
}
$retorno['respuesta'] = $respuesta;
if (isset($sms_error)){
    $retorno['errorMsg']=$mensaje;
}
echo json_encode($retorno);
?>