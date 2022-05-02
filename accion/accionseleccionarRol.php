<?php
include_once '../../configuracion.php';
$sesion=new session();
$datos= data_submitted();
$abmRol=new abmRol();
$listaRol=$abmRol->buscar($datos);
$objRol=$listaRol[0];
$rol=$sesion->setRolActivo($objRol);
if($rol!=null){
    header("Location: ../ejercicios/paginaSegura.php");
}
?>