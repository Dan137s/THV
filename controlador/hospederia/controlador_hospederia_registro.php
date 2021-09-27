<?php
    require '../../modelo/modelo_hospederia.php';
    $MT = new Modelo_Hospederia();//Instancio todas las funciones del modelo
    $nombre = htmlspecialchars($_POST['no'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['dr'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['es'],ENT_QUOTES,'UTF-8');
  
    $consulta = $MT->Registrar_Hospederia($nombre, $direccion, $estatus);
    echo $consulta;
  
?>