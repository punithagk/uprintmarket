<?php if (arg(1) != $fields['nid']->content) { ?>
<li>
  <div class="image">
    <?php if (isset($fields['field_image']->content)) print $fields['field_image']->content; ?>
  </div>
  <div class="info">
    <h4><?php if (isset($fields['title']->content)) print $fields['title']->content; ?></h4><br />
    <p><?php if (isset($fields['sell_price']->content)) print t('Our Price').': <strong>'.$fields['sell_price']->content.'</strong>'; ?></p>
  </div>
</li>
<?php } ?>