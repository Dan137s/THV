<?php
require_once __DIR__ .'/../vendor/autoload.php';

$html= ' <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
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
          <th>#</th> 
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Stock</th>
          <th>Fecha Registro</th>
          <th>Estatus</th>
      
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
            <td class="desc">'.$row['material_nombre'].'</td>
            <td class="unit">'.$row['material_descripcion'].'</td>
            <td class="qty">'.$row['material_stock'].'</td>
            <td class="total">'.$row['material_fregistro'].'</td>
            <td class="total">'.$row['material_estatus'].'</td>';
            
        }
         $html.=' </tr>

        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>';
$mpdf=new \Mpdf\Mpdf();
$css=file_get_contents('../../libreporte/css/style.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output(); 