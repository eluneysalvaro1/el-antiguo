<?php
include_once '../../configuracion.php';
$sesion = new session();

$datos = data_submitted();
$rolSesion = $sesion->getColeccionRol();
$objUsuario = $sesion->getObjUsuario();

if (!$sesion->activa()) {
  header('Location: index.php');
} else {
  include_once '../estructura/cabeceraSegura.php';
}
if ($tienePermiso == false) {
  echo "</br></br></br></br></br></br>";
  echo "<h4 class='alert alert-danger'>Usted no tiene Permisos para esta seccion</h4>";
} else {
  echo "</br></br></br></br></br></br>";
  $abmProducto = new abmProducto();
  $listaProductos = $abmProducto->buscar(null); ?>
  <div class="container mt-5">
    <h1>Panel de administracion de Productos</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col" class="text-center">Id Producto</th>
          <th scope="col" class="text-center">Nombre del Producto</th>
          <th scope="col" class="text-center"> Descripcion</th>
          <th scope="col" class="text-center">Stock</th>
          <th scope="col" class="text-center">Precio</th>
          <th scope="col" class="text-center">Editar</th>
          <th scope="col" class="text-center">Borrar</th>
        </tr>
      </thead>
      <?php
      if (count($listaProductos) > 0) {
        foreach ($listaProductos as $objProducto) {
          $idProducto = $objProducto->getIdProducto();
          echo '<tr><td class="text-center" style="width:200px;">' . $objProducto->getIdProducto() . '</td>';
          echo '<td class="text-center" style="width:200px;">' . $objProducto->getProductoNombre() . '</td>';
          echo '<td class="text-center" style="width:200px;">' . $objProducto->getProductoDetalle() . '</td>';
          echo '<td class="text-center" style="width:200px;">' . $objProducto->getProductoStock() . '</td>';
          echo '<td class="text-center" style="width:200px;">' . $objProducto->getProductoPrecio() . '</td>';
          '</tr>';
          echo "<form action='editarProducto.php' method='post'>
        <td class='text-center'>
        <input name='idProducto' id='idProducto' type='hidden' value='$idProducto'>
        <button class='btn btn-dark' type='submit'><i class='fas fa-edit'></i>
        </button></td></form>
        <form action='../accion/eliminarProducto.php' method='post'>
        <td class='text-center'>
        <input name='idProducto' id='idProducto' type='hidden' value='$idProducto'>
        <button class=' btn btn-dark' type='submit'>
        <i class='fas fa-trash-alt'></i></i></button></td></form></tr>";
        }
        if (isset($_GET['Message'])) {
          print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
        }
      } else {
        echo '<h3> No se encontraron registros </h3>';
      } ?>
  </div>
  </table>

<?php
}
include_once '../estructura/footer.php';
?>