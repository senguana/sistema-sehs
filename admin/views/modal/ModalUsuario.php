<div class="modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Registrar Usuario</h4>
        <button type="button" class="close" data-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form id="guardar_usuario" id="demo-form" autocomplete="off" data-parsley-validate>
          <div class="row">
            <div class="col-md-12 col-sm-6  form-group has-feedback">
              <input type="text" hidden=""  name="txt_id_person" id="id_persona" value="">
              <input type="text" class="form-control has-feedback-left" id="buscar_persona" name="buscar_persona" placeholder="Ingresar DNI o nombre de la persona">
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              <div id="error"></div><br>
            </div>
            
            <div class="col-md-4 col-sm-4 ">
              <label for="usuario">USUARIO* :</label>
              <input type="text" id="usuario" class="form-control" name="txt_usuario"  placeholder="Usuario" required/>
                <div class ="mensaje"></div>
            </div>
          
            <div class="col-md-4 col-sm-4 ">
              <label for="password">PASSWORD * :</label>
              <input type="text" id="password" class="form-control" name="txt_password" placeholder="Password" required />
            </div>
            
            <div class="col-md-4 col-sm-4 ">
              <label for="heard">ROL*:</label>
              <select id="heard" name="txt_rol" class="form-control" required>
                <option value="" enabled>Seleccionar Rol</option>
                <option value="1">Adminisrador</option>
                <option value="2">Lider</option>
                
              </select>
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

<div class="modal fade bs-example-modal-lg" id="btnEditar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Actualizar datos usuario</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="mensaje1"></div>
        <form id="actualizar_usuario" id="demo-form" data-parsley-validate>
          <div class="row">
            <div class="col-md-12 col-sm-6  form-group has-feedback">
              <input type="text" hidden=""   name="txt_id_user" id="id_usuario" value="">
              <input type="text" hidden=""  name="txt_id_person" id="id_person" value="">
              <input type="text" class="form-control has-feedback-left" id="edt_buscar_persona" name="buscar_persona" placeholder="Ingresar DNI o nombre de la persona">
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span><br>
            </div>
            <div class="col-md-4 col-sm-4 ">
              <label for="usuario">USUARIO* :</label>
              <input type="text"  class="form-control" name="txt_usuario" id="edt_usuario" placeholder="Usuario" required/>
                <div class ="mensaje"></div>
            </div>
          
            <div class="col-md-4 col-sm-4 ">
              <label for="password">PASSWORD * :</label>
              <input type="text"  class="form-control" name="txt_password" id="edt_password" placeholder="Password" />
            </div>
            
            <div class="col-md-4 col-sm-4 ">
              <label for="heard">ROL*:</label>
              <select id="rol" name="txt_rol" class="form-control" required>
                <option value="" enabled>Seleccionar Rol</option>
                <option value="1">Adminisrador</option>
                <option value="2">Lider</option>
                
              </select>
            </div>
            <div class="col-md-4 col-sm-4 ">
              <br><label>ESTADO*:</label>
              <p>
                ACTIVO:
                <input type="radio" class="flat" name="estado" id="estado" value="1" checked="" required />
                INACTIVO:
                <input type="radio" class="flat" name="estado" id="estado" value="0" />
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
        <h4 class="modal-title" id="myModalLabel2">Eliminar Usuario</h4>
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
            <input type="text" hidden="" name="txt_persona_id" id="txt_persona_id" value="">    
            <input type="radio" class="flat" name="estado" id="estado" value="1" checked="" required /></p>
            </div>
            <div class="col-md-6 col-sm-6">
              <p>
                INACTIVO:
                <input type="radio" class="flat" name="estado" id="estado" value="0" />
              </p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
            <button type="submit" class="btn btn-primary id"><span class="fa fa-refresh"></span> Guardar</button>
          </div>
        </form>
      </div>


    </div>
  </div>
</div>
