
<?php include_once 'views/modal/ModalAdmin.php'; ?>
<?php 
 require_once './controllers/ControladorAdministrador.php';
 $insAdmin = new ControladorAdministrador();
 ?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>ADMINISTRADORES</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
                <div class="col-sm-12">                
                  <?php 
                  $datos = explode("/", $_GET['views']);
                  if ($datos[1]=="admin"):
                      if ( $_SESSION['cuenta_tipo_sehs']!=1 ) {
                         echo $lc->forzar_cerrar_sesion_controlador();
                       }
                  require_once './controllers/ControladorAdministrador.php';
                  $insAdmin = new ControladorAdministrador();  
                  $filesAdmin = $insAdmin->datos_administrador_controlador("Unico",$datos[2]);
                  if ($filesAdmin->rowCount()==1) {
                    $campos = $filesAdmin->fetch();
                   ?>
             <legend><i class="fa fa-user fa-sm"></i> Información General</legend><h4></h4>
        <form data-form="update" action="<?php echo SERVERURL;?>admin/ajax/administradorAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" data-parsley-validate>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <label for="dni">Dni * :</label>
              <input type="text" name="codigo-up" hidden="" id="codigo-up" value="<?php echo $datos[2];?>">
              <input class="form-control" type="number" autofocus="" name="dni-up" id="dni-up" value="<?php echo $campos['AdminDNI'];?>" required='required'>
            </div>
            <div class="col-md-6 col-sm-6">
              
              <label for="nombres">Nombres * :</label>
              <input type="text" class="form-control" name="nombre-up" id="nombre-up" value="<?php echo $campos['AdminNombre'];?>" required="required" />

              <label for="telefono-reg">Celular * :</label>
              <input class="form-control" type="tel" class='tel' name="telefono-up" id="telefono-up" pattern="[0-9+]{1,15}"  required='required' value="<?php echo $campos['AdminTelefono'];?>"/>
              <label for="apellido-reg">Email * :</label>
              <input class="form-control" type="text" name="email-up" id="email-up" value="<?php echo $campos['AdminEmail'];?>"  required='required' />

              <label>Genero *:</label>

               <div class="radio">
                  <label>
                    <input type="radio" class="flat" <?php 
                    if ($campos['AdminGenero']=="Masculino") {
                      echo "checked ";
                    }
                     ?> name="optionsGenero" value="Masculino"> <i class="fa fa-male"></i> Masculino
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" <?php 
                    if ($campos['AdminGenero']=="Femenino") {
                      echo "checked ";
                    }
                     ?> class="flat" name="optionsGenero" value="Femenino"> <i class="fa fa-female"></i> Femenino
                  </label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
            
              <label for="apellido-reg">Apellidos * :</label>
              <input class="form-control" type="text" name="apellido-up" id="apellido-up" value="<?php echo $campos['AdminApellido'];?>"  required='required' />
               
              <?php 
              require_once 'models/ModeloFunciones.php'; 
              $listarFuncion = new ModeloFunciones(); 
              $listarMision1 = $listarFuncion->listarMision(); 
              ?>
              <label for="provincia">Misión * :</label>
              <select class="form-control" name="mision-up" id="mision-up" required="">
                <option value="0">Seleccionar misión</option>
                <?php foreach ($listarMision1 as $ma): ?>
                <option <?php if ($campos['AdminMisionId']==1) {
                  echo "selected";
                } ?> value="<?php echo $ma['id_mision']?>"><?php echo $ma['NombreMision']?></option>
                
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-12 col-sm-12">
              <label for="direccion-reg">Dirección * :</label>
              <input  type="text" class="form-control" class='number' name="direccion-up" value="<?php echo $campos['AdminDireccion'];?>" id="direccion-up" required='required'>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            <button type="submit" class="btn btn-primary"><span class="fa fa-refresh"></span> Actualizar</button>
          </div>
           
        </form>

                   <?php } else{?>  
                  

                  <h1>NO PODEMOS MOSRAR</h1>
                  <?php 
                     }
                   
                  elseif ($datos[1]=="user"):
                    
                      ?> 
                  <?php
                 require_once './controllers/ControladorUsuario.php';
                  $insUser = new ControladorUsuario();
                  $datos = explode("/", $_GET['views']);
                    $filesUser = $insUser->datos_controlador_usuario("Unico1",$datos[2]);
                     $campos = $filesUser->fetch();
                     
                    ?>     
                  <div class="x_content">
                    <br />
                    <legend>Cambiar Usuario</legend><h4></h4>
                    <form data-form="update" action="<?php echo SERVERURL;?>admin/ajax/usuarioAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >

                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 label-align " for="first-name">Usuario <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="usuario-up" value="<?php echo $campos['CuentaUsuario']; ?>" class="form-control" placeholder="Usuario">
                          <input type="text" hidden="" name="codigo_cuenta_up" value="<?php echo $datos[2]; ?>"  class="form-control ">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i>Actualizar usuario</button>
                        </div>
                      </div>

                    </form>
                     <br />
                    <legend>Cambiar la contraseña</legend><h4></h4>
                    <form data-form="update" action="<?php echo SERVERURL;?>admin/ajax/usuarioAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >

                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 label-align " for="first-name">Contraseña actual <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="passwordA" value="" class="form-control" placeholder="Contraseña actual">
                          <input type="text" hidden="" name="codigo_cuenta_pass" value="<?php echo $datos[2]; ?>" class="form-control" placeholder="Contraseña actual">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 label-align " for="first-name">Nueva Contraseña <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="passwordN" value="" class="form-control" placeholder="Nueva Contraseña">
                        </div>
                      </div> 
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 label-align " for="first-name">Confirmar contraseña <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="passwordC" value="" class="form-control" placeholder="Conformar contraseña ">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign"></i>Guardar cambios</button>
                        </div>
                      </div>

                    </form>
                  </div>
                  <?php else:

                  ?>
                  <h1>No podemos mostrar</h1>
                <?php endif; ?>
                </div>
                 <div class="RespuestaAjax"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
<script src="assets/js/sehs/admin.js" type="text/javascript" charset="utf-8" async defer></script>