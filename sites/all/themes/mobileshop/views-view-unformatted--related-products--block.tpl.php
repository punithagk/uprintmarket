<?php 
$out = '';
$i = 3;
foreach ($rows as $id => $row) {
  if ($i and $row) { 
    $out .= $row;
    $i--;
  }
}
if ($out) {
  print '<ul id="related-products-nav">'.$out.'</ul>';
}
?>