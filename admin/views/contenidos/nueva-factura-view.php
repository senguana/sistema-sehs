<?php include_once 'views/modal/ModalBuscarColportor.php'; ?>
<?php include_once 'views/modal/ModalBuscarLibro.php'; ?>

<?php 
 require_once './controllers/ControladorLibro.php';
 $insLibro = new ControladorLibro();
 ?>
  <?php 
 if ( $_SESSION['cuenta_tipo_sehs']>=3) {
   echo $lc->forzar_cerrar_sesion_controlador();
 }
 ?>
 
<div class="right_col" role="main">
    <div class="">      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class='glyphicon glyphicon-edit'></i> Nuevo pedido</h2>
              <div class="text-right mtop20">
                <a href="<?php echo SERVERURL; ?>admin/facturas" class="btn btn-sm btn-info"><i class="fa fa-angle-double-left"></i> Atrás</a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">

              <div class="col-md-12 col-sm-12">
                <form action="ajax/nueva_facturaAjax.php" method="POST" id="NuevoFacturaAjax" autocomplete="off">
                  <div class="form-group row">
                    <label class="control-label col-md-2 col-sm-2 text-right">Colportor:</label>
                    <div class="col-md-7 col-sm-7">
                      <input type="text" class="form-control  " id="nombres" placeholder="Nombre del cliente y el apellido" readonly="">
                       <input type="text" hidden="" name="codigo_colportor" id="codigo_colportor">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-primary tablaColport">
                        <span class="glyphicon glyphicon-search" ></span> Buscar</button>
                        <span id="loader"></span>
                    </div>
                  </div>
                  <hr>    
                  <ul class="stats-overview">
                    <li>
                      <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 ">DNI:</label>
                  
                          <div class="col-md-9 col-sm-9 ">
                            <input type="search" name="nombre_colportor" id="dni" class="form-control input-sm" value="" placeholder="DNI" readonly="">
                           
                          </div>
                      
                      </div>
                      <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 ">Encargado:</label>
                          <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="encargado" class="form-control" value="<?php echo $Nombre[0] . " " .$Apellido[0]; ?>" readonly>
                            <input type="text" name="codigo_cuenta" hidden="" value="<?php echo  $_SESSION['codigo_cuenta_sehs'];?>">
                          </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 ">Celular:</label>
                          <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" id="celular" placeholder="Celular" disabled="">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 ">Fecha:</label>
                          <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
                          </div>
                      </div>
                    </li>
                    <li class="hidden-phone">
                      <div class="form-group row">
                          <label class="control-label col-md-3 col-sm-3 ">Email:</label>
                          <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" id="email" placeholder="Email" disabled="">
                          </div>
                      </div>
                    </li>
                  </ul>

                  <table class="table" id="productTable">
                    <thead>
                      <tr>              
                        <th style="width:40%;">Libro</th>
                        <th style="width:20%;">Precio</th>
                        <th style="width:15%;">Cantidad</th>              
                        <th style="width:15%;">Total</th>             
                        <th style="width:10%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $arrayNumber = 0;
                      for($x = 1; $x < 2; $x++) { ?>
                        <tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">                
                          <td style="margin-left:20px;">
                            <div class="form-group">
                              <select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
                                <option value="">-- Selecciona --</option>
                                <?php
                                  while($row = $selectLibro->fetch()) {                     
                                    echo "<option value='".$row['idLibro']."' id='changeProduct".$row['idLibro']."'>".$row['nombreLibro']."</option>";
                                  } // /while 

                                ?>
                              </select>
                              </div>
                          </td>
                          <td style="padding-left:20px;">                 
                            <input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" />                  
                            <input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />                  
                          </td>
                          <td style="padding-left:20px;">
                            <div class="form-group">
                            <input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
                            </div>
                          </td>
                          <td style="padding-left:20px;">                 
                            <input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />                  
                            <input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />                  
                          </td>
                          <td>

                            <button class="btn btn-danger btn-sm removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
                          </td>
                        </tr>
                      <?php
                      $arrayNumber++;
                      } // /for
                      ?>
                    </tbody>          
                  </table>
                  <label class="col-form-label col-md-2 col-sm-2 ">Sub total</label>
                  <div class="col-md-4 col-sm-4  form-group has-feedback">
                    <input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" />
                    <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
                  </div>
                  <label class="col-form-label col-md-2 col-sm-2 ">Monto pagado</label>
                  <div class="col-md-4 col-sm-4  form-group has-feedback">
                    <input type="text" class="form-control" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" />
                  </div>
                  <label class="col-form-label col-md-2 col-sm-2 ">Diezmo 10</label>
                  <div class="col-md-4 col-sm-4  form-group has-feedback">
                    <input type="text" class="form-control" id="vat" name="vat" disabled="true" />
                    <input type="hidden" class="form-control" id="vatValue" name="vatValue" />
                  </div>
                  <label class="col-form-label col-md-2 col-sm-2 ">Saldo</label>
                  <div class="col-md-4 col-sm-4  form-group has-feedback">
                    <input type="text" class="form-control" id="due" name="due" disabled="true" />
                    <input type="hidden" class="form-control" id="dueValue" name="dueValue" />   
                  </div>
                  <label class="col-form-label col-md-2 col-sm-2 ">Total neto</label>
                  <div class="col-md-4 col-sm-4  form-group has-feedback">
                     <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true"/>
                     <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
                  </div>
                  <label class="col-form-label col-md-2 col-sm-2 ">Método de pago</label>
                  <div class="col-md-4 col-sm-4  form-group has-feedback">
                    <select class="form-control" name="paymentType" id="paymentType">
                      <option value="">-- Selecciona --</option>
                      <option value="1">Cheque</option>
                      <option value="2">Efectivo</option>
                      <option value="3">Tarjeta de crédito</option>
                    </select>
              
                  </div> 
                  <label class="col-form-label col-md-2 col-sm-2 ">Descuento</label>
                  <div class="col-md-4 col-sm-4  form-group has-feedback">
                    <input type="text" class="form-control" id="discount" name="discount" onkeyup="discountFunc()" autocomplete="off" />
                  </div>
                  <label class="col-form-label col-md-2 col-sm-2 ">Estado</label>
                  <div class="col-md-4 col-sm-4  form-group has-feedback">
                    <select class="form-control" name="paymentStatus" id="paymentStatus">
                      <option value="">-- Selecciona --</option>
                      <option value="1">Pago completo</option>
                      <option value="2">Pago por adelantado</option>
                      <option value="3">No pagado</option>
                    </select>
              
                  </div>  
                  <label class="col-form-label col-md-2 col-sm-2 ">Total</label>
                  <div class="col-md-4 col-sm-4  form-group has-feedback">
                    <input type="text" class="form-control" id="grandTotal" name="grandTotal" disabled="true" />
                    <input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" />
                  </div>
                                  
                  <div class="form-group submitButtonFooter">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-info btn-sm" onclick="addRow()" id="addRowBtn" data-loading-text="Cargando..."> <i class="glyphicon glyphicon-plus-sign"></i> Añadir fila </button>

                      <button type="submit" id="createOrderBtn" data-loading-text="Cargando..." class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
                      <button type="submit" class="btn btn-primary btn-sm">
                            <span class="glyphicon glyphicon-print"></span> Imprimir
                          </button> 
                      <button type="reset" class="btn btn-warning btn-sm" onclick="resetOrderForm()"><i class="fa fa-eraser"></i> Reiniciar</button>
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
<script src="assets/js/sehs/nueva_factura.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="assets/js/sehs/validacion_nueva_factura.js" type="text/javascript" charset="utf-8" async defer></script>