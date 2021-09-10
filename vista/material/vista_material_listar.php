<script type="text/javascript" src="../js/material.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">[MATERIALES-REGISTRADOS] EN SISTEMA</h3>

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
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                </div>
            </div>
            <table id="tabla_material" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Fecha Registro</th>
                        <th>Estatus</th>
                        <th>Acción</th>
                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Fecha Registro</th>
                        <th>Estatus</th>
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
            <h4 class="modal-title"><b>Registro De Herramienta</b></h4>
            </div>
            <div class="modal-body">

                <div class="col-lg-12">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="txt_material" placeholder="Ingrese Material"><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="txt_material" placeholder="Ingrese Material"><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Descripcion</label>
                    <input type="text" class="form-control" id="txt_descripcion" placeholder="Descripcion"><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single" name="state" id="txt_estatus" style="width:100%;">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                    </select><br><br>
                </div>

                

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registro_Herramienta()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
</div>

<!--Modal Editar registro-->
<div class="modal fade" id="modal_editar_herramienta" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Editar Herramienta</b></h4>
            </div>
            <div class="modal-body">

            
                <div class="col-lg-12">
                <input type="text" id="txt_id_herramienta" hidden>
                    <label for="">herramienta serial</label>
                    <input type="text" class="form-control" id="txt_serial_editar" placeholder="Numero Serial" ><br>
                </div>

        <!--

                <div class="col-lg-12">
                    <label for="">Tipo de herramienta</label>
                    <select class="js-example-basic-single" name="state" id="txt_tipo_editar" style="width:100%;">
                    <option value="">--</option>    
                    <option value="Eléctric@">Eléctric@</option>
                    <option value="Manual">Manual</option>
                    <option value="Otros">Otros</option>
                    </select><br><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Marca herramienta</label>
                    <input type="text" class="form-control" id="txt_marca_editar" placeholder="Marca Herramienta"><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Modelo herramienta</label>
                    <input type="text" class="form-control" id="txt_modelo_editar" placeholder="Modelo Herramienta"><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Descripción herramienta</label>
                    <input type="text" class="form-control" id="txt_descripcion_editar" placeholder="Descripción Herramienta"><br>
                </div>
-->
                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single" name="state" id="txt_estatus_editar" style="width:100%;">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                    </select><br><br>
                </div>

                

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Modificar_Herramienta()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
</div>


<script>
$(document).ready(function() {
    listar_material();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_serial").focus();  
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
