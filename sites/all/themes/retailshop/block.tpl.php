<div id="<?php print $block_html_id; ?>" class="left-block <?php print $classes; ?>"<?php print $attributes; ?>>
 <?php print render($title_prefix); ?>
  <?php if ($block->subject) { 
    print '<h2 class="nice-title2">'.$block->subject.'</h2>'; 
    print '<div class="block-content">';// style="padding: 0px; width: 230px;"
  } else {
    print '<div class="block-content2">';
  }
  print render($title_suffix);
  print $content ?>
  </div>
</div>
<?php //print '<pre>'. check_plain(print_r($block, 1)) .'</pre>'; ?>

