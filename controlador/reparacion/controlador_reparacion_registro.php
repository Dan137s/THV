<?php
    require '../../modelo/modelo_reparacion.php';
    $MR = new Modelo_Reparacion();//Instancio todas las funciones del modelo
    $reparacion = htmlspecialchars($_POST['reparacion'],ENT_QUOTES,'UTF-8');
   
    $nivel = htmlspecialchars($_POST['nivel'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');

  
    $consulta = $MR->Registrar_Reparacion($reparacion, $descripcion, $nivel, $estatus);
    echo $consulta;
  
?>