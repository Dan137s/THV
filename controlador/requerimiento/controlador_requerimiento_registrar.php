
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


    $consulta = $MR->Registrar_requerimiento_txt($vesino,$observar,$fono,$fechaejecucion,$trabajador,
    $direccion,$voluntario,$diagnostico,$monto,$propuesta);
    echo $consulta;

/*
    $datomapa = addslashes(file_get_contents($_FILES['t1']['tmp_name']));
    $datoorientativa = addslashes(file_get_contents($_FILES['t6']['tmp_name']));
    $datogeneral = addslashes(file_get_contents($_FILES['t8']['tmp_name']));
    $datodaño = addslashes(file_get_contents($_FILES['t9']['tmp_name']));
    $datofirma = addslashes(file_get_contents($_FILES['t15']['tmp_name']));


    $consulta = $MR->Registrar_requerimiento($datoplano,$vesino,$observar,$fono,$fechaejecucion
    ,$datoorientativa,$trabajador
    ,$datogeneral,$datodaño,$direccion,$voluntario
    ,$diagnostico,$monto
    ,$propuesta,$datofirma);
    echo $consulta;
    
/*
    
    $vesino = $_POST['vesino'];
    $observar = $_POST['observar'];
    $fono = $_POST['fono'];
    $fechaejecucion = $_POST['fechaejecucion'];/////
    $trabajador = $_POST['trabajador'];/////
    $direccion = $_POST['direccion'];
    $voluntario = $_POST['voluntario'];/////
    $diagnostico = $_POST['diagnostico'];
    $monto = $_POST['monto'];/////
    $propuesta = $_POST['propuesta'];

    $caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
    $caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");



    $vesino = str_replace($caracteres_malos, $caracteres_buenos, $vesino);
    $observar = str_replace($caracteres_malos, $caracteres_buenos, $observar);
    $fono = str_replace($caracteres_malos, $caracteres_buenos, $fono);
    $fechaejecucion = str_replace($caracteres_malos, $caracteres_buenos, $fechaejecucion);
    $trabajador = str_replace($caracteres_malos, $caracteres_buenos, $trabajador);
    $direccion = str_replace($caracteres_malos, $caracteres_buenos, $direccion);
    $voluntario = str_replace($caracteres_malos, $caracteres_buenos, $voluntario);
    $diagnostico = str_replace($caracteres_malos, $caracteres_buenos, $diagnostico);
    $monto = str_replace($caracteres_malos, $caracteres_buenos, $monto);
    $propuesta = str_replace($caracteres_malos, $caracteres_buenos, $propuesta);
    return 1;
    if(empty($vesino)) {
        
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    } elseif(empty($observar)) {
        die( 'Es necesario establecer una observacion' );
    }elseif(empty($fono)) {
        die( 'Es necesario establecer una fono' );
    }elseif(empty($fechaejecucion)) {
        die( 'Es necesario establecer una fechaejecucion' );
    }elseif(empty($trabajador)) {
        die( 'Es necesario establecer una trabajador' );
    }elseif(empty($direccion)) {
        die( 'Es necesario establecer una direccion' );
    }elseif(empty($voluntario)) {
        die( 'Es necesario establecer una voluntario' );
    }elseif(empty($diagnostico)) {
        die( 'Es necesario establecer una diagnostico' );
    }elseif(empty($monto)) {
        die( 'Es necesario establecer una monto' );
    }elseif(empty($propuesta)) {
        die( 'Es necesario establecer una propuesta' );


    } elseif($_FILES['datoplano']['error'] === 4) {
        die( 'Es necesario establecer una imagen' );
    } elseif($_FILES['file_orientativa']['error'] === 4) {
        die( 'Es necesario establecer una imagen' );
    } elseif($_FILES['datogeneral']['error'] === 4) {
        die( 'Es necesario establecer una imagen' );
    } elseif($_FILES['datodaño']['error'] === 4) {
        die( 'Es necesario establecer una imagen' );
    } elseif($_FILES['datofirma']['error'] === 4) {
        die( 'Es necesario establecer una imagen' );

    } else if(isset($vesino) AND isset($observar) AND isset($fono) AND isset($fechaejecucion) 
    AND isset($trabajador) AND isset($direccion) AND isset($voluntario) AND isset($diagnostico) 
    AND isset($monto) AND isset($propuesta) AND $_FILES['datoplano']['error'] === 0
     AND $_FILES['file_orientativa']['error'] === 0 AND $_FILES['datogeneral']['error'] === 0 
     AND $_FILES['datodaño']['error'] === 0 AND $_FILES['datofirma']['error'] === 0 ) {

        $imagenBinaria1 = addslashes(file_get_contents($_FILES['datoplano']['tmp_name']));
        $imagenBinaria2 = addslashes(file_get_contents($_FILES['file_orientativa']['tmp_name']));
        $imagenBinaria3 = addslashes(file_get_contents($_FILES['datogeneral']['tmp_name']));
        $imagenBinaria4 = addslashes(file_get_contents($_FILES['datodaño']['tmp_name']));
        $imagenBinaria5 = addslashes(file_get_contents($_FILES['datofirma']['tmp_name']));

        $nombreArchivo1 = $_FILES['datoplano']['name'];
        $nombreArchivo2 = $_FILES['file_orientativa']['name'];
        $nombreArchivo3 = $_FILES['datogeneral']['name'];
        $nombreArchivo4 = $_FILES['datodaño']['name'];
        $nombreArchivo5 = $_FILES['datofirma']['name'];

        //Extensiones permitidas
        $extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

        //Obtenemos la extensión (en minúsculas) para poder comparar
        $extension1 = strtolower(end(explode('.', $nombreArchivo1)));
        $extension2 = strtolower(end(explode('.', $nombreArchivo2)));
        $extension3 = strtolower(end(explode('.', $nombreArchivo3)));
        $extension4 = strtolower(end(explode('.', $nombreArchivo4)));
        $extension5 = strtolower(end(explode('.', $nombreArchivo5)));
        //Verificamos que sea una extensión permitida, si no lo es mostramos un mensaje de error
        if(!in_array($extension1, $extensiones)) {
            die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
        };
        if(!in_array($extension2, $extensiones)) {
            die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
        };
        if(!in_array($extension3, $extensiones)) {
            die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
        };
        if(!in_array($extension4, $extensiones)) {
            die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
        };
        if(!in_array($extension5, $extensiones)) {
            die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
        }; else {
            //Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
            //Y definimos el máximo que se puede subir
            //Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini
    
            $tamañoArchivo1 = $_FILES['datoplano']['size']; //Obtenemos el tamaño del archivo en Bytes
            $tamañoArchivoKB1 = round(intval(strval( $tamañoArchivo1 / 1024 ))); //Pasamos el tamaño del archivo a KB
            $tamañoArchivo2 = $_FILES['file_orientativa']['size']; //Obtenemos el tamaño del archivo en Bytes
            $tamañoArchivoKB2 = round(intval(strval( $tamañoArchivo2 / 1024 ))); //Pasamos el tamaño del archivo a KB
            $tamañoArchivo3 = $_FILES['datogeneral']['size']; //Obtenemos el tamaño del archivo en Bytes
            $tamañoArchivoKB3 = round(intval(strval( $tamañoArchivo3 / 1024 ))); //Pasamos el tamaño del archivo a KB
            $tamañoArchivo4 = $_FILES['datodaño']['size']; //Obtenemos el tamaño del archivo en Bytes
            $tamañoArchivoKB4 = round(intval(strval( $tamañoArchivo4 / 1024 ))); //Pasamos el tamaño del archivo a KB
            $tamañoArchivo5 = $_FILES['datofirma']['size']; //Obtenemos el tamaño del archivo en Bytes
            $tamañoArchivoKB5 = round(intval(strval( $tamañoArchivo5 / 1024 ))); //Pasamos el tamaño del archivo a KB
    

            $tamañoMaximoKB = "2048"; //Tamaño máximo expresado en KB
            $tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB
    
            //Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
            if($tamañoArchivo1 > $tamañoMaximoBytes || $tamañoArchivo2 > $tamañoMaximoBytes 
            ||$tamañoArchivo3 > $tamañoMaximoBytes || $tamañoArchivo4 > $tamañoMaximoBytes ||
            $tamañoArchivo5 > $tamañoMaximoBytes) {
                die( "El archivo de imagen es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB."Kb." );
            } else {
                
                return 1
    
            };//Fin condicional tamaño archivo
        };
    };
    */
    
    
    

?>