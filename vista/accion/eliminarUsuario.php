<?php
include_once '../../configuracion.php';
$datos = data_submitted();

$abmUsuario = new abmUsuario();

$listaUsuario = $abmUsuario->buscar($datos);

$objUsuario = $listaUsuario[0];

$datos['usNombre'] = $objUsuario->getUsNombre();
$datos['usPass'] = $objUsuario->getUsPass();
$datos['usMail'] = $objUsuario->getUsMail();
if ($objUsuario->getUsDesabilitado()=="0000-00-00 00:00:00") {
    $datos['usDesabilitado'] = date('Y-m-d h:i:s', time());
} else {
    $datos['usDesabilitado'] = "0000-00-00 00:00:00";
}
$exito = $abmUsuario->modificacion($datos);
header("Location: ../ejercicios/listarUsuarios.php");
include_once '../estructura/footer.php';
?>