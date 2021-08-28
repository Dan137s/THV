<?php
    require '../../modelo/modelo_requerimiento.php';
    $MR = new Modelo_Requerimiento();//Instancio todas las funciones del modelo
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