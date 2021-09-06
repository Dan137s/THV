<script type="text/javascript" src="../js/hospederia.js?rev=<?php echo time();?>"></script>
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
            <table id="tabla_hospederia" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Acción</th>
                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Fecha</th>
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
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_registro" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Registro de herramienta</b></h4>
            </div>

             
            <div class="col-lg-12">
                    <label for="">Seleccione</label>
                    <select class="js-example-basic-single" name="tipo_herramienta" id="cbm_tipo_herramienta" style="width:100%;">
                    </select><br><br>
                </div>

            <div class="modal-body">
                <div class="col-lg-12">
                    <label for="">Marca de herramienta</label>
                    <input type="text" class="form-control" id="txt_marca" placeholder="Marca de herramienta"><br>
                </div>
            
                <div class="col-lg-12">
                    <label for="">Modelo</label>
                    <input type="text" class="form-control" id="txt_modelo" placeholder="Modelo de herramienta"><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Cantidad</label>
                    <input type="number" class="form-control" id="txt_cantidad" placeholder="Cantidad"><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Descripción</label>
                    <input type="text" class="form-control" id="txt_descripcion" placeholder="Descripción de herramienta"><br>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Usuario()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>
</form>
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_editar" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Editar Usuario</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <input type="text" id="txtidusuario" hidden>
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" id="txtusu_editar" placeholder="Ingrese usuario" disabled><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="txt_alias_editar" placeholder="Nombre Usuario"><br>
                </div>
           
                <div class="col-lg-12">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="txt_email_editar" placeholder="Ingrese Correo">
                    <label for="" id="emailOK_editar" style="color:red;"></label>
                    <input type="text" id="validar_email_editar" hidden>
                </div>

                <div class="col-lg-12">
                    <label for="">Sexo</label>
                    <select class="js-example-basic-single" name="state" id="cbm_sexo_editar" style="width:100%;">
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select><br><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Rol</label>
                    <select class="js-example-basic-single" name="state" id="cbm_rol_editar" style="width:100%;">
                    </select><br><br>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Modificar_Usuario()"><i class="fa fa-check"><b>&nbsp;Modificar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    listar_hospederia();
    $('.js-example-basic-single').select2();
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
</script>

