<div class="modal fade" id="NuevoLibro"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo libro</h4>
        <button type="button" class="close" data-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form data-form="save" action="<?php echo SERVERURL;?>admin/ajax/libroAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8">
              <textarea class="form-control" name="nombre_libro-reg" placeholder="Nombre del Libro" required maxlength="255" ></textarea>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="estado-up">Estado<span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 ">
              <select class="form-control"  name="estado-reg" required>
              <option value="">-- Selecciona estado --</option>
              <option value="1" selected>Activo</option>
              <option value="0">Inactivo</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"> Precio <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 ">
              <input type="text" class="form-control" name="precio-reg" placeholder="Precio de venta del Libro" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
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

<div class="modal fade" id="EditarLibro"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class='glyphicon glyphicon-edit'></i> Editar Libro</h4>
        <button type="button" class="close" data-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form data-form="update" action="<?php echo SERVERURL;?>admin/ajax/libroAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8">
             <input type="text" hidden="" name="codigo_libro-up" id="codigo_libro-up" value="">
              <textarea class="form-control" id="nombre_libro-up" name="nombre_libro-up" placeholder="Nombre del Libro" required maxlength="255" ></textarea>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="estado-up">Estado<span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 ">
              <select class="form-control" id="estado-up" name="estado-up" required>
              <option value="">-- Selecciona estado --</option>
              <option value="1" selected>Activo</option>
              <option value="0">Inactivo</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"> Precio <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 ">
              <input type="text" class="form-control" id="precio-up" name="precio-up" placeholder="Precio de venta del Libro" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            <button type="submit" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-save"></i> Actualizar datos</button>
          </div>          
        </form>
      </div>
    </div>
  </div>
</div>