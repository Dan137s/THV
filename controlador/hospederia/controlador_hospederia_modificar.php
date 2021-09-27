<?php
    require '../../modelo/modelo_hospederia.php';
    $MT = new Modelo_Hospederia();//Instancio todas las funciones del modelo
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $nombreactual = htmlspecialchars($_POST['acno'],ENT_QUOTES,'UTF-8');
    $nombrenuevo = htmlspecialchars($_POST['nuno'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['dr'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['es'],ENT_QUOTES,'UTF-8');
  
    $consulta = $MT->Modificar_Hospederia($id, $nombreactual, $nombrenuevo, $direccion, $estatus);
    echo $consulta;
  
?>