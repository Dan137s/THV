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
      <h1>PROPUESTA AL VECINO(A).</h1>
    </header>
    <main>
    <div id="notices">
        <div>SOLICITUD:</div>
        <div class="service"></div>
      </div>
    <hr>
      <table>
        <thead>
          <tr>
          <th class="service" style="text-align:center;">Ticket de solicitud</th>
          <th class="service" style="text-align:center;">Reparación</th>
          <th class="service" style="text-align:center;">Descripción</th>
          <th>Estatus</th>
          </tr>
        </thead>
        <tbody>';
        require_once '../../../conexion_reportes/r_conexion.php';
        $consulta = /**"select * from reparacion";**/
        "SELECT reparacion.reparacion_id,reparacion.reparacion_nombre, reparacion.reparacion_descripcion,reparacion.reparacion_fregistro,reparacion.reparacion_req_vecino,reparacion.reparacion_estatus
        FROM reparacion where reparacion_id='".$_GET['id']."'";
        $resultado = $mysqli->query($consulta);
        while($row = $resultado->fetch_assoc()){
        $html.="<br>[ID:".$row['reparacion_id'].']' . " [S/N:".$row['reparacion_nombre'].']' . " [Estado:".$row['reparacion_descripcion'].']' . " [Estado:".$row['reparacion_estatus'].']';
        $html.=' <tr>
            <td class="service" style="text-align:center;">'.$row['reparacion_id'].'</td>
            <td class="service" style="text-align:center;">'.$row['reparacion_nombre'].'</td>
            <td class="service" style="text-align:center;">'.$row['reparacion_descripcion'].'</td>
            <td class="service" style="text-align:center;">'.$row['reparacion_estatus'].'</td>';
        }
         $html.=' </tr>

        </tbody>
      </table>
      <br>

      <div id="notices">
      <div>PROPUESTA DE THV:</div>
      <div class="service"></div>
    </div>
<hr>
      <table>
      <thead>
        <tr>
        <th class="service" style="text-align:center;">Herramientas solicitadas</th>
        <th class="service" style="text-align:center;">Solicitud al vecino</th>
        <th class="service" style="text-align:center;">Jornada de trabajo</th>
        <th> Cantidad personal</th>
        </tr>
      </thead><br>
      <tbody>';
      require_once '../../../conexion_reportes/r_conexion.php';
      $consulta = /**"select * from reparacion";**/
      "SELECT reparacion.reparacion_insu_herra,reparacion.reparacion_nombre,reparacion.reparacion_req_vecino, reparacion.reparacion_nivel,reparacion.reparacion_cantidad_personas,reparacion.reparacion_req_vecino,reparacion.reparacion_estatus
      FROM reparacion where reparacion_id='".$_GET['id']."'";
      $resultado = $mysqli->query($consulta);
      while($row = $resultado->fetch_assoc()){
      $html.="<br>[ID:".$row['reparacion_insu_herra'].']' . " [S/N:".$row['reparacion_req_vecino'].']' . " [Estado:".$row['reparacion_nivel'].']' . " [Estado:".$row['reparacion_cantidad_personas'].']';
      $html.=' <tr>
          <td class="service" style="text-align:center;">'.$row['reparacion_insu_herra'].'</td>
          <td class="service" style="text-align:center;">'.$row['reparacion_req_vecino'].'</td>
          <td class="service" style="text-align:center;">'.$row['reparacion_nivel'].'</td>
          <td class="service" style="text-align:center;">'.$row['reparacion_cantidad_personas'].'</td>';
      }
       $html.=' </tr>

      </tbody>
    </table>
    <hr>
      <div id="notices">
        <div style="text-align:center;" >OBSERVACIÓN ADICIONAL:</div>
        <div  class="service" ></div>
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
