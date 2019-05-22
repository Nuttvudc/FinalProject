<?php
ob_start();

$filename = "pdfku.pdf";
$len = filesize($filename);
header("Content-type: application/pdf");
header("Content-Length: $len");
header("Content-Disposition: inline; filename=foo.pdf");
readfile($filename);

ob_end_flush();
?>