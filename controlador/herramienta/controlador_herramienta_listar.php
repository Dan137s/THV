<?php
    require '../../modelo/modelo_herramienta.php';
    $MHR = new Modelo_Herramienta();//Instancio todas las funciones del modelo
    $consulta = $MHR->listar_herramienta();
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