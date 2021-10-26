<?php
    require '../../modelo/modelo_reparacion.php';
    $MT = new Modelo_Reparacion();//Instancio todas las funciones del modelo
    $consulta = $MT->listar_reparacion();
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