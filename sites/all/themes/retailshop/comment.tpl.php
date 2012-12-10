<div class="s_review">
  <p class="s_author"><strong><?php print theme('username', array('account' => $content['comment_body']['#object'])) ?></strong> <small>(<?php print format_date($content['comment_body']['#object']->created); ?>)</small></p>
  <div class="clear"></div>
  <div class="right">
  <?php print $picture ?>
  </div>
  <p><?php hide($content['links']); print render($content) ?></p>
  <?php print render($content['links']) ?>
</div>