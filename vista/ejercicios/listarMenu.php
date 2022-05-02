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

echo "<h4>Usted esta Logueado como: {$objUsuario->getUsNombre()}</h4>";


$abmMenu = new abmMenu();
$listaMenu = $abmMenu->buscar(null);
$abmMenuRol = new abmMenuRol;
$listaMenuRol = $abmMenuRol->buscar(null);

if ($tienePermiso == false) {
  echo "</br></br></br></br></br></br>";
  echo "<h4 class='alert alert-danger'>Usted no tiene Permisos para esta seccion</h4>";
} else {
?>

  <div class="container mt-5">
    <h1>Panel de administracion de Menu</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col" class="text-center">Id Menu</th>
          <th scope="col" class="text-center">Nombre </th>
          <th scope="col" class="text-center"> Link</th>
          <th scope="col" class="text-center">Sub Menu de</th>
          <th scope="col" class="text-center">Rol asignado</th>
          <th scope="col" class="text-center">Estado</th>
          <th scope="col" class="text-center">Editar Datos<th>
          
        </tr>
      </thead>
      <?php
      if (count($listaMenu) > 0) {
        foreach ($listaMenu as $objMenu) {
          $idMenu = $objMenu->getIdmenu();

          $datos['idmenu'] = $idMenu;
          $listaMenu = $abmMenu->buscar($datos);

          echo '<tr><td class="text-center" style="width:200px;">' . $objMenu->getIdmenu() . '</td>';
          echo '<td class="text-center" style="width:200px;">' . $objMenu->getMenombre() . '</td>';
          echo '<td class="text-center" style="width:200px;">' . $objMenu->getMedescripcion() . '</td>';
          // busco el Padre y si es nulo imprimo principal y sino extraigo la descripcion del Padre
          $objPadre = new AbmMenu;
          $objPadre = $objMenu->getObjMenu();
          if($objPadre == null){
            echo '<td class="text-center" style="width:200px;">' . "Menu Principal". '</td>';
          }else{
                  $objPadre = $objMenu->getObjMenu();
                  echo '<td class="text-center" style="width:200px;">' . $objPadre->getMenombre() . '</td>';     
          }
          //busco los roles para asignados a ese menu

          $descripcion = "";
          foreach ($listaMenuRol as $menuRol) {
            $idMenuEnRol= $menuRol->getObjMenu()->getIdmenu();
            if($idMenuEnRol == $objMenu->getIdmenu()){
              $objRol = $menuRol->getObjRol();
              $descripcion = $descripcion .$objRol-> getRolDescripcion(). '</br>';
            }
          }
          echo '<td class="text-center" style="width:200px;">' . $descripcion . '</td>';
          '</tr>';
          
          if ($objMenu->getMedeshabilitado() == null || $objMenu->getMedeshabilitado() == "0000-00-00 00:00:00") {
            echo "<td class='text-center'><i class='far fa-check-circle'></i></td>";
          } else {
            echo "<td class='text-center'><i class='far fa-times-circle'></i></td>";
          }
          echo "<form action='editarUsuarioSinJquery.php' method='post'>
        <td class='text-center'>
        <input name='idmenu' id='idmenu' type='hidden' value='$idMenu'>
        <button class='btn btn-dark' type='submit'><i class='fas fa-edit'></i>
        </button></td></form>
        <form action='../accion/deshabilitarMenu.php' method='post'>
        <td class='text-center'>
        <input name='idmenu' id='idmenu' type='hidden' value='$idMenu'>
        <button class=' btn btn-dark' type='submit'>
        <i class='fas fa-user-times'></i></i></button></td></form></tr>";
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