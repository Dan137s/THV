<?php
    require '../../modelo/modelo_herramienta.php';
    $MH = new Modelo_Herramienta();//Instancio todas las funciones del modelo
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $materialactual = htmlspecialchars($_POST['acma'],ENT_QUOTES,'UTF-8');
    $materialnuevo = htmlspecialchars($_POST['numa'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['ds'],ENT_QUOTES,'UTF-8');
    $stock = htmlspecialchars($_POST['st'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['es'],ENT_QUOTES,'UTF-8');
  
    $consulta = $MT->Modificar_Material($id, $materialactual, $materialnuevo,  $descripcion, $stock, $estatus);
    echo $consulta;
  
?>