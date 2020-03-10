
<div class="modal fade" id="NuevoColportor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Registrar colportor</h4>
      </div>
      <div class="modal-body">
        <div id="mensaje"></div>
        <form data-form="save" action="<?php echo SERVERURL;?>admin/ajax/colportorAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <label for="dni">Dni * :</label>
              <input class="form-control" type="number" autofocus="" class='number' name="dni-reg" required='required' placeholder="Ingrese tu DNI">
            
              <label for="nombres">Nombres * :</label>
              <input class="form-control" type="text"  name="nombres-reg" required="required" placeholder="Ingrese tus dos nombres" />

              <label for="apellidos">Apellidos * :</label>
              <input class="form-control" type="text" name="apellidos-reg" required="required" placeholder="Ingrese tus dos apellidos" />

              <label for="direccion">Dirección * :</label>
              <input class="form-control" type="text"  name="direccion-reg" required="required" placeholder="Ingrese la dirección" />

              <label for="email">Email * :</label>
              <input type="email" class="form-control" name="email-reg"  class='email' required="required" placeholder="Ingrese tu email" />

              <label>Genero *:</label>
              <p>
              Masculino:
              <input type="radio" class="flat" name="genero-reg"  value="Masculino" checked="" required />
              Femenino:
              <input type="radio" class="flat" name="genero-reg"  value="Femenino" />
              </p>
            </div>
            <div class="col-md-6 col-sm-6">
              <label for="celular">Celular * :</label>
              <input class="form-control" type="tel" class='tel' name="cell-reg"  required='required' data-validate-length-range="10" placeholder="Ingrese tu número de celular " />

              <label for="pais">País *:</label>
              <select class="form-control" name="pais-reg" id="seleccionar-pais" required="">
                <option value="0">Seleccionar país</option>
                  <?php foreach ($listarPais as $p): ?>
                <option value="<?php echo $p['id_pais']?>"><?php echo $p['NombrePais']?></option>
                <?php endforeach; ?>
              </select>
              <div class="ocultar">        
              <label for="provincia">Provincia * :</label>
              <select class="form-control" id="seleccionar-provincia" name="provincia-reg">
               <option value="" ></option>
              </select>

              <label for="ciudad">Ciudad * :</label>
              <select class="form-control" id="seleccionar-ciudad" name="ciudad-reg">
                <option value="" ></option>
              </select>

              <label for="mision">Misión * :</label>
              <select class="form-control" name="mision-reg" >
                <option value="" >Seleccionar misión</option>
                  <?php foreach ($listarMision as $m): ?>
                <option value="<?php echo $m['id_mision']?>"><?php echo $m['NombreMision']?></option>
                <?php endforeach; ?>
              </select>

              </div>
            </div>
          </div>
          <br/>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="btnEditar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class='glyphicon glyphicon-edit'></i> Editar colportor</h4>
      </div>
      <div class="modal-body">
        <div id="mensaje"></div>
        <form data-form="save" action="<?php echo SERVERURL;?>admin/ajax/colportorAjax.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <label for="dni">Dni * :</label>
              <input type="text" name="codigo-up" id="codigo-up">
              <input class="form-control" type="number" autofocus="" class='number' name="dni-up" id="dni-up" required='required' placeholder="Ingrese tu DNI">
            
              <label for="nombres">Nombres * :</label>
              <input class="form-control" type="text"  name="nombres-up" id="nombres-up" required="required" placeholder="Ingrese tus dos nombres" />

              <label for="apellidos">Apellidos * :</label>
              <input class="form-control" type="text" name="apellidos-up" id="apellidos-up" required="required" placeholder="Ingrese tus dos apellidos" />

              <label for="direccion">Dirección * :</label>
              <input class="form-control" type="text"  name="direccion-up" id="direccion-up" required="required" placeholder="Ingrese la dirección" />

              <label for="email">Email * :</label>
              <input type="email" class="form-control" name="email-up" id="email-up" class='email' required="required" placeholder="Ingrese tu email" />

              <label>Genero *:</label>
              <p>
              Masculino:
              <input type="radio" class="flat" name="genero-reg"  value="Masculino" checked="" required />
              Femenino:
              <input type="radio" class="flat" name="genero-reg"  value="Femenino" />
              </p>
            </div>
            <div class="col-md-6 col-sm-6">
              <label for="celular">Celular * :</label>
              <input class="form-control" type="tel" class='tel' name="cell-up"  id="cell-up" required='required' data-validate-length-range="10" placeholder="Ingrese tu número de celular " />

              <label for="pais">País *:</label>
              <select class="form-control" name="pais-up" id="seleccionar-pais-up" required="">
                <option value="0">Seleccionar país</option>
                  <?php foreach ($listarPais1 as $p): ?>
                <option value="<?php echo $p['id_pais']?>"><?php echo $p['NombrePais']?></option>
                <?php endforeach; ?>
              </select>
              <div  class="ocultar">        
              <label for="provincia">Provincia * :</label>
              <select class="form-control" id="seleccionar-provincia-up" name="provincia-up" required="">
               
              </select>

              <label for="ciudad">Ciudad * :</label>
              <select class="form-control" id="seleccionar-ciudad-up" name="ciudad-up" required="">
              </select>

              <label for="mision">Misión * :</label>
              <select class="form-control" name="mision-up" id="mision-up" required="">
                <option value="0">Seleccionar misión</option>
                  <?php foreach ($listarMision as $m): ?>
                <option value="<?php echo $m['id']?>"><?php echo $m['NombreMision']?></option>
                <?php endforeach; ?>
              </select>
             </div> 
               <label>Estado *:</label>
                  <p>
                    Activo:
                    <input type="radio" class="flat" name="estado" id="editEstado1" value="1" checked="" required />
                    Desactivado:
                    <input type="radio" class="flat" name="estado" id="editEstado0" value="0" />
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
<div class="modal fade" id="btnEliminar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">Eliminar Persona</h4>
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
<div class="modal fade" id="verDetalle"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="x_panel">
        <div class="x_title ">
          <h2>Información General</h2>
          <div class="clearfix"></div>
        </div>
          <div class="x_content">
            <section class="content invoice">
              <!-- title row -->
              <div class="row">
                <div class="invoice-header">
                  <h1>
                    <i class="fa fa-user"></i>
                     <small class="pull-right" id="fullname"></small>
                </h1>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <div id="resultado1">
                    
                  </div>
                 
                </div>
                
                <div class="col-sm-4 invoice-col">
                  <div id="resultado2">
                    
                  </div>
                 
                </div>
                <div class="col-sm-4 invoice-col">
                  <div id="resultado3">
                    
                  </div>
                </div>

              </div>
              <!-- /.row -->      
            </section>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary"  data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
