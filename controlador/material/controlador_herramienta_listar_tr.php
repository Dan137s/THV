<?php
    require '../../modelo/modelo_herramienta.php';
    $MH= new Modelo_Herramienta();//Instancio todas las funciones del modelo
    $consulta = $MH->listar_herramienta();
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