<div class="prd">
  <div class="product-photo"><?php print $fields['edit_delete']->content; ?></div>
  <div class="product-info">
    <h3><?php if (isset($fields['line_item_title']->content)) print $fields['line_item_title']->content; ?></h3>
    <p><?php if (isset($fields['line_item_title']->content)) print 'Model: '.$fields['field_model']->content.' | '; ?>SKU: <?php print $fields['sku']->content; ?><br/><br/>Price: <?php if (isset($fields['commerce_unit_price']->content)) print $fields['commerce_unit_price']->content; ?></p>
  </div>
  <div class="product-price2">                
    <span>Total:</span>
    <p><?php if (isset($fields['commerce_total']->content)) print $fields['commerce_total']->content; ?></p>
  </div>
  <div class="product-update">
    <div>
      <span>Qty:</span><?php print $fields['edit_quantity']->content; ?>
    </div>
    <div class="links"></div>
  </div>
</div>