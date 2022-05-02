<?php
include_once '../estructura/cabecera.php';
$session=new session();

$cerrar=$session->cerrar();
if($cerrar){
    $mensaje="Sesion Cerrada con exito!";
    header("Location: ../ejercicios/login.php?Message=" . urlencode($mensaje));
}