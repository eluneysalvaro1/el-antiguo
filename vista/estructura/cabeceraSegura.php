<?php

$sesion = new session();
include_once '../../configuracion.php';
error_reporting(0);
//Verificacion si tiene la sesion activa en caso negativo reenviamos al loguin
if (!$sesion->activa()) {
    header('location:../ejercicios/login.php');
} else {
    // treaemos el usuario de la sesion, la lista de menu y el rolActivo de la sesion
    $objUsuario = $sesion->getObjUsuario();
    $menu = new AbmMenu();
    $arregloMenu = $menu->buscar("");

    // accedos al rolActivo de la sesion
    $rolActivo = $sesion->getRolActivo();
    // consultamos si el rol no esta activo buscamos el primero y lo asignamos
    if ($rolActivo == null) {
        $listaRoles = $sesion->getColeccionRol();
        // print_r($listaRoles);
        $objRol = $listaRoles[0];
        $sesion->setRolActivo($objRol);
        $rolActivo = $sesion->getRolActivo();
    }
    // verificamos si el usuario con el rol y la ruta y asignamos si tiene permiso
    $ruta = $_SERVER['SCRIPT_FILENAME'];
    $menurol = new abmMenuRol();
    $datosMR = ['idRol' => $rolActivo->getIdRol()];
    $coleccionMenuRolActivo = $menurol->buscar($datosMR);
    $tienePermiso = false;
    foreach ($coleccionMenuRolActivo as $objMenurol) {
        $stringMenu = $objMenurol->getObjMenu()->getMedescripcion();
        $StrMenu = substr($stringMenu, 3);
        if (str_contains($ruta, $StrMenu)) {
            $tienePermiso = true;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cristal Shop - Compra de Cristales - Cactus y Mas</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.6.6/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.6.6/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.6.6/themes/color.css">
    <link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.6.6/demo/demo.css">
    <script type="text/javascript" src="../js/jquery-easyui-1.6.6/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery-easyui-1.6.6/jquery.easyui.min.js"></script>
</head>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="../home/index.php#page-top"><img src="../assets/img/logos/logo.png" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Navegacion
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="../home/index.php#proximoseventos">Proximos Eventos</a></li>
                        <li><a class="dropdown-item" href="../home/index.php#quienesSomos">¿Quienes Somos?</a></li>
                        <li><a class="dropdown-item" href="../home/index.php#contact">Contacto</a></li>
                    </ul>
                </li>
                <! –– Menu Dinamico ––>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <! –– Busco el Padre Segun el Rol ––>
                                <?php
                                foreach ($arregloMenu as $menu) {
                                    $objMenupadre = $menu->getObjMenu();
                                    $idMenu = $menu->getIdmenu();
                                    $idRolActual = $rolActivo->getIdRol();
                                    $deshabilitado = $menu->getMedeshabilitado();
    
                                    if (($objMenupadre == null) && ($idMenu == $idRolActual) && ($deshabilitado==null) ) {
                                        echo $menu->getMenombre(); ?>
                                     </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">

                                        <?php
                                        //recorro el arrelgo de menu 
                                        for ($i = 0; $i < (count($arregloMenu)); $i++) {
                                            $objPadre =  $arregloMenu[$i]->getObjMenu();
                                            // verifico que sea hijo si el padre es distinto de nul
                                            if ($objPadre != null) {
                                                $idPadre = $objPadre->getIdmenu();
                                                $deshabilitado = $arregloMenu[$i]->getMedeshabilitado();
                                                //verifico que el padre sea igual al rol actual y que no este deshabilitado y ahi imprimo
                                                if (($idPadre == $idRolActual) && ($deshabilitado==null)) { ?>
                                                <li>
                                                    <a class="dropdown-item" href="<?php echo $arregloMenu[$i]->getMedescripcion(); ?>"><?php echo $arregloMenu[$i]->getMenombre(); ?></a>
                                                </li>
                                                <?php
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>
                        </ul>
                    </li>

                    <!-- cortamos linea 103 lo anterior -->
                    <?php
                    $listaRoles = $sesion->getColeccionRol();
                    if (count($listaRoles) > 1) {

                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class=" fas fa-user-cog"></i>Cambiar Rol
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">

                                <?php
                                $span = "";
                                foreach ($listaRoles as $rol) {
                                    $idRol = $rol->getIdRol();
                                    $span = "<li class='dropdown-item'>{$rol->getRolDescripcion()}<span class='fas fa-users'></span></li>";
                                    echo "<a class='nav-link' href='../accion/accionseleccionarRol.php?idRol=$idRol'>{$span}</a>";
                                }

                                ?>
                            </ul>

                        </li>

                    <?php
                        }
                    echo "<li class='navbar-nav pull-xl-right'> <a class='nav-link' href='../ejercicios/cambiarDatosUsuario.php' >Usuario: {$objUsuario->getUsNombre()}</br>Rol: {$sesion->getRolActivo()->getRolDescripcion()} <br> Modificar sus datos</br> </a></li>";
                    // echo "<li class='navbar-nav pull-xl-right'> <a class='nav-link'>Rol: </a></li>";
                    ?>

        </div>

        </ul>
        </ul>
        <div class="px-5">
            <?php
            $idRol = $rolActivo->getIdRol();
            if ($idRol == 3) {
            ?>
                <button type="button" class="btn btn-secondary position-relative mr-3">

                    <a href="../ejercicios/carrito.php"><i class="fas fa-shopping-cart mr-3"></i></a>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        <?php
                        if ($sesion->getCarrito() == null) {
                            echo "0";
                        } else {
                            echo count($sesion->getCarrito());
                        } ?>

                    </span>
                </button>
            <?php
            }

            ?>
            <a href="../accion/cerrarSesion.php" class="ml-5 nav-item btn btn-danger"> <i class="fas fa-sign-in-alt"></i>Log Out </a>
        </div>
    </div>


</nav>
            <?php 
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
            ?>

<body id="page-top">