<?php
$filePath="uploads/books/";
$filename=$filePath.$_GET['fn'];
header('Content-type:application/pdf');
header('Content-disposition: inline; filename="'.$filename.'"');
header('content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
echo file_get_contents($filename);
?>