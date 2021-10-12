<?php
    require '../../modelo/modelo_reparacion.php';
    $MR = new Modelo_Reparacion();//Instancio todas las funciones del modelo
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $reparacionactual = htmlspecialchars($_POST['repaac'],ENT_QUOTES,'UTF-8');
    $reparacionnueva = htmlspecialchars($_POST['repanu'],ENT_QUOTES,'UTF-8');
    
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
  
    $consulta = $MR->Modificar_Reparacion($id, $reparacionactual, $reparacionnueva, $estatus);
    echo $consulta;
  
?>