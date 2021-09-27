<?php
    class Modelo_Hospederia{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        //Funcion listar
        function listar_hospederia(){
            $sql = "call SP_LISTAR_HOSPEDERIA()";
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
        function Registrar_Hospederia($nombre, $direccion, $estatus){
            $sql = "call SP_REGISTRAR_HOSPEDERIA('$nombre', '$direccion', '$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]); //Retorna valores 
				}
				$this->conexion->cerrar();
			}
        }

        //Funcion Modificar
        function Modificar_Hospederia($id, $nombreactual, $nombrenuevo, $direccion, $estatus){
            $sql = "call SP_MODIFICAR_HOSPEDERIA('$id', '$nombreactual', '$nombrenuevo', '$direccion', '$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);//Retorna valores
				}
				$this->conexion->cerrar();
			}
        }
    }
?>