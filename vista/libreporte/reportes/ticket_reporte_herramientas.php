<?php
require_once __DIR__ .'/../vendor/autoload.php';
require_once '../../../conexion_reportes/r_conexion.php';

$consulta = /**"select * from reparacion";**/
"SELECT * FROM herramienta";
$html="Herramientas";
$resultado = $mysqli->query($consulta);
while($row = $resultado->fetch_assoc()){
    $html.="<br>[ID:".$row['herramienta_id'].']' . " [S/N:".$row['herramienta_serial'].']' ." [Marca:".$row['herramienta_marca'] .']'. " [Modelo:".$row['herramienta_modelo'].']'. " [Estado:".$row['herramienta_estatus'].']';


}


$mpdf=new \Mpdf\Mpdf(['mode' => 'utf-8']);
$mpdf->WriteHTML($html);
$mpdf->Output(); 