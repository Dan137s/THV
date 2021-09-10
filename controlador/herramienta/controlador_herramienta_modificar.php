<?php
    require '../../modelo/modelo_herramienta.php';

    $MHR = new Modelo_Herramienta();//Instancio todas las funciones del modelo
    
    //$serial = htmlspecialchars($_POST['serial'],ENT_QUOTES,'UTF-8');
    //$tipo = htmlspecialchars($_POST['tipo'],ENT_QUOTES,'UTF-8');
    //$marca = htmlspecialchars($_POST['marca'],ENT_QUOTES,'UTF-8');
    //$modelo = htmlspecialchars($_POST['modelo'],ENT_QUOTES,'UTF-8');
    //$descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MHR->Modificar_Herramienta(  $estatus);
    echo $consulta;
  
?>