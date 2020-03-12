<div class="modal fade" id="tablaUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <legend><i class="fa fa-user fa-sm"></i> Información colportor</legend><h4></h4>
        
      </div>
      <div class="modal-body">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
          <div class="card-box table-responsive">
              <table id="datatable1" class="table table-striped jambo_table bulk_action" style="width:100%">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombres y apellidos</th>
                      <th>Usuario</th>
                      <th>Rol</th>
                      <th style="width: 10%">OP</th>
                    </tr>
                  </thead>
                <tbody id="data"></tbody>
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