
<?php
    require '../../modelo/modelo_encuesta.php';

    $MR = new Modelo_Encuesta();
    $rut = htmlspecialchars($_POST['rut'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MR->Registrar_Encuesta($rut);
    echo $consulta;

?>