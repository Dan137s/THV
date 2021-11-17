<?php
require_once __DIR__ .'/../vendor/autoload.php';
require_once '../../../conexion_reportes/r_conexion.php';

$consulta = /**"select * from reparacion";**/
"SELECT * FROM herramienta";
$html="Herramientas";
$resultado = $mysqli->query($consulta);
while($row = $resultado->fetch_assoc()){
    $html.="<br>[ID]:".$row['herramienta_id'].''. " [Marca]:".$row['herramienta_marca'];


}


$mpdf=new \Mpdf\Mpdf(['mode' => 'utf-8']);
$mpdf->WriteHTML($html);
$mpdf->Output(); 