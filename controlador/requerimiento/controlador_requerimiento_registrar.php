
<?php
    require '../../modelo/modelo_requerimiento.php';

    $MR = new Modelo_Requerimiento();

    $monto = htmlspecialchars($_POST['monto'],ENT_QUOTES,'UTF-8');
    $rut = htmlspecialchars($_POST['rut'],ENT_QUOTES,'UTF-8');
    $direc = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    //$imagen = htmlspecialchars($_POST['foto'],ENT_QUOTES,'UTF-8');
    if(count($_FILES["foto"]["tmp_name"])>0)
    {
        $consulta = $MR->Registrar_requerimiento($monto,$rut,$direc,$imagen);
        echo $consulta;
    }
    
    

?>