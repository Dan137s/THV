<script type="text/javascript" src="../js/herramienta.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">[HERRAMIENTAS-REGISTRADAS] EN SISTEMA</h3>

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
            <table id="tabla_herramienta" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>N°</th>
                        <th>Tipo</th>
                        <th>Serial</th>
                        <th>Fecha Registro</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Acción</th>
                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>N°</th>
                        <th>Tipo</th>
                        <th>Serial</th>
                        <th>Fecha Registro</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Descripcion</th>
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

<div class="modal fade" id="modal_registro" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Registro De Herramienta</b></h4>
            </div>
            <div class="modal-body">

            <div class="col-lg-12">
                    <label for="">herramienta serial</label>
                    <input type="text" class="form-control" id="txt_serial" placeholder="Numero Serial"><br>
                </div>

            <div class="col-lg-12">
                    <label for="">Tipo herramienta</label>
                    <input type="text" class="form-control" id="txt_tipo" placeholder="Tipo Herramienta"><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Marca herramienta</label>
                    <input type="text" class="form-control" id="txt_marca" placeholder="Marca Herramienta"><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Modelo herramienta</label>
                    <input type="text" class="form-control" id="txt_modelo" placeholder="Modelo Herramienta"><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Descripción herramienta</label>
                    <input type="text" class="form-control" id="txt_descripcion" placeholder="Descripción Herramienta"><br>
                </div>


                

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registro_Herramienta()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
</div>


<script>
$(document).ready(function() {
    listar_herramienta();
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

