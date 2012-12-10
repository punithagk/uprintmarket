<?php print render($page['header']); ?>
<?php 
if (!isset($user->name)) $user->name = t('Anonymous');
$quantitytitle = $totaltitle = '';
/*
if ($order = commerce_cart_order_load($user->uid)) {
  $orderwrapper = entity_metadata_wrapper('commerce_order', $order);
  $quantity = commerce_line_items_quantity($orderwrapper->commerce_line_items, commerce_product_line_item_types());
  $total = commerce_line_items_total($orderwrapper->commerce_line_items, commerce_product_line_item_types());
  //$currency = commerce_currency_load($total['currency_code']);
  $totaltitle = commerce_currency_format($total['amount'], $total['currency_code']);

}
*/
$cart = retailshop_get_cart();
  if ($cart['count'] > 0) {
    $quantitytitle = format_plural($cart['count'], '1 item', '@count items');
  }
  $totaltitle = theme('uc_price', array('price' => $cart['total']));
$nn = retailshop_get_node_style(); 
if ($nn != 'n') {
	$ss = $nn;
} else {
	$ss = theme_get_setting('tm_page');
}
?>
<div id="top">
  <div id="wrap-user-border">
    <div id="wrap-user-border2">
      <div id="wrap-user">
        <div id="user-message"><?php print t('Good morning !user', array('!user' => '<strong>'.$user->name.'</strong>')) ?></div>
        <?php print retailshop_tree_top($logged_in); ?>
      </div>
    </div>
  </div>
  <div id="header">
    <div id="header-top">
      <div id="wrap-logo">
      <?php if (!empty($logo)) { ?>
        <a href="<?php print check_url($front_page); ?>"><img src="<?php print $logo; ?>" title="<?php print $site_name; ?>" alt="<?php print $site_name; ?>" /></a>
      <?php } ?>
      </div>
      <div id="wrap-header-info">
        <div id="cart">
          <div id="cart-title"><a href="<?php print url('cart'); ?>"><?php print t('Shopping cart') ?></a></div>
          <div id="cart-summarry"><?php if ($quantitytitle) { print t('Total').': <a href="'.url('cart').'" class="items">'.$quantitytitle; ?></a> <?php print t('Amout'); ?>: <span class="price"><?php print $totaltitle; ?></span><?php } else { print '<span class="price">'.t('Empty').'</span>'; } ?></div>
        </div>
        <div id="work-hours">
          <?php print render($page['contact_box']); ?>
        </div>
      </div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <div id="header-bottom">
      <?php print retailshop_top_top('menu-mobile-main-menu'); ?>
      <div id="search">
        <?php print render($page['search_box']); ?>
      </div>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
</div>
<div id="wrap-content">
  <?php print $breadcrumb; ?>
  <?php if (isset($messages)) { print '<div id="messages">'.$messages.'</div>'; } ?>
  <?php if (theme_get_setting('tm_slide_show') == 2) print render($page['slide_show']); ?> 
  <div id="main-content">
    <div id="left-column">
      <?php if ($page['sidebar_right']) { ?>
        <?php echo render($page['sidebar_right']); ?>
      <?php } ?>
    </div>
    <div id="right-column">
      <?php if (theme_get_setting('tm_slide_show') == 1) print render($page['slide_show']); ?> 
      <div id="content">
        <div id="wrap-featured-products">
          <?php if (arg(0) == 'taxonomy' and arg(1) == 'term' and is_numeric(arg(2)) or drupal_is_front_page()) { ?>
            <div class="wrap-title-black">
              <h1 class="nice-title"><?php if (drupal_is_front_page()) { print t('Featured products'); } else { print $title; } ?></h1><div class="list-type"><p>View as:</p><p><a href="<?php print url(request_path(),array('query' => array('td' => 1))) ?>"><img src="<?php print $GLOBALS['base_url'].'/'.path_to_theme() ?>/images/list-type-row.png" alt="" /></a><a href="<?php print url(request_path(),array('query' => array('td' => 0))) ?>"><img src="<?php print $GLOBALS['base_url'].'/'.path_to_theme() ?>/images/list-type-block.png" alt="" /></a></p></div>
            </div>
            <div id="<?php if ($_SESSION['retailshoptaxdisp']) { print 'inline-product-list'; } else { print 'block-product-list'; } ?>">          
              <?php if($tabs): ?><?php print render($tabs); ?><?php endif; ?>
              <?php print render($page['content']); ?>
            </div>         
          <?php } elseif (arg(0) == 'cartt') { ?>
            <div class="wrap-title-black">
              <h1 class="nice-title"><?php if (drupal_is_front_page()) { print t('Featured products'); } else { print $title; } ?></h1>
            </div>
            <div id="inline-product-list">
              <?php if($tabs): ?><?php print render($tabs); ?><?php endif; ?>
              <?php print render($page['content']); ?>
            </div>                        
          <?php } elseif (arg(0) == 'node' and is_numeric(arg(1)) and !arg(2)) { ?>            
            <?php if($tabs): ?><?php print render($tabs); ?><?php endif; ?>
            <?php print render($page['content']); ?>                      
          <?php } else { ?>
            <div class="wrap-title-black">
              <h1 class="nice-title"><?php print $title; ?></h1><div class="list-type"><p> </p></div>
            </div>
            <div id="product-content">
              <?php if($tabs): ?><?php print render($tabs); ?><?php endif; ?>
              <?php unset($page['content']['system_main']['comment_node']); ?>
              <?php print render($page['content']); ?>  
              <?php //print '<pre>'. check_plain(print_r($page, 1)) .'</pre>'; ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="footer">
  <div id="wrap-footer-links">
    <div id="footer-links">
      <div class="wrap-links">
        <?php print render($page['footer_first']); ?>
      </div>
      <div class="wrap-links">
        <?php print render($page['footer_second']); ?>
      </div>
      <div class="wrap-links">
        <?php print render($page['footer_third']); ?>
      </div>
      <div class="wrap-links">
        <?php print render($page['footer_fourth']); ?>
      </div>
    </div>
  </div>
  <div id="wrap-bottom">
    <div id="bottom">
      <?php print render($page['footer_bottom_left']); ?>
      <div class="right"><?php print render($page['footer_bottom_right']); ?></div>
    </div>
  </div>
</div>



        <?php //print retailshop_tree_cat(); ?>
