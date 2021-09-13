<?php
    require '../../modelo/modelo_herramienta.php';
    $MT = new Modelo_Herramienta();//Instancio todas las funciones del modelo
    $consulta = $MT->listar_herramienta();
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