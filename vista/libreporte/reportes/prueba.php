<?php
require_once __DIR__ .'/../vendor/autoload.php';
require_once '../../../conexion_reportes/r_conexion.php';

$consulta = "select * from reparacion";
$html="<h2 style='font-size:20px;'>Datos de la reparacion</h2>";
$resultado = $mysqli->query($consulta);

while($row = $resultado->fetch_assoc()){
    $html.="<br>Reparacion:".$row['reparacion_id'].'';
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output(); 