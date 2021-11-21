<?php
require_once __DIR__ .'/../vendor/autoload.php';

$html= ' <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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
      <h1>REPORTE DE MATERIALES</h1>
    </header>
    <main>
      <table>
        <thead>
          <tr>
          <th class="service" style="text-align:center;">#</th> 
          <th class="service" style="text-align:center;">Nombre</th>
          <th class="service" style="text-align:center;">Descripcion</th>
          <th class="service" style="text-align:center;">Stock</th>
          <th class="service" style="text-align:center;">Fecha Registro</th>
          <th class="service" style="text-align:center;">Estatus</th>
      
          </tr>
        </thead>
        <tbody>';
        require_once '../../../conexion_reportes/r_conexion.php';
        $consulta = /**"select * from reparacion";**/
        "SELECT * FROM material";
        $resultado = $mysqli->query($consulta);
        $contador=0;
        while($row = $resultado->fetch_assoc()){
        $contador++;
        $html.="<br>[ID:".$row['material_id'].']' . " [Nombre:".$row['material_nombre'].']' ." [Disponible:".$row['material_stock'] .']'. " [Stock:".$row['material_estatus'].']'. " [Stock:".$row['material_estatus'].']';

        $html.=' <tr>
            <td class="service">'.$contador.'</td>
            <td class="service">'.$row['material_nombre'].'</td>
            <td class="service">'.$row['material_descripcion'].'</td>
            <td class="service">'.$row['material_stock'].'</td>
            <td class="service">'.$row['material_fregistro'].'</td>
            <td class="service">'.$row['material_estatus'].'</td>';
            
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