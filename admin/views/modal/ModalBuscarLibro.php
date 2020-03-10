<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <legend><i class="fa fa-book fa-sm"></i> Información libro</legend><h4></h4>
        
      </div>
      <div class="modal-body">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
          <div class="card-box table-responsive">
            <table id="datatable" class="table table-striped jambo_table bulk_action" style="width:100%">
              <thead>
                <tr class="headings">
                  <th  class="th-sm">Código</th>
                  <th  class="th-sm">Libro</th>
                  <th>Precio</th>
                  <th class="text-center" style="width: 36px;">Agregar</th>
                </tr>
              </thead>
              <tbody id="datos"></tbody>
            </table>
          </div>  
          <div class="outer_div" ></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
      </div>

    </div>
  </div>
</div>