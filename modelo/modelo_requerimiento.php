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

        
        function Registrar_requerimiento_txt($vesino,$observar,$fono,$fechaejecucion,$trabajador,
        $direccion,$voluntario,$diagnostico,$monto,$propuesta,$ruta1,$ruta2,$ruta3,$ruta4,$ruta5)
        {
            $id = 0;
            $sql = "call SP_REGISTRAR_REQUERIMIENTOS_TXT('$vesino','$observar','$fono','$fechaejecucion',
            '$trabajador','$direccion','$voluntario','$diagnostico','$monto','$propuesta','$ruta1','$ruta2','$ruta3','$ruta4','$ruta5')";
            
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                    $id= trim($row[0]);//si -1 no existe el usuario 
				}
			}
            if ($id < 0){
                return -1;
            }
            else{

                return 1;
            }
            $this->conexion->cerrar();
        }



    }
?>