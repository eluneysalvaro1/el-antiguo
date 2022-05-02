<?php
include_once '../../configuracion.php';
$sesion = new session();
$objUsuario = $sesion->getObjUsuario();
$objRol=$sesion->getRolActivo();
$idRol=$objRol->getIdRol();
$datos = data_submitted();
$arrayRoles = array();

if ($sesion->activa()) {
   include_once '../estructura/cabeceraSegura.php';
}

if ($idRol != 1) {
   echo "</br></br></br></br></br></br>";
   echo "<h4 class='alert alert-danger'>Usted no tiene Permisos para esta seccion</h4>";
} else{
   echo "</br></br></br></br></br></br>";
   $descripcion = "";
   // print_r($datos);
   $datos = data_submitted();
   $abmUsuario = new abmUsuario();
   $listaUsuario = $abmUsuario->buscar($datos);
   $objUsuario = $listaUsuario[0];
   $abmUsuarioRol = new abmUsuarioRol();
   $listaRoles = $abmUsuarioRol->buscar($datos);
   $abmRol = new abmRol();

   if (count($listaRoles) > 0) {
      foreach ($listaRoles as $obj) {
         array_push($arrayRoles, $obj->getObjRol()->getIdRol());
      }
   } ?>
   <div class="container mt-5">

      <div class="card card-info">
         <form class="needs-validation" novalidate id="editarUsuario" name="editarUsuario" action="../accion/accionEditarUsuario.php" method="post">
            <?php
            echo "<input class='form-control' id='idUsuario' name='idUsuario' type='hidden' value='{$datos['idUsuario']}'>"; ?>
            <div class="mb-3">
               <label for="usuario" class="form-label">Nombre Usuario</label>
               <input class='form-control' id='usNombre' name='usNombre' type='text' placeholder='Nuevo nombre' value="<?php echo $objUsuario->getUsNombre() ?>" required>


            </div>

            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Email address</label>
               <input type='email' class='form-control' id='usMail' name='usMail' placeholder='Nuevo email' value='<?php echo $objUsuario->getUsMail() ?>' required>


            </div>

            <div class="col-sm-5 m-2">
               <label>Roles del usuario</label>
               <?php
               $rolesDisp = $abmRol->buscar(null);
               if (count($rolesDisp) != 0) {
                  echo '<div class="form-group">
               <div class="input-group">';
                  foreach ($rolesDisp as $rol) {
                     $checked = "";
                     if (in_array($rol->getIdRol(), $arrayRoles)) {
                        $checked = "checked";
                     }
                     echo '<label class="form-check-label ms-1 me-2 fw-light">
    <input class="form-check-input" type="checkbox" id="roles" name="roles[]" value="'
                        . $rol->getIdRol() . '" ' . $checked . ' required> ' . $rol->getRolDescripcion() . '
 </label>';
                  }
                  echo '</div>
                                            </div>
                                        </div>';
               } ?>
            </div>
            <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label">Password</label>
               <input class='form-control' id='usPass' name='usPass' type='password' placeholder='Nuevo Contraseña' value='<?php echo $objUsuario->getUsPass() ?>' required>

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
         <div id="validaciones"></div>
      </div>
   </div>
   <script src="../js/bootstrap/validatorEditor.js"></script>

<?php
}
include_once '../estructura/footer.php';
?>