<?php
include_once '../../configuracion.php';
include_once '../estructura/cabeceraSegura.php';
$abmCompraEstado = new abmCompraEstado();
$listaCompras = $abmCompraEstado->buscar(null);
$abmCompraEstadoTipo = new abmCompraEstadoTipo();
if ($tienePermiso == false) {
  echo "</br></br></br></br></br></br>";
  echo "<h4 class='alert alert-danger'>Usted no tiene Permisos para esta seccion</h4>";
} else {
?>
  <div class="container mt-5">
    <h1 style="margin-top: 150px;">Panel de administracion de Compras</h1>
    <table class="table table-bordered ">
      <thead>
        <tr>
          <th scope="col" class="text-center">Id Compra Estado</th>
          <th scope="col" class="text-center">Id Compra</th>
          <th scope="col" class="text-center">Estado de la compra </th>
          <th scope="col" class="text-center">Fecha Inicial</th>
          <th scope="col" class="text-center">Fecha Final de la compra</th>
          <th scope="col" class="text-center">Modificar Estados </th>

        </tr>
      </thead>
      <?php
      if (count($listaCompras) > 0) {
        $estadosDisponibles = $abmCompraEstadoTipo->buscar(null);

        foreach ($listaCompras as $objCompraEstado) {
           echo '<form action="editarEstadoCompra.php" method="post">';
          $span = '';
          //Datos de compra
          $objCompra = $objCompraEstado->getObjCompra();
          $idCompra = $objCompra->getIdCompra();
          //Datos de compra estado tipo
          $objCompraEstadoTipo = $objCompraEstado->getObjCompraEstadoTipo();
          $descripcion = $objCompraEstadoTipo->getCompraEstadoTipoDescripcion();
          //datos compra estado
          $idCompraEstado = $objCompraEstado->getIdCompraEstado();

          echo '<tr><td class="text-center" style="width:200px;">' . $idCompraEstado . '</td>';
          echo '<td class="text-center" style="width:200px;">' . $idCompra . '</td>';
          echo '<td class=" mt-3 badge rounded-pill bg-success d-flex justify-content-center align-items-center">' . $descripcion . '</td>';
          echo '<td class="text-center" style="width:200px;">' . $objCompraEstado->getCompraEstadoFechaInicial() . '</td>';
          echo '<td class="text-center" style="width:200px;">' . $objCompraEstado->getCompraEstadoFechaFinal() . '</td>';
          if($descripcion =="aceptada" || $descripcion=="iniciada"){
          echo "
          <td class='text-center'>
          <input name='idCompraEstado' id='idCompraEstado' type='hidden' value='$idCompraEstado'>
          <button class='btn btn-dark' type='submit'><i class='fas fa-edit'></i></button></td></form>
          </tr>";
        }
        if (isset($_GET['Message'])) {
          print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
        }
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