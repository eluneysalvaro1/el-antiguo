<?php
include_once '../../configuracion.php';

$sesion = new session();
if ($sesion->activa()) {
    include_once '../estructura/cabeceraSegura.php';
} else {
    include_once '../estructura/cabecera.php';
}
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
  }
?>
<link rel="stylesheet" href="../css/stylesProducto.css">

<div class="container mt-5">
    
    <section class="py-2">
    <h4 class="mt-5" style='text-align: center';>Adquiri nuestros productos</h4>
    <h5  style='text-align: center'>   
        <?php
            if (!$sesion->activa()) {
                echo "Para realizar Compras debe ingresar como usuario o registrase";
            }
        ?>
    </h5>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 m-3 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $abmProducto = new abmProducto();
                $param = [];
                $colObjProductos = $abmProducto->buscar();
                for ($i = 0; count($colObjProductos) > $i; $i++) {
                    if ($colObjProductos[$i]->getProductoStock() == 0) {
                        continue;
                    }
                    $arregloArchivos = $abmProducto->obtenerArchivos(md5($colObjProductos[$i]->getIdProducto()));

                ?>
                    <div class="card m-3 class='text-center'" style="width: 18rem; border:3px solid">
                        <?php
                        echo "<img src='$arregloArchivos' style='max-width: 400px; widht:400px; '  class='img-fluid' alt='productos'>";
                        ?>
                        <div class="card-body class='text-center'">
                            <h5 class="card-title">
                                <?php
                                echo "<h2>{$colObjProductos[$i]->getProductoNombre()}</h2>";
                                ?>
                            </h5>
                            <p class="card-text">
                                <?php
                                echo "<h6>{$colObjProductos[$i]->getProductoDetalle()}</h6>";
                                ?>
                            </p>
                            <p class="card-text">
                                <?php
                                echo "<p>Precio $ {$colObjProductos[$i]->getProductoPrecio()}</p>";
                                if($sesion->activa() && $tienePermiso){
                                    if($colObjProductos[$i]->getProductoStock()>0){
                                echo "<p>Stock: {$colObjProductos[$i]->getProductoStock()}</p>";
                                ?>
                            </p>
                            <?php //verificar que el rol tambien sea el rol que corresponde
                  
                                echo "<form action='../accion/accionCargarCarrito.php' method='post' class='text-center'>
                           <span>Cantidad: </span>
                           <input type='number' id='compraItemCantidad' name='compraItemCantidad' min='1' max='{$colObjProductos[$i]->getProductoStock()}'>
                           <input name='idProducto' id='idProducto' type='hidden' value='{$colObjProductos[$i]->getIdProducto()}'>
                           <button class=' btn btn-warning mt-3'  type='submit'>Añadir al carrito </buttom>
                           </form>";
                            }else{
                                echo "<p> sin stock</p>";
                            }
                        }
                           ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
</div>


<?php
include_once '../estructura/footer.php';
?>