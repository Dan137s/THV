<?php
    require '../../modelo/modelo_encuesta.php';
    $MR = new Modelo_Encuesta();//Instancio todas las funciones del modelo
    $consulta = $MR->listar_Encuesta();
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