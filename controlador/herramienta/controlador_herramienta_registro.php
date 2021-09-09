<?php
    require '../../modelo/modelo_herramienta.php';
    $MHR = new Modelo_Herramienta();//Instancio todas las funciones del modelo
    $herramienta = htmlspecialchars($_POST['h'],ENT_QUOTES,'UTF-8');
    $serial = htmlspecialchars($_POST['s'],ENT_QUOTES,'UTF-8');
    $marca = htmlspecialchars($_POST['m'],ENT_QUOTES,'UTF-8');
    $modelo = htmlspecialchars($_POST['mo'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['d'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');
  
    $consulta = $MHR->Registrar_Herramienta($herramienta, $serial, $marca, $modelo, $descripcion, $estatus);
    echo $consulta;
  
?>