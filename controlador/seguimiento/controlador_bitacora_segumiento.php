<?php
    require '../../modelo/modelo_bitacora_requerimiento.php';
    $MR = new Modelo_bitacora_requerimiento();//Instancio todas las funciones del modelo
    $consulta = $MR->listar_requerimiento();
    if($consulta){
        echo json_encode($consulta);
    }else{
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }

?>