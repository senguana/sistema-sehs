<div class="FormGestionarCampania">
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>GESTIONAR CAMPAÑA</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Design <small>different form elements</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form data-form="save" action="<?php echo SERVERURL;?>admin/ajax/campaniaAjax.php" method="POST" class="FormularioAjax" autocomplete="off" >
                <div class="col-md-6 col-sm-6  form-group">
                  <label for="heard">SELECCIONAR USUARIO *:</label>
                  <div class="input-group">
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-primary go-class tablaUsuario">Buscar <i class="fa fa-search"></i></button>
                      </span>
                      <input type="text" id="nombre_usuario" class="form-control" readonly="">
                      <input type="text" name="codigo_usuario" id="codigo_usuario" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6  form-group">
                    <label for="heard">SELECCIONAR CAMPAÑA *:</label>
                    <select name="nombre_campania" id="heard" class="form-control" onchange="datos_provincia()" required>
                      <option value="">Seleccionar Campaña...</option>
                      <?php foreach ($selectCampania as $row): ?>
                      <option value="<?php echo $row['Id']?>"><?php echo $row['NombreCampania']?></option>
                      <?php endforeach; ?>
                       
                    </select>
                </div>
                <div class="col-md-12 col-sm-12  form-group">
                  <ul class="to_do">
                    <div id="loader">
                      
                    </div>
                  </ul>
                </div>
<!--                <div class="ln_solid"></div>-->
                <div class="form-group row">
                  <div class="col-md-9 col-sm-9  offset-md-3">
                    <a href="<?php echo SERVERURL; ?>admin/gestionar-campania" class="btn btn-primary" type="button">Regresar</a>
                    <button class="btn btn-primary" type="reset">Limpiar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>