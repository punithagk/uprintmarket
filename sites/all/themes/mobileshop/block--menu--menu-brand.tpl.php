<div id="<?php print $block_html_id; ?>" class="left-block <?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="wrap-title-black">
    <?php print render($title_prefix); ?>
    <?php if ($block->subject) print '<h2 class="nice-title long">'.$block->subject.'</h2>'; ?>
    <?php print render($title_suffix); ?>         
  </div>
  <div class="block-content blk22">
    <?php print str_replace(array(' active-trail', 'active-trail', '<ul>', 'first ', 'last ', ' class="leaf"', ' class="expanded"><a', ' class="leaf"', '</a><ul class="menu">', ' class="collapsed"'),array('','','<ul class="menu">','','','','><a class="extends"','','</a><ul class="subcategory">', ''),$content); ?>
  </div>
</div>
<?php //print '<pre>'. check_plain(print_r($block, 1)) .'</pre>'; ?>
