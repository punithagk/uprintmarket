<div id="<?php print $block_html_id; ?>" class="left footer-block-left <?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix).$content; ?>
</div>
<?php //print '<pre>'. check_plain(print_r($block, 1)) .'</pre>'; ?>

