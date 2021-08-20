<?php
    require '../../modelo/modelo_hospederia.php';
    $MH = new Modelo_Hospederia();//Instancio todas las funciones del modelo
    $consulta = $MH->listar_hospederia();
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