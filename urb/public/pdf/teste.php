<?php

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->SetImportUse(); // only with mPDF <8.0

$pagecount = $mpdf->SetSourceFile('logoheader.pdf');
$tplId = $mpdf->importPage($pagecount);
$mpdf->useTemplate($tplId);

$mpdf->WriteHTML('Hello World');

$mpdf->Output(); ?>