<?php
    require '../../modelo/modelo_herramienta_tr.php';
    $MH = new Modelo_Herramienta();//Instancio todas las funciones del modelo
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $serialactual = htmlspecialchars($_POST['acse'],ENT_QUOTES,'UTF-8');
    $serialnuevo = htmlspecialchars($_POST['nuse'],ENT_QUOTES,'UTF-8');
    $tipo = htmlspecialchars($_POST['tp'],ENT_QUOTES,'UTF-8');
    $marca = htmlspecialchars($_POST['mc'],ENT_QUOTES,'UTF-8');
    $modelo = htmlspecialchars($_POST['ml'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['ds'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['es'],ENT_QUOTES,'UTF-8');

  
    $consulta = $MH->Modificar_Herramienta($id, $serialactual, $serialnuevo, $tipo, $marca, $modelo, $descripcion, $estatus);
    echo $consulta;
  
?>