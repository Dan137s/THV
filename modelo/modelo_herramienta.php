<?php
    class Modelo_Herramienta{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        //Funcion listar
        function listar_herramienta(){
            $sql = "call SP_LISTAR_HERRAMIENTA()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;

				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        //Funcion Registrar
        function Registrar_Material($material, $descripcion, $stock, $estatus){
            $sql = "call SP_REGISTRAR_MATERIAL('$material', '$descripcion', '$stock', '$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]); //Retorna valores 
				}
				$this->conexion->cerrar();
			}
        }

        //Funcion Modificar
        function Modificar_Material($id, $materialactual, $materialnuevo,  $descripcion, $stock, $estatus){
            $sql = "call SP_MODIFICAR_MATERIAL('$id', '$materialactual', '$materialnuevo',  '$descripcion', '$stock', '$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);//Retorna valores
				}
				$this->conexion->cerrar();
			}
        }
    }
?>