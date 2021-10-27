<?php
    class Modelo_Encuesta1{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        function listar_encuesta1 (){
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
       
        
    }
?>