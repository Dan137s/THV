<?php
    require '../../modelo/modelo_requerimiento.php';

    $MR = new Modelo_Requerimiento();

    $idusuario = htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MR->Modificar_Estatus_requerimiento($idusuario,$estatus);
    echo $consulta;

?>