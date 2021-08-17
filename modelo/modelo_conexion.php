<?php
	class conexion{
		private $servidor;
		private $usuario;
		private $contrasena;
		private $basedatos;
		public $conexion;
		public function __construct(){

			//Para servidor local
		    $this->servidor = "localhost";
			$this->usuario = "root";
			$this->contrasena = "";
			$this->basedatos = "thv_bd";
			
			//Para el servidor de prueba
			//$this->servidor = "sql200.epizy.com";
			//$this->usuario = "epiz_29366167";
			//$this->contrasena = "GkQpBTrRVn0";
			//$this->basedatos = "epiz_29366167_thv_bd";
		}
		function conectar(){
			$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->basedatos);
			$this->conexion->set_charset("utf8");
		}
		function cerrar(){
			$this->conexion->close();	
		}
	}
?> 