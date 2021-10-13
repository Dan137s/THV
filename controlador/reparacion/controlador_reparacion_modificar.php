<?php
    require '../../modelo/modelo_reparacion.php';
    $MRE = new Modelo_Reparacion();//Instancio todas las funciones del modelo
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $reparacionactual = htmlspecialchars($_POST['repaac'],ENT_QUOTES,'UTF-8');
    $reparacionnueva = htmlspecialchars($_POST['repanu'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descri'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
  
    $consulta = $MRE->Modificar_Reparacion($id, $reparacionactual, $reparacionnueva, $descripcion, $estatus);
    echo $consulta;
  
?>