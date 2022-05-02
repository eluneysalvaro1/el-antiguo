<?php
include_once '../../configuracion.php'; 
$sesion = new session();
$datos = data_submitted();

if($sesion->iniciar($datos['usNombre'], $datos['usPass'])){
    $objUsuario=$sesion->getObjUsuario();
    $mailUsuario=$objUsuario->getUsMail();
    $datos['usMail']=$mailUsuario;
    header('Location: ../ejercicios/paginaSegura.php');
}else{
    header('Location: ../ejercicios/login.php');
}

include_once '../estructura/footer.php';