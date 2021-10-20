<script type="text/javascript" src="../js/requerimiento.js?rev=<?php echo time();?>"></script>
<style>
      .galeria{
        display: flex;
        width: 100px;
        height: 100px;
        border-radius: 10px;
        box-shadow: 0 0 8px rgba(0,0,0,0.2);
        opacity: 85%;
    }
</style>
<div class="col-md-12">
    
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">[REPORTES DE REQUERIMIENTOS]</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
              <!-- /.box-tools -->
        </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input type="text" class="global_filter form-control" id="global_filter" placeholder="Ingresar dato a buscar">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistros()"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                    </div>
                
            </div>
            <table id="tabla_requerimiento" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>N° Reporte</th>
                        <th>N° Presupuesto</th>
                        <th>Nombre vecino</th>
                        <th>Dirección</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>N° Reporte</th>
                        <th>N° Presupuesto</th>
                        <th>Nombre vecino</th>
                        <th>Dirección</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.box-body -->
    </div>
          <!-- /.box -->
</div>
<form autocomplete="false" onsubmit="return false"  id="form_requerimiento_registro" enctype="multipart/form-data">
    <div class="modal fade" id="modal_requerimiento_registro" role="dialog" >
        <div class="modal-dialog modal-sm" style="width: 75%;">
        <div class="modal-content" style="width: 100%;align-items: center;">
            <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Registre Requerimiento</b></h4>
            </div>
            <div class="modal-body" >
            
            <table border="1">
  <caption></caption>
  <tbody >
    <tr>
      <td>
      	<div class="col-lg-12">
                    <label for="">Plano ubicación</label>
                    <input type="file" onchange="loadFile(event)" accept=" image/jpeg, image/png" class="form-control"  id="file_planos" name="datoplano" placeholder="Ingrese numero de Reporte" >
        </div>
      </td>
      <td><div class="col-lg-12">
                    <label for="">RUT vecino</label>
                    <input name="vesino" type="text" class="form-control" id="txt_rut_vesino" placeholder="Ingresar RUT del vecino"><br>
                </div></td>
      <td><div class="col-lg-12">
                    <label for="">observación</label>
                    <input name="observar" type="text" class="form-control" id="txt_observacion_vesino" placeholder="observación del trabajo"><br>
                </div></td>
      
      <td><div class="col-lg-12">
                    <label for="">Fono</label>
                    <input name="observar" type="text" class="form-control" id="txt_fono_vesino" placeholder="Telefono del vesino"><br>
                </div></td>
      
      <td><div class="col-lg-12">
                    <label for="">Fecha de ejecución</label>
                    <input name="fechaejecucion" type="date" class="form-control" id="txt_fecha_ejecucion" placeholder="Ingrese la dirección"><br>
                </div></td>
    </tr>
    <tr>
      <td>
          <img id="imgSalida" class="galeria" />
    </td>
      <td><div class="col-lg-12">
                    <label for="">Vista orientativa</label>
                    <input type="file" onchange="loadFile2(event)" id="file_orientativa" name='file_orientativa' accept=" image/jpeg, image/png" class="form-control" placeholder="Ingrese numero de Reporte" >
        </div></td>
      <td><img id="galeria_orientatica" class="galeria" /></td>
      <td></td>
      
      <td><div class="col-lg-12">
                    <label for="">Trabajador</label>
                    <input name="trabajador" type="text" class="form-control" id="txt_travajador" placeholder="Ingrese nombre trabajador"><br>
                </div></td>
    </tr>
    <tr>
      <td><div class="col-lg-12">
                    <label for="">Vista general</label>
                    <input type="file"onchange="loadFile3(event)" name='datogeneral'id="file_general" accept=" image/jpeg, image/png" class="form-control"  placeholder="Ingrese numero de Reporte" >
        </div></td>
      <td><div class="col-lg-12">
                    <label for="">Vista daño</label>
                    <input type="file" onchange="loadFile4(event)" name='datodaño' accept=" image/jpeg, image/png" class="form-control"  id="file_daño">
        </div></td>
      <td><img id="galeria_daño" class="galeria" /></td>
      <td><div class="col-lg-12">
                    <label for="">Dirección</label>
                    <input name="direccion" type="text" class="form-control" id="txt_direccion_vecino" placeholder="Ingrese la dirección"><br>
                </div></td>
      
      <td><div class="col-lg-12">
                    <label for="">voluntario</label>
                    <input name="voluntario" type="text" class="form-control" id="txt_voluntario" placeholder="Ingrese nombre voluntario"><br>
                </div></td>
    </tr>
    <tr>
      <td><img id="galeris_general" class="galeria" /></td>
      <td><div class="encuesta_detalle">
                    <input type="text" id="txt_p7" hidden>
                    <label for="">Diagnóstico</label><br>
                    <textarea  id="txt_diagnostico" name="diagnostico" class="form-control-detalle-area" form="form-requerimiento-detalle" placeholder="diagnóstico" style="margin: 0px; width: 331px; height: 76px;"></textarea>
                </div></td>
      <td></td>
      <td></td>
      
      <td><div class="col-lg-12">
                    <label for="">Monto</label>
                    <input name="monto" type="text" class="form-control" id="txt_monto" placeholder="Ingrese Monto"><br>
                </div></td>
    </tr>
    <tr>
      <td></td>
      <td><div class="encuesta_detalle">
                    <input type="text" id="txt_p7" hidden>
                    <label for="">Propuesta THV</label><br>
                    <textarea name="propuesta" id="txt_propuesta" name="detalles" class="form-control-detalle-area" form="form-requerimiento-detalle" placeholder="Propuesta thv"style="margin: 0px; width: 331px; height: 76px;"></textarea>
                </div></td>
      <td></td>
      <td><div class="col-lg-12">
                    <label for="">Recepción de trabajo</label>
                    <input type="file"onchange="loadFile5(event)" name='datofirma' accept=" image/jpeg, image/png" class="form-control"  id="file_firma" placeholder="Ingrese numero de Reporte" >
        </div></td>
      
      <td><img id="galeria_recepcion" class="galeria" /></td>
    </tr>
    
  </tbody>
