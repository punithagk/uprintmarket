<?php 
$out = '';
foreach ($rows as $id => $row) {
$out .= $row;
}
if ($out) {
  if (theme_get_setting('tm_slide_show') == 1) {
    print '<div id="promo-banners"><div id="slides-pager"><div class="position"></div></div><div id="slide-show">'.$out.'</div></div>';
  } else {
    print '<div id="promo-large-banners"><div id="slides-pager"><div class="position"></div></div><div id="slide-show">'.$out.'</div></div>';
  }
}
?>