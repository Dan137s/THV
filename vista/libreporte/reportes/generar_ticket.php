<?php
require_once __DIR__ .'/../vendor/autoload.php';
require_once '../../../conexion_reportes/r_conexion.php';

$consulta = /**"select * from reparacion";**/
"SELECT reparacion.reparacion_id, reparacion.reparacion_fregistro
FROM reparacion where reparacion_id='".$_GET['id']."'";

$html="<style>
.barcode {
    padding: 1.5mm;
    margin: 0;
    vertical-align: top;
    color: black;
}
.barcodecell {
    text-align: center;
    vertical-align: middle;
}
</style>



<table style='border-collapse:collapse' border ='1'>
    <tr>
    <td style='border-bottom:1px solid;border-left:0px;border-right:0px;border-top:0px;'> <h2 style='font-size:14px;'>SOLICITUD REPARACION</h2> </td>
    </tr>
</table>";

$resultado = $mysqli->query($consulta);
while($row = $resultado->fetch_assoc()){

    $html.="
    <br><b>N° Ticket:</b> ".$row['reparacion_id']."<br>
    <br><b>Fecha:</b> ".$row['reparacion_fregistro']."<br>
    .............................................
    <table>
    <tr>
    <td style=text-align:center><b>!Gracias por confiar en nosotros...!<br></b>
    </td>
    </tr>
    </table>

   
    Trato Hecho Vecino 2021
 
<div class='barcodecell'><barcode code='".$row['reparacion_id']."' type='I25' class='barcode' /><br>".$row['reparacion_id']."</div>";

}
$mpdf=new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>[80, 150]]);
$mpdf->WriteHTML($html);
$mpdf->Output(); 