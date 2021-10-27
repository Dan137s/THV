<?php
    require '../../modelo/modelo_encuesta1.php';
    $MEN = new Modelo_Encuesta1();//Instancio todas las funciones del modelo
    $consulta = $MEN->listar_encuesta1();
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