<?php
    class Modelo_Requerimiento{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }


        function listar_requerimiento(){
            $sql = "call SP_LISTAR_REQUERIMIENTO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
                    
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function Registrar_requerimiento($monto,$rut,$direc,$imagen){
            $id = 0;
            $sql = "call SP_REGISTRAR_REQUERIMIENTO('$monto','$rut','$direc')";
            
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                    $id= trim($row[0]);//si -1 no existe el usuario 
				}
			}
            if ($id < 0){
                //print_r($imagen);
                return $id;
            }
            else{

                $i = 1;/*
                foreach ($_FILES['foto']['tmp_name'] as $e)
                {
                    $id = $id+1;
                    $i++;
                }
                for($i=0;$i<count($imagen);$i++)
                {
                    $photo = $imagen[$i];
                    $sql = "call SP_GUARDAR_IMAGEN('$id','$photo')";
                    if ($consulta = $this->conexion->conexion->query($sql)) {
                        if ($row = mysqli_fetch_array($consulta)) {
                            $id= trim($row[0]);//si -1 no existe el usuario 
                        }
                    }
                
                }*/
                return $id;
            }
            $this->conexion->cerrar();
        }
    }
?>