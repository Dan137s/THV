<?php
require_once __DIR__ .'/../vendor/autoload.php';

$html= ' <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="../../plantilla/dist/img/hc.png">
    <title> Fundación | Trato Hecho Vecino |</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
  
    <header class="clearfix">
      <div id="logo">
        <img src="../../libreporte/css/thv.png" style="width:300px">
        </br>
      </div>
      </br>
      <h1>PROPUESTA AL VECINO(A)</h1>
    </header>
    <main>
      <table>
        <thead>
          <tr>
          <th class="service" style="text-align:center;">#</th>
          <th class="service" style="text-align:center;">N° Serial</th>
            
          <th>Estatus</th>
          </tr>
        </thead>
        <tbody>';
        require_once '../../../conexion_reportes/r_conexion.php';
        $consulta = /**"select * from reparacion";**/
        "SELECT reparacion.reparacion_id, reparacion.reparacion_fregistro,reparacion.reparacion_req_vecino,reparacion.reparacion_estatus
        FROM reparacion where reparacion_id='".$_GET['id']."'";
        $resultado = $mysqli->query($consulta);
        $contador=0;
        while($row = $resultado->fetch_assoc()){
        $contador++;
        $html.="<br>[ID:".$row['reparacion_id'].']' . " [S/N:".$row['reparacion_estatus'].']' . " [Estado:".$row['herramienta_estatus'].']';
        
        $html.=' <tr>
            <td class="service">'.$contador.'</td>
            <td class="service">'.$row['reparacion_id'].'</td>
            
            <td class="service">'.$row['reparacion_estatus'].'</td>';
            
        }
         $html.=' </tr>

        </tbody>
      </table>
      <div id="notices">
        <div>OBSERVACIÓN ADICIONAL:</div>
        <div class="service"></div>
      </div>
    </main>
    <footer style="text-align:LEFT;">
    Experiencia Desarrollo Tecnológico © IP SANTO TOMÁS LA SERENA - HOGAR DE CRISTO - THV COQUIMBO. 2021 VERSION 1
      
    </footer>
    
  </body>
</html>';
$mpdf=new \Mpdf\Mpdf();
$css=file_get_contents('../../libreporte/css/style.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output(); 
