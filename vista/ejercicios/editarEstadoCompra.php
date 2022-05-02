<?php
include_once '../../configuracion.php';
include_once '../estructura/cabeceraSegura.php';
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
  }
$datos = data_submitted();
// print_r($datos);
$abmCompraEstado = new abmCompraEstado();
$abmProducto = new abmProducto();

//Obj compra estado
$listaCompraEstado = $abmCompraEstado->buscar($datos);
$objCompraEstado = $listaCompraEstado[0];

$idCompraEstado = $objCompraEstado->getIdCompraEstado();

// echo 'OBJ COMPRA ESTADO';
// print_r($objCompraEstado);

//Obj Compra 
$objCompra = $objCompraEstado->getObjCompra();

// print_r($objCompra);

//Obj compra estado tipo
$objCompraEstadoTipo = $objCompraEstado->getObjCompraEstadoTipo();

//Obj Compra item
$listaColeccionItems = $objCompra->getColeccionItems();

$idCompraEstadoTipo = $objCompraEstado->getObjCompraEstadoTipo()->getIdCompraEstadoTipo();
//producto

// print_r($listaCompraItems);

?>

<div class="container mt-5">
    <h1 style='margin-top: 150px;'>Panel de administracion de Compra</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">Id Producto</th>
                <th scope="col" class="text-center">Nombre del Producto</th>
                <th scope="col" class="text-center"> Descripcion</th>
                <th scope="col" class="text-center">Precio</th>
                <th scope="col" class="text-center">Cantidad a comprar</th>
            </tr>
        </thead>
        <?php
            foreach ($listaColeccionItems as $objItem) {
                echo '<tr><td class="text-center" style="width:200px;">' . $objItem->getObjProducto()->getIdProducto() . '</td>';
                echo '<td class="text-center" style="width:200px;">' . $objItem->getObjProducto()->getProductoNombre() . '</td>';
                echo '<td class="text-center" style="width:200px;">' . $objItem->getObjProducto()->getProductoDetalle() . '</td>';
                echo '<td class="text-center" style="width:200px;">' . $objItem->getObjProducto()->getProductoPrecio() . '</td>';
                echo '<td class="text-center" style="width:200px;">' . $objItem->getCompraItemCantidad() . '</td>';
                '</tr>';
            }
        ?>
    </table>
    
</div>

<div class="container mt-5" >
    <h4>Administrar los Estados de la Compra</h4>
    <form action="../accion/accionEditarEstadoCompra.php" method="get">
        
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="idCompraEstadoTipo" id="idCompraEstadoTipo" value="1" 
            <?php 
                if ($idCompraEstadoTipo >= 1) {
                    echo 'disabled';
                }
            ?> >
        <label class="form-check-label" for="inlineRadio1">Iniciada</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="idCompraEstadoTipo" id="idCompraEstadoTipo" value="2" 
            <?php 
                if ($idCompraEstadoTipo >= 2) {
                    echo 'disabled';
                }
            ?> >
        <label class="form-check-label" for="inlineRadio2">Aceptada</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="idCompraEstadoTipo" id="idCompraEstadoTipo" value="3"
            <?php 
                if ($idCompraEstadoTipo >= 3) {
                    echo 'disabled';
                }
            ?> >
        <label class="form-check-label" for="inlineRadio3">Enviada</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="idCompraEstadoTipo" id="idCompraEstadoTipo" value="4">
        <label class="form-check-label" for="inlineRadio3">Cancelada</label>
        </div>
        <input style='visibility: hidden;' type="text" name="idCompraEstado" value="<?php echo $idCompraEstado ?>" >
        <input style='visibility: hidden;' type="text" name="idCompra" value="<?php echo $objCompra->getIdCompra() ?>" >
        <input type="submit" class="btn btn-success">
        <a href="../ejercicios/administrarCompras.php" class="btn btn-warning" style="margin-left: 400px;">Volver</a> 
    </form>
  
</div>
<?php
include_once '../estructura/footer.php';
?>