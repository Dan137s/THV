<?php
    class Modelo_Encuesta{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }


        function listar_Encuesta(){
            $sql = "call SP_LISTAR_ENCUESTA()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
                    
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function listar_encuesta_trabajador($rut){
            $sql = "call SP_LISTAR_ENCUESTA_TRABAJADOR('$rut')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;
                    
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        
        function Registrar_Encuesta($rut,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9){
            $id = 0;
            $sql = "call SP_REGISTRAR_ENCUESTA('$rut','$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9')";
            
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                    $id= trim($row[0]);//si -1 no existe el usuario 
				}
			}
            if ($id < 0){
                return $id;
            }
            else{
                $i = 1;
                return $id;
            }
            $this->conexion->cerrar();
        }

        function modificar_Encuestas($rut,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9){
            $sql = "call SP_MODIFICAR_ENCUESTA('$rut','$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9')";
            
			if ($consulta = $this->conexion->conexion->query($sql)) {
                return 1;
            }
            else{
                return 0;
            }
        }

        
        
    }
?>