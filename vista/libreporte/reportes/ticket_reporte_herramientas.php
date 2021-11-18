<?php
require_once __DIR__ .'/../vendor/autoload.php';
require_once '../../../conexion_reportes/r_conexion.php';

$consulta = /**"select * from reparacion";**/
"SELECT * FROM herramienta";
$html="
<table border='1'>
    <tr>
        <td style='border-bottom:0px solid; border-left:0px; border-right:0px; border-top:0px;'><h2 style='font-size:18px;'> Reporte & estado de herramientas</h2></td>
    </tr>
</table>";

$resultado = $mysqli->query($consulta);
while($row = $resultado->fetch_assoc()){
    $html.="<br>[ID:".$row['herramienta_id'].']' . " [S/N:".$row['herramienta_serial'].']' ." [Marca:".$row['herramienta_marca'] .']'. " [Modelo:".$row['herramienta_modelo'].']'. " [Estado:".$row['herramienta_estatus'].']';


}


$mpdf=new \Mpdf\Mpdf(['mode' => 'utf-8']);
$mpdf->WriteHTML($html);
$mpdf->Output(); 