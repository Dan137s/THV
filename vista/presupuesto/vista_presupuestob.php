<script type="text/javascript" src="../js/reparacion3.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">[PROPUESTA Y ESTADO] TRATO HECHO VECINO</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
              <!-- /.box-tools -->
        </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="input-group">
                        <input type="text" class="global_filter form-control" id="global_filter" placeholder="Ingresar dato a buscar">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </div>
                <div class="col-lg-2" hidden>
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                </div>
            </div>
            <table id="tabla_reparacion" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        
                        <th>Reparacion</th>
                        <th>Herramienta</th>
                        <th>Material Vecino</th>
                        <th>Fecha Registro</th>
                        <th>Estado</th>
                        <th>Acción</th>
                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        
                        <th>Reparacion</th>
                        <th>Herramienta</th>
                        <th>Material Vecino</th>
                        <th>Fecha Registro</th>
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




<!--Modal registro-->
<div class="modal fade" id="modal_registro" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Diagnóstico Reparaciones & Cotizacion</b></h4>
            </div>
            <div class="modal-body">

                <div class="col-lg-12">
                    <label for="">Elemento</label>
                    <input type="text" class="form-control" id="txt_reparacion" placeholder="Ingrese Reparacion" ><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Descripcion del elemento</label>
                    
                    <p> <textarea class="form-control" id="txt_descripcion_reparacion" placeholder="Ingrese Descripcion de Reparacion"></textarea></p><br> 

                    
                </div>

                <div class="col-lg-12">
                    <label for="">Nivel</label>
                    <select class="js-example-basic-single" name="state" id="txt_nivel" style="width:100%;">
                        <option value="">--</option>
                        <option value="Trabajos 1 Día">1</option>
                        <option value="Trabajos 1/2 Día">2</option>
                        <option value="Trabajos Inmediatos o minimos">3</option>
                      
                    </select><br><br>
                </div>
 
                <div class="col-lg-12">
                    <label for="">Cantidad de personas</label>
                    <input type="number" class="form-control" min="1" max="5"  id="txt_c_personas" placeholder="Ingrese cantidad de personas" onkeypress="return soloNumeros(event)"><br>
                </div>
                
                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single" name="state" id="txt_estatus" style="width:100%;">
                        <option value="">--</option>
                        <option value="ACEPTADO">ACEPTADO</option>
                        <option value="INACTIVO">INACTIVO</option>
                    </select><br><br>
                </div>
             

            </div>
           
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Reparacion()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
</div>

<!--Modal Editar registro-->
<div class="modal fade" id="modal_editar" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
           

            <div class="modal-header" style="text-align:center;" > 
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Propuesta Trato Hecho Vecino</b></h4>
            </div>

            
            <div class="modal-body">

           
            <div class="col-lg-12">
            <label for="">N° Ticket</label>
            <input type="text" id="id_reparacion" disabled > <br><br>

            
            <div class="col-lg-12">
                    <label for="">Estado</label>
                    <select class="js-example-basic-single" name="state" id="txt_estatus_editar" style="width:100%;"  >
                    <option value="">--</option>
                        <option value="ACEPTADO">ACEPTADO</option>
                        <option value="ENTRAMITE">ENTRAMITE</option>
                        <option value="RECHAZADO">RECHAZADO</option>
                    </select><br><br>
                </div>
            
            <div class="col-lg-12">
                    <label for="">Insumos y herramientas </label>
                    <p> <textarea class="form-control" id="txt_insu_herra_editar" placeholder="Ingrese insumos y herramienta de parte de trato hecho vecino"></textarea></p>   
            </div>
            
            <div class="col-lg-12">
                    <label for="">R. materiales a vecino</label>
                    <p> <textarea class="form-control" id="txt_req_veci_editar" placeholder="Ingrese insumos y herramienta de parte de trato hecho vecino"></textarea></p>   
            </div>
           
            
            <div class="modal-header" style="text-align:center;">
            <h4 class="modal-title"><b>Presupuesto reparación</b></h4>
            </div>

            </div>


             <div class="col-lg-12">
                    
                    <label for="">Nombre</label>
                    <input type="text"  id="txt_reparacion_actual_editar" placeholder="Ingrese Reparacion" onkeypress="return soloLetras(event)" hidden><br>
                    <input type="text" class="form-control" id="txt_reparacion_nueva_editar" placeholder="Ingrese Reparacion" onkeypress="return soloLetras(event)" disabled ><br>
                </div>

                
              

                <div class="col-lg-12">
                    <label for="">Descripcion del elemento</label>
                    <p> <textarea class="form-control" id="txt_descripcion_editar" placeholder="Ingrese Descripcion de Reparacion" disabled ></textarea></p>   
                </div>

                <div class="col-lg-12">
                    <label for="">Nivel</label>
                    <select class="js-example-basic-single" name="state" id="txt_nivel_editar" style="width:100%;" disabled >
                        <option value="">--</option>
                        <option value="Trabajos 1 Día">1</option>
                        <option value="Trabajos 1/2 Día">2</option>
                        <option value="Trabajos Inmediatos o minimos">3</option>
                      
                    </select><br><br>
                </div>
 
                <div class="col-lg-12" >
                    <label for="">Cantidad de personas</label>
                    <input type="number" class="form-control" min="1" max="5"  id="txt_c_personas_editar" placeholder="Ingrese cantidad de personas" onkeypress="return soloNumeros(event)" disabled ><br>
                </div>

              
                <br><br>
            <p> 
                <hr width=800>
                
            <p>
                      


            </div>
            <div class="modal-footer" >
                <button class="btn btn-success" onclick="Editar_Reparacion()"><i class="fa fa-check"><b>&nbsp;Aceptar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
</div>


<script>
$(document).ready(function() {
    listar_reparacion();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_reparacion").focus();  
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
</script>