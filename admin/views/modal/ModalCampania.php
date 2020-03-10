<div class="modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Registrar Campaña</h4>
        <button type="button" class="close" data-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form data-form="save" action="<?php echo SERVERURL;?>admin/ajax/campaniaAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12 col-sm-6">
              <label for="nombre_campania-reg">NOMBRE DE LA CAMPAÑA* :</label>
              <input type="text" class="form-control" name="nombre_campania-reg"  placeholder="Nombre de la campaña" required="" />
            </div>
             
            <div class="col-md-6 col-sm-6 ">
              <label for="fecha_inicio-reg">FECHA DE INICIO* :</label>
              <input type="date" class="form-control" name="fecha_inicio-reg"  placeholder="Fecha de inicio" required/> 
            </div>

            <div class="col-md-6 col-sm-6 ">
              <label for="txt_feha_fin">FECHA DE FIN * :</label>
              <input type="date" class="form-control" name="fecha_fin-reg" placeholder="Fecha de fin" required />
            </div>
          </div>
          <br/>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            <button type="submit" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="EditarCampania" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-edit" ></i> Actualizar datos campaña</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form data-form="update" action="<?php echo SERVERURL;?>admin/ajax/campaniaAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12 col-sm-6">
              <label for="nombre_campania">NOMBRE DE LA CAMPAÑA* :</label>
              <input type="text" hidden="" name="codigo_campania-up" id="codigo_campania-up" value="">
              <input type="text" hidden="" name="id_campania-up" id="id_campania-up" value="">
              <input type="text" id="nombre_campania-up" class="form-control" name="nombre_campania-up"  placeholder="Nombre de la campaña" />
            </div>
             
            <div class="col-md-6 col-sm-6 ">
              <label for="txt_fecha_inicio">FECHA DE INICIO* :</label>
              <input type="date" id="fecha_inicio-up" class="form-control" name="fecha_inicio-up"  placeholder="Fecha de inicio" required/>
                
            </div>

            <div class="col-md-6 col-sm-6 ">
              <label for="txt_feha_fin">FECHA DE FIN * :</label>
              <input type="date" id="fecha_fin-up" class="form-control" name="fecha_fin-up" placeholder="Fecha de fin" required />
            </div>
            <div class="col-md-12 col-sm-12">
              <br>
              <label for="">ESTADO *:</label>
            </div>
            <div class="col-md-4 col-sm-4">
                <p>ACTIVO:   
              <input type="radio" class="flat" name="estado" id="estado1" value="1"  checked="" required /></p>
            </div>
              <div class="col-md-4 col-sm-4">
                <p>
                  INACTIVO:
                  <input type="radio" class="flat" name="estado" id="estado0" value="0" />
                </p>
              </div>
          </div>
          <br/>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            <button type="submit" class="btn btn-primary"><span class="fa fa-refresh"></span> Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="btnEditarEstado" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">ESTADO*:</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo SERVERURL;?>admin/ajax/campaniaAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
          <div class="row">  
            <div class="col-md-6 col-sm-6">

              <p>ACTIVO:
            <input type="text" hidden="" name="codigo_campania" id="codigo_campania" value="">    
            <input type="radio" class="flat" name="estado" value="1" required /></p>
            </div>
            <div class="col-md-6 col-sm-6">
              <p>
                INACTIVO:
                <input type="radio" class="flat" name="estado" value="0" checked="" required="" />
              </p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
            <button type="submit" class="btn btn-primary "><span class="fa fa-refresh"></span> Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>