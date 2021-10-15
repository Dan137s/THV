<?php
    require '../../modelo/modelo_encuesta.php';
    $MR = new Modelo_Encuesta();//Instancio todas las funciones del modelo
    $rut = htmlspecialchars($_POST['rut'],ENT_QUOTES,'UTF-8');
    $consulta = $MR->listar_encuesta_trabajador($rut);
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