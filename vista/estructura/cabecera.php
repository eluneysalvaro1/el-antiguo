<?php
include_once '../../configuracion.php';
error_reporting(0);
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
</head>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="../home/index.php"><img src="../assets/img/logos/logo.png" alt="logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../home/index.php#page-top">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="../home/index.php#proximosEventos">Proximos Eventos</a></li>
                        <li class="nav-item"><a class="nav-link" href="../ejercicios/mostrarProductos.php">Productos</a></li>
                        <li class="nav-item"><a class="nav-link" href="../home/index.php#quienesSomos">¿Quienes Somos?</a></li>
                        <li class="nav-item"><a class="nav-link" href="../home/index.php#contact">Contacto</a></li>
                        <a href="../ejercicios/crearUsuario.php" class="nav-item btn btn-info" ><i class="fas fa-user-plus"></i> Crear Cuenta</a>
                        <a href="../ejercicios/login.php" class="nav-item btn btn-success">  <i class="fas fa-sign-in-alt"></i>Log In </a>
                    </ul>
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
