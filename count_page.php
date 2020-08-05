<?php
$filePath="uploads/books/";
$path=$filePath."235030-Silent Spring by Rachel Carson.pdf";                                              
$totoalPages = countPages($path);
 
echo $totoalPages;
 
function countPages($path) {

  $pdftext = file_get_contents($path);
  $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);

  return $num;
}
  



?>