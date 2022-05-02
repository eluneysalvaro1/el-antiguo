<?php 
include_once "../../configuracion.php";
$data = data_submitted();
$objControl = new AbmMenu();
$list = $objControl->buscar($data);
$arreglo_salida= $objControl->listarmenu($list);
//verEstructura($arreglo_salida);
echo json_encode($arreglo_salida,null,2);

?>