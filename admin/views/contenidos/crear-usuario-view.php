<?php include_once 'views/modal/ModalBuscarColportor.php'; ?>
 <div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>ADMINISTRACIÓN DE USUARIOS</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5  form-group pull-right top_search">
          <div class="input-group">
            <input type="text" id="codigo_colportor1" class="form-control" placeholder="Buscar usuario..." readonly="">
             
              <button class="btn btn-primary tablaColport" type="button"><i class="fa fa-search"></i>Buscar</button>
            
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Creando nuevo usuario</h2>
            <div class="clearfix"></div>
          </div>   
          <div class="x_content">
            <br />
            <form data-form="save" action="<?php echo SERVERURL;?>admin/ajax/usuarioAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >

              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Colportor <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="nombres" value="" readonly="" class="form-control ">
                  <input type="text" hidden="" id="codigo_colportor" name="codigo_colportor-reg" value="" readonly="" class="form-control ">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="usuario">Usuario<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="usuario" name="usuario-reg" class="form-control" placeholder="Usuario">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Contraseña <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="contrasena-reg"  class="form-control" placeholder="Contraseña">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Seleccionar Rol: <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <select name="rol-reg"  class="form-control" required>
                    <option value="">Seleccionar Rol...</option>
                    <option value="1">Administrador</option>
                    <option value="2">Lider</option>
                  </select>
                </div>
              </div>
              <div class="info">
                
              </div>
              <!-- <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Foto<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>              
                  <div class="kv-avatar center-block">                  
                      <input type="file" class="form-control" id="usuarioImagen" placeholder="Imagen del producto" name="usuarioImagen" class="file-loading" style="width:auto;"/>
                  </div>
                </div>
              </div> -->
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"><span class="badge bg-green">Nivel 1</span> Control total del sistema
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <div class="radio">
                        <label>
                           <input type="radio" class="flat" checked name="optionsPrivilegio" value="<?php echo $lc->encryption(1); ?>"> <i class="fa fa-star-o"></i>
                        </label>
                      </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"><span class="badge bg-blue">Nivel 2</span> Permiso para registro y actualización
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <div class="radio">
                        <label>
                           <input type="radio" class="flat" checked name="optionsPrivilegio" value="<?php echo $lc->encryption(2); ?>"> <i class="fa fa-star-o"></i>
                        </label>
                      </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"><span class="badge bg-orange">Nivel 3</span> Permiso para registro
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <div class="radio">
                        <label>
                           <input type="radio" class="flat" checked name="optionsPrivilegio" value="<?php echo $lc->encryption(3); ?>"> <i class="fa fa-star-o"></i>
                        </label>
                      </div>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <a href="" class="btn btn-primary" type="button">Cancelar</a>
                  <button class="btn btn-primary" type="reset">Limpiar</button>
                  <button type="submit" class="btn btn-success">Crear usuario</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/sehs/crear_usuario.js" type="text/javascript" charset="utf-8" async defer></script>