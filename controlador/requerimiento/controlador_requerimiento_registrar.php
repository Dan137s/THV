
<?php
    require '../../modelo/modelo_requerimiento.php';

    $MR = new Modelo_Requerimiento();

   
    $vesino         =  htmlspecialchars($_POST['t2'],ENT_QUOTES,'UTF-8');
    $observar       =  htmlspecialchars($_POST['t3'],ENT_QUOTES,'UTF-8');
    $fono           =  htmlspecialchars($_POST['t4'],ENT_QUOTES,'UTF-8');
    $fechaejecucion =  htmlspecialchars($_POST['t5'],ENT_QUOTES,'UTF-8');
    $trabajador     =  htmlspecialchars($_POST['t7'],ENT_QUOTES,'UTF-8');
    $direccion      =  htmlspecialchars($_POST['t10'],ENT_QUOTES,'UTF-8');
    $voluntario     =  htmlspecialchars($_POST['t11'],ENT_QUOTES,'UTF-8');
    $diagnostico    =  htmlspecialchars($_POST['t12'],ENT_QUOTES,'UTF-8');
    $monto          =  htmlspecialchars($_POST['t13'],ENT_QUOTES,'UTF-8');
    $propuesta      =  htmlspecialchars($_POST['t14'],ENT_QUOTES,'UTF-8');

    $ruta1 = "";
    $ruta2 = "";
    $ruta3 = "";
    $ruta4 = "";
    $ruta5 = "";
    
    if(is_array($_FILES) && count($_FILES)>0 )
    {
        if(move_uploaded_file($_FILES["t1"]["tmp_name"],"../../requerimiento_imagenes/".$_FILES["t1"]["name"])&&
           move_uploaded_file($_FILES["t6"]["tmp_name"],"../../requerimiento_imagenes/".$_FILES["t6"]["name"])&&
           move_uploaded_file($_FILES["t8"]["tmp_name"],"../../requerimiento_imagenes/".$_FILES["t8"]["name"])&&
           move_uploaded_file($_FILES["t9"]["tmp_name"],"../../requerimiento_imagenes/".$_FILES["t9"]["name"])&&
           move_uploaded_file($_FILES["t15"]["tmp_name"],"../../requerimiento_imagenes/".$_FILES["t15"]["name"]))
        {
            $ruta1 = "../requerimiento_imagenes/".$_FILES["t1"]["name"];
            $ruta2 = "../requerimiento_imagenes/".$_FILES["t6"]["name"];
            $ruta3 = "../requerimiento_imagenes/".$_FILES["t8"]["name"];
            $ruta4 = "../requerimiento_imagenes/".$_FILES["t9"]["name"];
            $ruta5 = "../requerimiento_imagenes/".$_FILES["t15"]["name"];

            $consulta = $MR->Registrar_requerimiento_txt($vesino,$observar,$fono,$fechaejecucion,$trabajador,
            $direccion,$voluntario,$diagnostico,$monto,$propuesta,$ruta1,$ruta2,$ruta3,$ruta4,$ruta5);
            echo $consulta;
        }
    }
    else
    {
        echo -1;
    }
    

?>