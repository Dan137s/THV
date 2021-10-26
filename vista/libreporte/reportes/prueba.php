<?php
require_once __DIR__ .'/../vendor/autoload.php';
require_once __DIR__ .'../../../vendor/autoload.php';

$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>hello world</h1>');
$mpdf->Output();