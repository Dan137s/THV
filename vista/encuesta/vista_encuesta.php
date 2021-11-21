<script type="text/javascript" src="../js/encuesta.js?rev=<?php echo time();?>"></script>
<style>
    .form-control-detalle {width: 10%;}
    .form-control-detalle-area {margin: 0px; width: 502px; height: 70px;}
</style>
<div class="col-md-12">
    
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">[ENCUESTA AL VECINO]</h3>

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
                        <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistros()"><i class="glyphicon glyphicon-plus"></i> Encuestar</button>
                    </div>
                
            </div>
            <table id="tabla_encuesta" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Rut</th>
                        <th>Vecino</th>
                        <th>Encuestado</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Rut</th>
                        <th>Vecino</th>
                        <th>Encuestado</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.box-body -->
    </div>
          <!-- /.box -->
</div>
<form autocomplete="false" onsubmit="return false" enctype="multipart/form-data">
    <div class="modal fade" id="modal_registro" role="dialog" >
        <div class="modal-dialog modal-sm"  style="width: 75%;">
        <div class="modal-content" style="width: 100%;align-items: center;" >
            <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 style="text-align:center;" class="modal-title"><b>Encuesta de opinión</b></h3>
            </div>
            <div class="modal-body" >
                <div class="col-lg-12">

                <h4 style="text-align:left;" class="modal-title">Detalles de la encuesta.</h4>
             <hr>   
            <h5>Responda las siguientes preguntas, considerando:<br>

            - En los ítems del 1 al 6 el número 1 como muy insatisfecho/a y el número 5 como muy satisfecho/a.<br>

            - En los ítems del 7 al 8 el número 1 como muy en desacuerdo y el número 5 como muy de acuerdo.</h5><hr>
                    <label for="">RUT vecino</label>
                    <input type="text" class="form-control" id="txt_vesino" placeholder="Ingrese rut del vecino(a)">
                </div>
            </div>
            <div class="modal-header">
        

            </div>
            <hr>
            <div class="modal-body">
                <h4 style="color: #FFC300; text-align:center;" class="modal-title"><b>Valore los siguientes aspectos del trabajo realizado en su hogar por Fundación Trato Hecho Vecino en cuanto al equipo de trabajo.</b></h4><p>

                <div class="encuesta_detalle">
                    <input type="text" id="txt_p1" hidden>
                    <label for="">1.-Información sobre los trabajos a realizar.</label><br>
                    <input  type="number" class="form-control-detalle" id="txt_1" min="1" max="5"><br>
                </div><br>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p2" hidden>
                    <label for="">2.-Comunicación con el equipo de trabajo.</label><br>
                    <input type="number" class="form-control-detalle" id="txt_2" min="1" max="5"><br>
                </div><br>

                <h4 style="color: #FFC300; text-align:center;" class="modal-title"><b>Respeto del equipo de trabajo.</b></h4><p>
                
                <br><div class="encuesta_detalle">
                    <input type="text" id="txt_p3" hidden>
                    <label for="">3.-Valore los siguientes aspectos del trabajo realizado en su hogar por Fundación Trato Hecho Vecino en cuanto a la ejecución de los trabajos.</label><br>
                    <input type="number" class="form-control-detalle" id="txt_3" min="1" max="5"><br>
                </div>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p4" hidden>
                    <label for="">4.-Puntualidad del equipo de trabajo según hora acordada.</label><br>
                    <input type="number" class="form-control-detalle" id="txt_4" min="1" max="5"><br>
                </div>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p5" hidden>
                    <label for="">5.-Limpieza del espacio donde se realizaron los trabajos por parte del equipo.</label><br>
                    <input type="number" class="form-control-detalle" id="txt_5" min="1" max="5"><br>
                </div>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p6" hidden>
                    <label for="">6.-Calidad del trabajo realizado por la Fundación Trato Hecho Vecino</label><br>
                    <input type="number" class="form-control-detalle" id="txt_6" min="1" max="5"><br>
                </div> <hr><br>
                <h4 style="color: #FFC300; text-align:center;"  class="modal-title"><b>Valore los siguientes aspectos del trabajo realizado en su hogar por Fundación Trato Hecho Vecino en cuanto a la vinculación con la hospedería.</b></h4><p>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p7" hidden>
                    <label for="">7.-Considero que al participar de esta iniciativa genero un aporte a mi comunidad</label><br>
                    <input type="number" class="form-control-detalle" id="txt_7" min="1" max="5"><br>
                </div>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p8" hidden>
                    <label for="">8.-Considero que a partir de esta iniciativa reconozco a los usuarios de la hospedería como vecinos de mi barrio</label><br>
                    <input type="number" class="form-control-detalle" id="txt_8" min="1" max="5"><br>
                </div><br> <hr>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p9" hidden>
                    <label for="">¿Qué aspectos de Trato Hecho Vecino destacarías y qué aspectos sugieres mejorar</label><br>
                    <textarea name="detalles" id="txt_9" class="form-control-detalle-area" form="form-encuesta-detalle"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="registrarEncuesta()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>
