
<div class="modal fade" id="NuevoAdmin"  tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-plus"></i> Nuevo Administrador</h4>
      </div>
      <div class="modal-body" style="overflow-y: auto; display: block; height: 500px">
        <legend><i class="fa fa-user fa-sm"></i> Información General</legend><h4></h4>
        
        <form data-form="save" action="<?php echo SERVERURL;?>admin/ajax/administradorAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" data-parsley-validate>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <label for="dni">Dni * :</label>
              <input class="form-control" type="number" autofocus="" class='number' name="dni-reg" data-validate-minmax="10" required='required'>
            </div>
            <div class="col-md-6 col-sm-6">
              
              <label for="nombres">Nombres * :</label>
              <input type="text" class="form-control" name="nombre-reg" required="required" />

              <label for="telefono-reg">Celular * :</label>
              <input class="form-control" type="tel" class='tel' name="telefono-reg" pattern="[0-9+]{1,15}"  required='required' data-validate-length-range="10"/>

            </div>
            <div class="col-md-6 col-sm-6">
              <label for="apellido-reg">Apellidos * :</label>
              <input class="form-control" type="text" name="apellido-reg"  required='required' />

              
              <label for="provincia">Misión * :</label>
              <select class="form-control" name="mision-reg" required="">
                <option value="0">Seleccionar misión</option>
                  <?php foreach ($listarMision as $m): ?>
                <option value="<?php echo $m['id_mision']?>"><?php echo $m['NombreMision']?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-12 col-sm-12">
              <label for="direccion-reg">Dirección * :</label>
              <input  type="text" class="form-control" autofocus="" class='number' name="direccion-reg"  required='required'>
            </div>
          </div>
          <br/>
          <legend><i class="fa fa-key fa-sm"></i> Datos de la cuenta</legend>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <label for="dni">Nombre de usuario * :</label>
              <input class="form-control" type="text" autofocus="" class='number' name="usuario-reg" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" data-validate-minmax="10" required='required'>
            </div>
            <div class="col-md-6 col-sm-6">

              <label for="password1-reg">Contraseña * :</label>
              <input type="text" class="form-control" data-validate-length-range="3" data-validate-words="1" name="password1-reg" required="required" />

            </div>
            <div class="col-md-6 col-sm-6">
              <label for="apellido-reg">Repite la contraseña * :</label>
              <input class="form-control" type="text" name="password2-reg"  required='required' />

            </div>
            <div class="col-md-12 col-sm-12">
              <label for="direccion-reg">Email * :</label>
              <input  type="email" class="form-control" autofocus="" class='number' name="email-reg" required='required'>
              
              <label>Genero *:</label>

               <div class="radio">
                  <label>
                    <input type="radio" class="flat" checked name="optionsGenero" value="Masculino"> <i class="fa fa-male"></i> Masculino
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" class="flat" name="optionsGenero" value="Femenino"> <i class="fa fa-female"></i> Femenino
                  </label>
                </div>
            </div>
            </br></br></br>
            
            <legend><i class="fa fa-star"></i> Nivel de privilegios</legend>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  
                  <label class="control-label"><span class="badge bg-green">Nivel 1</span> Control total del sistema
                  </label>
                  
                  <label class="control-label"><span class="badge bg-blue">Nivel 2</span> Permiso para registro y actualización
                  </label>
                  <label class="control-label"><span class="badge bg-orange">Nivel 3</span> Permiso para registro
                  </label>
                </div>
                <div class="col-xs-6 col-sm-6">
                  <?php //if ($_SESSION['privilegio_sehs']==1):?>
                   <div class="radio">
                      <label>
                        <input type="radio" class="flat" checked name="optionsPrivilegio" value="<?php echo $lc->encryption(1); ?>"> <i class="fa fa-star-o"></i> Nivel 1
                      </label>
                    </div>
                  <?php //endif; 
                   //if($_SESSION['privilegio_sehs']<=2):

                  ?>
                    <div class="radio">
                      <label>
                        <input type="radio" class="flat" name="optionsPrivilegio" value="<?php echo $lc->encryption(2); ?>"> <i class="fa fa-star-o"></i> Nivel 2
                      </label>
                    </div>
                  <?php //endif; ?>
                    <div class="radio">
                      <label>
                        <input type="radio" class="flat" name="optionsPrivilegio" value="<?php echo $lc->encryption(3); ?>"> <i class="fa fa-star-o"></i> Nivel 3
                      </label>
                    </div>
                </div>
              </div>
            </div>
         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
          </div>
           
        </form>
        
      </div>
    </div>
  </div>
</div>


