<div class="modal FormGestionarCampania"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Permisos a Usuarios</h4>
        <button type="button" class="close" data-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <div id="mensaje"></div>
        <form class="guardar_permisoUsuario" autocomplete="off" data-parsley-validate>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <input type="text" hidden="" id="campania_id" name="campania_id" value="">
                <input type="text" id="name_campania" class="form-control" disabled="disabled" placeholder="Seleccione una campña">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btnAgregarCampania"><i class="fa fa-search"></i> Buscar</button>
                </span>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="input-group">
                 <input type="text" hidden="" name="usuario_id" id="usuario_id">
                  <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" disabled="disabled" placeholder="Seleccione una usuario">
                  <span class="input-group-btn">
                    <button type="button" data-toggle="modal" data-target="#btnAgregarUsuario"class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                  </span>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
              <div class="form-inline">
                  <ul class="to_do ListaProvincia">
                    
                  </ul>
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="form-inline">
                  <ul class="to_do ListaProvincia1">
                    
                  </ul>
              </div>
            </div>
            <div class="col-md-5 col-sm-5">
              <div class="form-inline">
                  <ul class="to_do ListaProvincia2">
                    
                  </ul>
              </div>
            </div>
          </div>  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            <button type="submit" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" id="btnEditar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Actualizar datos ampaña</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="mensaje1"></div>
        <form id="actualizar_campania" id="demo-form" data-parsley-validate>
          <div class="row">
            <div class="col-md-12 col-sm-6">
              <label for="nombre_campania">NOMBRE DE LA CAMPAÑA* :</label>
              <input type="text" hidden="" name="editId_campania" id="editId_campania" value="" placeholder="">
              <input type="text" id="edit_nombre_campania" class="form-control" name="txt_nombre_campania"  placeholder="Nombre de la campaña" />
              <div class="mensaje"></div>
              <br>
            </div>
             
            <div class="col-md-6 col-sm-6 ">
              <label for="txt_fecha_inicio">FECHA DE INICIO* :</label>
              <input type="date" id="edit_fecha_inicio" class="form-control" name="txt_fecha_inicio"  placeholder="Fecha de inicio" required/>
                
            </div>

            <div class="col-md-6 col-sm-6 ">
              <label for="txt_feha_fin">FECHA DE FIN * :</label>
              <input type="date" id="edit_feha_fin" class="form-control" name="txt_feha_fin" placeholder="Fecha de fin" required />
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

<!-- Modal Eliminar -->
<div class="modal fade bs-example-modal-sm" id="btnEliminar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">Eliminar Campaña</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">¿Esta seguro en eliminar los datos de?</p>
        <h2 class="text-center fullname"></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
        <button type="button" class="btn btn-danger id"><span class="fa fa-trash"></span> Si</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-sm" id="btnEditarEstado" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">ESTADO*:</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="actualizar_estado">
          <div class="row">  
            <div class="col-md-6 col-sm-6">

              <p>ACTIVO:
            <input type="text" hidden="" name="txt_campania_id" id="txt_campania_id" value="">    
            <input type="radio" class="flat" name="estado" id="estado" value="1" required /></p>
            </div>
            <div class="col-md-6 col-sm-6">
              <p>
                INACTIVO:
                <input type="radio" class="flat" name="estado" id="estado" value="0" checked="" required="" />
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
<div class="modal fade bs-example-modal-sm" id="btnAgregarCampania" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">Campaña*:</h4>
      </div>
      <div class="modal-body">
        <div class="tab-pane fade show active" id="Activos" role="tabpanel" aria-labelledby="home-tab">
          <div class="card-box table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                      <th class="th-sm">Nombre de campanña</th>
                      <th class="th-sm">Inicio de la campania</th>
                      <th class="th-sm">Inicio de la campania</th>
                      <th class="th-sm" style="width: 15%">Acción</th>
                    </tr>
                  </thead>
                <tbody id="dataCampania"></tbody>
              </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-sm" id="btnAgregarUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">Lider*:</h4>
      </div>
      <div class="modal-body">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
          <div class="card-box table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                      <th>Dni</th>
                      <th>Lider</th>
                      <th>Rol</th>
                      <th style="width: 15%">Acción</th>
                    </tr>
                  </thead>
                <tbody id="dataUsuario"></tbody>
              </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
      </div>

    </div>
  </div>
</div>