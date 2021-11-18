<?php
require_once __DIR__ .'/../vendor/autoload.php';
require_once '../../../conexion_reportes/r_conexion.php';

$consulta = /**"select * from reparacion";**/
"SELECT * FROM material";
$html="
<table border='1'>
    <tr>
        <td style='border-bottom:0px solid; border-left:0px; border-right:0px; border-top:0px;'><h2 style='font-size:18px;'> Reporte & estado de materiales</h2></td>
    </tr>
</table>";

$resultado = $mysqli->query($consulta);
while($row = $resultado->fetch_assoc()){
    $html.="<br>[ID:".$row['material_id'].']' . " [Nombre:".$row['material_nombre'].']' ." [Disponible:".$row['material_stock'] .']'. " [Stock:".$row['material_estatus'].']'. " [Stock:".$row['material_estatus'].']';


}


$mpdf=new \Mpdf\Mpdf(['mode' => 'utf-8']);
$mpdf->WriteHTML($html);
$mpdf->Output(); 