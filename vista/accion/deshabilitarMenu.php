<?php
include_once '../../configuracion.php';
$datos = data_submitted();
$abmMenu = new abmMenu();
$listaMenu = $abmMenu->buscar($datos);
$objMenu = $listaMenu[0];
$datos['idmenu'] = $objMenu->getIdmenu();
$datos['menombre'] = $objMenu->getMenombre();
$datos['medescripcion'] = $objMenu->getMedescripcion();
$datos['idpadre'] = $objMenu->getObjMenu()->getIdmenu();
if ($objMenu->getMedeshabilitado()==null ) {
    $datos['medeshabilitado'] = date('Y-m-d h:i:s', time());
} else {
    $datos['medeshabilitado'] = null;
}
$exito = $abmMenu->modificacion($datos);
header("Location: ../ejercicios/listarMenu.php");
include_once '../estructura/footer.php';
?>