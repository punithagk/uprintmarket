<div id="<?php print $block_html_id; ?>" class="footer-block <?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject) { print '<h3>'.$block->subject.'</h3>'; } print render($title_suffix).$content ?>
</div>