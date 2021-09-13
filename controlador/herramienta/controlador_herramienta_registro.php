<?php
    require '../../modelo/modelo_herramienta.php';
    $MT = new Modelo_Herramienta();//Instancio todas las funciones del modelo
    $material = htmlspecialchars($_POST['ma'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['ds'],ENT_QUOTES,'UTF-8');
    $stock = htmlspecialchars($_POST['st'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['es'],ENT_QUOTES,'UTF-8');
  
    $consulta = $MT->Registrar_Material($material, $descripcion, $stock, $estatus);
    echo $consulta;
  
?>