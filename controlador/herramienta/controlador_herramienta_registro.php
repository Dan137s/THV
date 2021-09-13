<?php
    require '../../modelo/modelo_herramienta.php';
    $MH = new Modelo_Herramienta();//Instancio todas las funciones del modelo

    $serial = htmlspecialchars($_POST['se'],ENT_QUOTES,'UTF-8');
    $tipo = htmlspecialchars($_POST['ti'],ENT_QUOTES,'UTF-8');
    $marca = htmlspecialchars($_POST['ma'],ENT_QUOTES,'UTF-8');
    $modelo = htmlspecialchars($_POST['mo'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['ds'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['es'],ENT_QUOTES,'UTF-8');
  
    $consulta = $MH->Registrar_Herramienta($serial, $tipo, $marca, $modelo, $descripcion, $estatus );
    echo $consulta;
  
?>