<!-- MODAL ACTUALIZAR-->
<div class="modal fade" id="ActualizarCuentaAdmin"  tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
         
          <i class="fa fa-plus"></i> Actualizar Administrador</h4>
      </div>
      <div class="modal-body" style="overflow-y: auto; display: block; height: 500px;">
        
        <form data-form="update" action="<?php echo SERVERURL;?>admin/ajax/cuentaAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" data-parsley-validate> 
          <div class="row">
            <legend><i class="fa fa-key fa-sm"></i> Datos de la cuenta</legend>
            <div class="col-md-6 col-sm-6">
              <label for="dni">Nombre de usuario * :</label>
              <input type="text" hidden=""  name="codigoCuenta-up" id="codigoCuenta-up" value="">
              <input type="text" hidden=""  name="tipoCuenta-up" id="tipoCuenta-up" value="<?php echo $lc->encryption($_SESSION['cuenta_tipo_sehs']); ?>">
              <input class="form-control" type="text" autofocus="" class='number' name="usuario-up" id="usuario-up" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" placeholder="Nombre de usuario" required='required'>
            </div>
            <div class="col-md-6 col-sm-6">
              <label for="direccion-reg">Email * :</label>
              <input  type="email" class="form-control" autofocus="" class='number' name="email-up" id="email-up" placeholder="Email" required='required'>
            </div>
            <div class="col-md-6 col-sm-6">
              <label>Genero *:</label>
               <div class="radio">
                  <label>
                    <input type="radio" class="flat" name="optionsGenero-up" value="Masculino" id="M"> <i class="fa fa-male"></i> Masculino
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" class="flat" name="optionsGenero-up" value="Femenino"> <i class="fa fa-female"></i> Femenino
                  </label>
                </div>
            </div>
            <?php if($_SESSION['tipo_sehs'] == "Administrador" && $_SESSION['privilegio_sehs'] == 1): ?>

            <div class="col-md-6 col-sm-6">
              <label>Estado de la cuenta *:</label>

               <div class="radio">
                  <label>
                    <input type="radio" class="flat" name="optionsEstado-up" value="Activo"> Activo
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" class="flat" name="optionsEstado-up" value="Inactivo"> Inactivo
                  </label>
                </div>
            </div>
            <?php endif; ?>
            <legend><i class="fa fa-lock"></i> Actualizar Contraseña</legend>
            <div class="col-md-6 col-sm-6">
              <label for="password1-reg">Contraseña * :</label>
              <input type="text" class="form-control" name="newpassword1-reg" placeholder="Nueva contraseña " />

            </div>
            <div class="col-md-6 col-sm-6">
              <label for="apellido-reg">Repite la contraseña * :</label>
              <input class="form-control" type="text" name="newpassword2-reg" placeholder="Repite la contraseña" />
            </div>
            
            </br></br></br>
             <?php if($_SESSION['tipo_sehs'] == "Administrador" && $_SESSION['privilegio_sehs'] == 1): ?>
            <legend><i class="fa fa-star"></i> Nivel de privilegios</legend>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <label class="control-label"><span class="badge bg-green">Nivel 1</span> Control total del sistema
                  </label>
                  <label class="control-label"><span class="badge bg-blue">Nivel 2</span> Permiso para registro y actualización
                  </label>
                  <label class="control-label"><span class="badge bg-orange">Nivel 3</span> Permiso para registro
                  </label>
                </div>
                <div class="col-xs-6 col-sm-6">
                   <div class="radio">
                      <label>
                        <input type="radio" class="flat" checked name="optionsPrivilegio" value="1"> <i class="fa fa-star-o"></i> Nivel 1
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" class="flat" name="optionsPrivilegio" value="2"> <i class="fa fa-star-o"></i> Nivel 2
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" class="flat" name="optionsPrivilegio" value="3"> <i class="fa fa-star-o"></i> Nivel 3
                      </label>
                    </div>
                </div>
              </div>
            </div>


            <?php endif; ?>
           <legend><i class="fa fa-user"></i> Iniciar sesión</legend>
            <div class="col-md-6 col-sm-6">
              <label for="usuarioLogin">Usuario * :</label>
              <input type="text" class="form-control" name="usuarioLogin" placeholder="Usuario "/>

            </div>
            <div class="col-md-6 col-sm-6">
              <label for="passwordLogin">Contraseña * :</label>
              <input class="form-control" type="password" name="passwordLogin" placeholder="Contraseña"  />
            </div>

          </div> <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            <button type="submit" class="btn btn-primary"><span class="fa fa-refresh"></span> Actualizar</button>
          </div>
           
        </form>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ActualizarDatosAdmin"  tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-plus"></i> Actualizar Administrador</h4>
      </div>
      <div class="modal-body">
        <legend><i class="fa fa-user fa-sm"></i> Información General</legend><h4></h4>
        <form data-form="update" action="<?php echo SERVERURL;?>admin/ajax/administradorAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" data-parsley-validate>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <label for="dni">Dni * :</label>
              <input type="text" hidden="" name="codigo-up" id="codigo-up" value="">
              <input class="form-control" type="number" autofocus="" class='number' name="dni-up" id="dni-up" data-validate-minmax="10" required='required'>
            </div>
            <div class="col-md-6 col-sm-6">
              
              <label for="nombres">Nombres * :</label>
              <input type="text" class="form-control" name="nombre-up" id="nombre-up" required="required" />

              <label for="telefono-reg">Celular * :</label>
              <input class="form-control" type="tel" class='tel' name="telefono-up" id="telefono-up" pattern="[0-9+]{1,15}"  required='required' data-validate-length-range="10"/>

            </div>
            <div class="col-md-6 col-sm-6">
              <label for="apellido-reg">Apellidos * :</label>
              <input class="form-control" type="text" name="apellido-up" id="apellido-up"  required='required' />

              
              <label for="provincia">Misión * :</label>
              <select class="form-control" name="mision-up" id="mision-up" required="">
                <option value="0">Seleccionar misión</option>
                <?php foreach ($listarMision1 as $ma): ?>
                <option value="<?php echo $ma['id_mission']?>"><?php echo $ma['name_mission']?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-12 col-sm-12">
              <label for="direccion-reg">Dirección * :</label>
              <input  type="text" class="form-control" autofocus="" class='number' name="direccion-up" id="direccion-up" required='required'>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            <button type="submit" class="btn btn-primary"><span class="fa fa-refresh"></span> Actualizar</button>
          </div>
           
        </form>
        
      </div>
    </div>
  </div>
</div>