<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div id="wrap-categories">
    <div class="wrap-title-black">
      <?php print render($title_prefix); ?>
      <?php if ($block->subject) print '<h2 class="nice-title">'.$block->subject.'</h2>'; ?>
      <?php print render($title_suffix); ?>
      <div class="expanded"></div>
    </div>
    <?php print str_replace(array(' active-trail', 'active-trail', '<ul>', 'first ', 'last ', ' class="leaf"', ' class="expanded"><a', ' class="leaf"', '</a><ul id="category-menu">', ' class="collapsed"', 'class="active"','class=" active"'),array('','','<ul id="category-menu">','','','','><a class="extends"','','</a><ul class="subcategory">', '', 'id="cactive"', 'id="cactive"'),$content); ?>
    <?php //print $content; ?>
  </div>
</div>
<?php //print '<pre>'. check_plain(print_r($block, 1)) .'</pre>'; ?>
