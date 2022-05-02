<?php
include_once '../../configuracion.php';
// $sesion = new session();
include_once '../estructura/cabeceraSegura.php';

$objUsuario = $sesion->getObjUsuario();
$idUsuario = $objUsuario->getIdUsuario();
$abmCompra = new abmCompra();
$datos = ['idUsuario' => $idUsuario];

//Buscamos las compras del usuario Logueado
$listaCompras = $abmCompra->buscar($datos);

// print_r($listaCompras);


if (isset($_GET['Message'])) {
  print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
}
if ($tienePermiso == false) {
  echo "</br></br></br></br></br></br>";
  echo "<h4 class='alert alert-danger'>Usted no tiene Permisos para esta seccion</h4>";
} else {
?>
  <div class="container" style="margin-top: 100px;">
    <h1>El historial de compras en nuestra tienda!</h1>
    <h4>Podras seguir el proceso de tu compra</h4>
    <h4>Recorda que podes cancelar la compra mientras su estado sea iniciada</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col" class="text-center">Compra N°</th>

          <th scope="col" class="text-center"> Fecha de inicio</th>
          <th scope="col" class="text-center" style="width: 150px;">Estado de la compra</th>
          <th scope="col" class="text-center" style="width: 150px;">Cancelar Compra</th>

        </tr>
      </thead>


      <?php
      //Por cada Compra Buscamos en compra estado sus compras
      foreach ($listaCompras as $objCompra) {
        $idCompra = $objCompra->getIdCompra();
        $datos = ['idCompra' => $idCompra];
        $abmCompraEstado = new abmCompraEstado();
        $listaComprasEstado = $abmCompraEstado->buscar($datos);

        //mostramos el id de la tabla compra, el estado y la fecha de inicio de la compra
        foreach ($listaComprasEstado as $objCompraEstado) {
          $idCompraEstado = $objCompraEstado->getIdCompraEstado();

          $listaCompraEstadoTipo = $objCompraEstado->getObjCompraEstadoTipo();
          $objCompraEstadoTipo = $listaCompraEstadoTipo;
          echo '<tr><td class="text-center" style="width:200px;">' . $idCompra . '</td>';

          echo '<td class="text-center">' . $objCompraEstado->getCompraEstadoFechaInicial() . '</td>';
          echo '<td class=" mt-3 badge rounded-pill bg-success d-flex justify-content-center align-items-center">' . $objCompraEstadoTipo->getCompraEstadoTipoDescripcion() . '</td>';
          if ($objCompraEstadoTipo->getCompraEstadoTipoDescripcion() == "iniciada") {
            echo " <form action='../accion/editarEstadoCompraCliente.php' method='post'>
        <td class='text-center'>
        <input name='idCompraEstado' id='idCompraEstado' type='hidden' value='$idCompraEstado'>
        <button class=' btn btn-dark' type='submit'>
        <i class='fas fa-ban'></i></i></button></td></form></tr>";
          }
        }
      } ?>

  </div>
  </table>

<?php
}
include_once '../estructura/footer.php';
?>