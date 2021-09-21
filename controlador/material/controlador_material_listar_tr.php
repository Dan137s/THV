<?php
    require '../../modelo/modelo_material.php';
    $MT = new Modelo_Material();//Instancio todas las funciones del modelo
    $consulta = $MT->listar_material();
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