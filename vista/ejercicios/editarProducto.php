<?php
include_once '../../configuracion.php';
$sesion = new session();
$objRol=$sesion->getRolActivo();
$idRol=$objRol->getIdRol();
if ($sesion->activa()) {
   include_once '../estructura/cabeceraSegura.php';
}
if ($idRol !=2) {
   echo "</br></br></br></br></br></br>";
   echo "<h4 class='alert alert-danger'>Usted no tiene Permisos para esta seccion</h4>";
} else {
   echo "</br></br></br></br></br></br>";
   $listaProductos = [];
   $datos = data_submitted();
   // print_r($datos);
   $abmProducto = new abmProducto();
   $listaProductos = $abmProducto->buscar($datos);
   $objProducto = $listaProductos[0]; ?>

   <div class="container mt-5">

      <div class="card card-info">
         <form novalidate id="editarProducto" name="editarProducto" action="../accion/accionEditarProducto.php" method="post">
            <?php
            echo "<input class='form-control' id='idProducto' name='idProducto' type='hidden' value='{$datos['idProducto']}'>"; ?>
            <div class="mb-3">
               <label for="usuario" class="form-label">Nombre Producto</label>
               <input class='form-control' id='productoNombre' name='productoNombre' type='text' placeholder='Nuevo nombre' value="<?php echo $objProducto->getProductoNombre() ?>" required>
            </div>

            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Detalle</label>
               <input type='text' class='form-control' id='productoDetalle' name='productoDetalle' placeholder='Nuevo Detalle' value='<?php echo $objProducto->getProductoDetalle() ?>' required>

            </div>
            <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label">Producto Stock</label>
               <input class='form-control' id='productoStock' name='productoStock' type='number' placeholder='Nuevo Stock' value='<?php echo $objProducto->getProductoStock() ?>' required>
               
            </div>
            
            <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label">Producto Precio</label>
               <input class='form-control' id='productoPrecio' name='productoPrecio' type='number' placeholder='Nuevo Stock' value='<?php echo $objProducto->getProductoPrecio() ?>' required>
               
            </div>
            <button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
         </form>
      </div>
      <div id="validaciones">

      </div>
   </div>
   </div>
   <script src="../js/validacionModificarProducto.js"></script>

<?php
}
include_once '../estructura/footer.php';
?>