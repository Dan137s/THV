<?php
    require '../../modelo/modelo_hospederia.php';
    $MT = new Modelo_Hospederia();//Instancio todas las funciones del modelo
    $consulta = $MT->listar_hospederia();
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