</form>
<form autocomplete="false" onsubmit="return false" id="form-encuesta-detalle">
    <div class="modal fade" id="modal_edit" role="dialog">
        <div class="modal-dialog modal-sm" style="width: 75%;">
        <div class="modal-content" style="width: 100%;align-items: center;">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Detalle de la encuesta</b></h4><br>
            <h4>Responda las siguientes preguntas, considerando:<br>

- En los ítems del 1 al 6 el número 1 como muy insatisfecho/a y el número 5 como muy satisfecho/a.<br>

- En los ítems del 7 al 8 el número 1 como muy en desacuerdo y el número 5 como muy de acuerdo.</h4>

            </div>
            <div class="modal-body">
                <h4 style="color: #FFC300;" class="modal-title"><b>Valore los siguientes aspectos del trabajo realizado en su hogar por Fundación Trato Hecho Vecino en cuanto al equipo de trabajo</b></h4><p>

                <div class="encuesta_detalle">
                    <input type="text" id="idusuario" hidden >
                    <input type="text" id="txt_p1" hidden>
                    <label for="">1.-Información sobre los trabajos a realizar.</label>
                    <input type="number" class="form-control-detalle" id="txt_p1_editar" min="1" max="5"><br>
                </div>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p2" hidden>
                    <label for="">2.-Comunicación con el equipo de trabajo.</label>
                    <input type="number" class="form-control-detalle" id="txt_p2_editar" min="1" max="5"><br>
                </div>

                <h4 style="color: #FFC300;" class="modal-title"><b>Respeto del equipo de trabajo.</b></h4><p>
                
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p3" hidden>
                    <label for="">3.-Valore los siguientes aspectos del trabajo realizado en su hogar por Fundación Trato Hecho Vecino en cuanto a la ejecución de los trabajos.</label>
                    <input type="number" class="form-control-detalle" id="txt_p3_editar" min="1" max="5"><br>
                </div>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p4" hidden>
                    <label for="">4.-Puntualidad del equipo de trabajo según hora acordada.</label>
                    <input type="number" class="form-control-detalle" id="txt_p4_editar" min="1" max="5"><br>
                </div>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p5" hidden>
                    <label for="">5.-Limpieza del espacio donde se realizaron los trabajos por parte del equipo.</label>
                    <input type="number" class="form-control-detalle" id="txt_p5_editar" min="1" max="5"><br>
                </div>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p6" hidden>
                    <label for="">6.-Calidad del trabajo realizado por la Fundación Trato Hecho Vecino</label>
                    <input type="number" class="form-control-detalle" id="txt_p6_editar" min="1" max="5"><br>
                </div>
                <h4 style="color: #FFC300;" class="modal-title"><b>Valore los siguientes aspectos del trabajo realizado en su hogar por Fundación Trato Hecho Vecino en cuanto a la vinculación con la hospedería</b></h4><p>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p7" hidden>
                    <label for="">7.-Considero que al participar de esta iniciativa genero un aporte a mi comunidad</label>
                    <input type="number" class="form-control-detalle" id="txt_p7_editar" min="1" max="5"><br>
                </div>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p7" hidden>
                    <label for="">8.-Considero que a partir de esta iniciativa reconozco a los usuarios de la hospedería como vecinos de mi barrio</label>
                    <input type="number" class="form-control-detalle" id="txt_p8_editar" min="1" max="5"><br>
                </div><br>
                <div class="encuesta_detalle">
                    <input type="text" id="txt_p7" hidden>
                    <label for="">¿Qué aspectos de Trato Hecho Vecino destacarías y qué aspectos sugieres mejorar</label><br>
                    <textarea name="detalles" class="form-control-detalle-area"  id="txt_p9_editar"form="form-encuesta-detalle">10/10</textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="modificarEncuesta()"><i class="fa fa-check"><b>&nbsp;Modificar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    listar_encuesta();
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

</script>