</table>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="registrarRequerimiento()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>
</form>

<form autocomplete="false" onsubmit="return false"  id="form-requerimiento-detalle" enctype="multipart/form-data">
    <div class="modal fade" id="modal_edit" role="dialog" >
        <div class="modal-dialog modal-sm" style="width: 75%;">
        <div class="modal-content" style="width: 100%;align-items: center;">
            <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Registre Requerimiento</b></h4>
            </div>
            <div class="modal-body" >
            
            <table border="1">
  <caption></caption>
  <tbody >
    <tr>
      <td>
      	<div class="col-lg-12">
                    <label for="">Plano ubicación</label>
                    <input type="file" onchange="loadFile(event)" accept=" image/jpeg, image/png" class="form-control"  id="file_planos_edit" name="files_planos" placeholder="Ingrese numero de Reporte" >
        </div>
      </td>
      <td><div class="col-lg-12">
                    <label for="">RUT vecino</label>
                    <input type="text" class="form-control" id="txt_rut_vesino_edit" placeholder="Ingresar RUT del vecino"><br>
                </div></td>
      <td><div class="col-lg-12">
                    <label for="">observación</label>
                    <input type="text" class="form-control" id="txt_observacion_vesino_edit" placeholder="observación del trabajo"><br>
                </div></td>
      
      <td><div class="col-lg-12">
                    <label for="">Fono</label>
                    <input type="text" class="form-control" id="txt_fono_vesino_edit" placeholder="Telefono del vesino"><br>
                </div></td>
      
      <td><div class="col-lg-12">
                    <label for="">Fecha de ejecución</label>
                    <input type="date" class="form-control" id="txt_fecha_ejecucion_edit" placeholder="Ingrese la dirección"><br>
                </div></td>
    </tr>
    <tr>
      <td>
          <img id="imgSalida" class="galeria" />
    </td>
      <td><div class="col-lg-12">
                    <label for="">Vista orientativa</label>
                    <input type="file" onchange="loadFile2(event)" name='imagen' accept=" image/jpeg, image/png" class="form-control"  id="file_orientativa_edit" placeholder="Ingrese numero de Reporte" >
        </div></td>
      <td><img id="galeria_orientatica" class="galeria" /></td>
      <td></td>
      
      <td><div class="col-lg-12">
                    <label for="">Trabajador</label>
                    <input type="text" class="form-control" id="txt_travajador_edit" placeholder="Ingrese nombre trabajador"><br>
                </div></td>
    </tr>
    <tr>
      <td><div class="col-lg-12">
                    <label for="">Vista general</label>
                    <input type="file"onchange="loadFile3(event)" name='imagen' accept=" image/jpeg, image/png" class="form-control"  id="file_general_edit" placeholder="Ingrese numero de Reporte" >
        </div></td>
      <td><div class="col-lg-12">
                    <label for="">Vista daño</label>
                    <input type="file"onchange="loadFile4(event)" accept=" image/jpeg, image/png" class="form-control"  id="file_daño_edit">
        </div></td>
      <td><img id="galeria_daño" class="galeria" /></td>
      <td><div class="col-lg-12">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="txt_direccion_vecino_edit" placeholder="Ingrese la dirección"><br>
                </div></td>
      
      <td><div class="col-lg-12">
                    <label for="">voluntario</label>
                    <input type="text" class="form-control" id="txt_voluntario_edit" placeholder="Ingrese nombre voluntario"><br>
                </div></td>
    </tr>
    <tr>
      <td><img id="galeris_general" class="galeria" /></td>
      <td><div class="encuesta_detalle">
                    <input type="text" id="txt_p7" hidden>
                    <label for="">Diagnóstico</label><br>
                    <textarea id="txt_diagnostico_edit" name="detalles" class="form-control-detalle-area" form="form-requerimiento-detalle" placeholder="diagnóstico" style="margin: 0px; width: 331px; height: 76px;"></textarea>
                </div></td>
      <td></td>
      <td></td>
      
      <td><div class="col-lg-12">
                    <label for="">Monto</label>
                    <input type="text" class="form-control" id="txt_monto_edit" placeholder="Ingrese Monto"><br>
                </div></td>
    </tr>
    <tr>
      <td></td>
      <td><div class="encuesta_detalle">
                    <input type="text" id="txt_p7" hidden>
                    <label for="">Propuesta THV</label><br>
                    <textarea id="txt_propuesta_edit" name="detalles" class="form-control-detalle-area" form="form-requerimiento-detalle" placeholder="Propuesta thv"style="margin: 0px; width: 331px; height: 76px;"></textarea>
                </div></td>
      <td></td>
      <td><div class="col-lg-12">
                    <label for="">Recepción de trabajo</label>
                    <input type="file"onchange="loadFile5(event)" name='imagen' accept=" image/jpeg, image/png" class="form-control"  id="file_firma_edit" placeholder="Ingrese numero de Reporte" >
        </div></td>
      
      <td><img id="galeria_recepcion" class="galeria" /></td>
    </tr>
    
  </tbody>
</table>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="registrarRequerimiento()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>
</form>


<script>
$(document).ready(function() {
    listar_requerimiento();
    $('.js-example-basic-single').select2();
    listar_combo_rol();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_usu").focus();  
    })
    
} );
$('.box').boxWidget({
    animationSpeed  : 500,
    collapseTrigger : '[data-widget="collapse"]',
    removeTrigger   : '[data-widget="remove"]',
    collapseIcon    : 'fa-minus',
    expandIcon      : 'fa-plus',
    removeIcon      : 'fa-times'
})

var loadFile = function(event) {
    var output = document.getElementById('imgSalida');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  var loadFile2 = function(event) {
    var output = document.getElementById('galeria_orientatica');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  var loadFile3 = function(event) {
    var output = document.getElementById('galeris_general');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  var loadFile4 = function(event) {
    var output = document.getElementById('galeria_daño');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  var loadFile5 = function(event) {
    var output = document.getElementById('galeria_recepcion');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };



</script>