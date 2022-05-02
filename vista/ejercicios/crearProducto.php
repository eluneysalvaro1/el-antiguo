<?php
include_once '../../configuracion.php';

$sesion = new session();
if ($sesion->activa()) {
    include_once '../estructura/cabeceraSegura.php';
} else {
    header('Location: ../home/index.php');
}
if ($tienePermiso == false) {
    echo "</br></br></br></br></br></br>";
    echo "<h4 class='alert alert-danger'>Usted no tiene Permisos para esta seccion</h4>";
} else {
?>

    <div class="container" style="margin-top: 100px;">
        <div class="card card-info">
            <form class="" action='../accion/accionCrearProducto.php' novalidate id="formularioCrearProducto" name="formularioCrearProducto" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Nombre Producto</label>
                    <input class='form-control' id='productoNombre' name='productoNombre' type='text' placeholder='Nombre Producto' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Detalle Producto</label>
                    <input type='text' class='form-control' id='productoDetalle' name='productoDetalle' placeholder='Detalle del producto' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Stock</label>
                    <input class='form-control' id='productoStock' name='productoStock' type='number' placeholder='Stock Producto' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Precio</label>
                    <input class='form-control' id='productoPrecio' name='productoPrecio' type='number' placeholder='Precio Producto' required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Imagen</label>
                    <input class='form-control' id='productoImagen' name='productoImagen' type='file' accept="image/png, .jpeg, .jpg, image/gif" required>
                </div>
                <div class="mb-3">
                    <p id="invalido"></p>
                </div>
                <button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
            </form>
            <div id="validaciones"></div>
        </div>
    </div>

    <script src="../js/validacionCrearProducto.js"></script>
<?php
}
include_once '../estructura/footer.php';
?>