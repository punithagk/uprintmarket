<?php 
if (isset($node->field_image) and is_array($node->field_image) and count($node->field_image)) {
$ar1 = each ($node->field_image);
}
if ($ar1['key']) {
  $language = $ar1['key'];
} else {
  $language = $node->language;
}

if (!$page) {

  if ($_SESSION['retailshoptaxdisp']) {  ?>
  <div class="prd">
    <div class="product-photo"><a href="<?php print $node_url; ?>" title="<?php print $node->field_image[$language][0]['title'] ?>"><?php print theme('image_style', array('style_name' => 'product-image-small-teaser-1', 'path' => $node->field_image[$language][0]['uri'], 'alt' => $node->field_image[$language][0]['alt'], 'title' => $node->field_image[$language][0]['title'], 'attributes' => array(),'getsize' => false) );?></a></div>
    <div class="product-info">
    <h3><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
    <p><?php print strip_tags(render($content['field_model'])).' | '.strip_tags(render($content['model'])) ?><br/><br/><a href="<?php print $node_url; ?>"><?php print t('Details') ?></a></p>
  </div>
  <div class="product-reviews">
    <p><?php print t('Customer reviews') ?>:</p>
    <div class="wrap-rating">
      <?php print render($content['rate_voting']) ?>
    </div>
    <p><?php print t('Reviews (!count)', array('!count' => $node->comment_count)) ?></p>
  </div>
  <div class="product-price"> 
    <p><?php print strip_tags(render($content['display_price'])) ?></p>
    <p><?php print render($content['add_to_cart']) ?></p>
  </div>
  </div>

<?php } else { ?>
<div class="prd">
  <div class="product-name">
    <h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  </div>
  <div class="product-photo"><a href="<?php print $node_url; ?>" title="<?php print $node->field_image[$language][0]['title'] ?>"><?php print theme('image_style', array('style_name' => 'product-image-small-teaser-2', 'path' => $node->field_image[$language][0]['uri'], 'alt' => $node->field_image[$language][0]['alt'], 'title' => $node->field_image[$language][0]['title'], 'attributes' => array(),'getsize' => false) );?></a></div>
  <div class="product-info">
    <div class="first-row">
      <?php if ($field_old_price = strip_tags(render($content['field_oldprice']))) { ?>
      <div class="oldprice"><?php print t('Old Price') ?>: <span><?php print theme('uc_price', array('price' => $field_old_price)); ?></span></div>
      <?php } else { ?>
      <div class="oldprice">&nbsp;</div>
      <?php } ?>
      <div class="details"><a href="<?php print $node_url; ?>"><?php print t('Details') ?></a></div>
    </div>
    <div class="second-row">
      <div class="addcart"><?php print render($content['add_to_cart']) ?></div>
      <div class="price"><?php print strip_tags(render($content['display_price'])) ?></div>
      
    </div>
  </div>
</div>
<?php } ?>

<?php } else { ?>
<div class="wrap-title-black">
  <h1 class="nice-title"><?php print $title; ?></h1><div class="list-type"><p><?php if ($ad = render($content['my_additional_field'])) print $ad; ?></p></div>
  <div class="secondrow">
  <div class="wrap-tabs">
  <!--
    <div class="tabs">
      <a id="tab1" href="#" class="active"><?php print t('Features') ?></a>
      <a id="tab2" href="#"><?php print t('Ideas') ?></a>
    </div>
    <div class="wrap-tabs-content">
      <div id="tab1-content" class="wrap-tab-content">
        
      </div>
      <div id="tab2-content" style="display:none;" class="wrap-tab-content">
        
      </div>
      
    </div>
  -->
	<ul class="tabs product-top-tabs">
	<li class="active"><a class="active" href="#">Features<span class="element-invisible">(active tab)</span></a></li>
	<li><a href="#">Ideas</a></li>
	<li><a href="#">Paper & Specs</a></li>
	<li><a href="#">Mailing</a></li>
	<li><a href="#">Templates</a></li>
	</ul>
  </div> 
  </div>
</div>
<div id="product-content">
<div class="firstrow">
  <div class="wrap-images">
    <div class="bigimage">
      <a href="<?php print file_create_url($node->field_image[$language][0]['uri']); ?>" title="<?php print $node->field_image[$language][0]['title'] ?>"><?php print theme('image_style', array('style_name' => 'product-image-big', 'path' => $node->field_image[$language][0]['uri'], 'alt' => $node->field_image[$language][0]['alt'], 'title' => $node->field_image[$language][0]['title'], 'attributes' => array('class' => 'zoom'),'getsize' => false) );?></a>
    </div>
    
  </div>
</div>
<div class="secondrow">
  <div class="wrap-special-info">
		<div class="right">
			<div class="add-product-cart">
			  <?php if ($old_price = strip_tags(render($content['field_oldprice']))) { ?>
				<div class="oldprice"><div class="l"><?php print t('Was') ?>:</div><div class="r"><?php print theme('uc_price', array('price' => $old_price)); ?></div></div>
				<div class="oldprice"><div class="l"><?php print t('Client savings') ?>:</div><div class="r"><?php print theme('uc_price', array('price' => $old_price - $content['display_price']['#value'])) ?></div></div>
			  <?php } ?>
			  
			  <?php print render($content['add_to_cart']) ?>
			  <div class="currentprice"><div class="l"><?php print t('Total price') ?>:</div><div class="r"><?php print strip_tags(render($content['display_price'])) ?></div></div>
			</div>
		</div>
  </div>
  <div class="wrap-product-short" >
	
    <h2><?php print $title; ?></h2>
    <h3><?php print strip_tags(render($content['field_model'])) ?></h3>
    <div class="summary"><?php print render($content['field_shortdescription']) ?></div>
    <div class="wrap-special-info">
      <div class="left">
		<p><?php print t('Share') ?>: <span><?php print render($content['sharethis']);?></span></p>
        <p><?php print t('Customer reviews') ?>:</p>
        <div class="wrap-rating">
          <?php print render($content['rate_voting']) ?>
        </div>
        <?php if ($node->comment_count) { ?>
          <p><a id="tabreviews" href="#tab4"><?php print t('Reviews (!count)', array('!count' => $node->comment_count)) ?></a></p>
        <?php } else { ?>
          <p><?php print t('Reviews (!count)', array('!count' => $node->comment_count)) ?></p>
        <?php } ?>
        <p><a href="<?php print url('comment/reply/'.$node->nid/*, array('fragment' => 'comment-form')*/) ?>"><?php print t('Add a review') ?></a></p>
      </div>
	  <div class="right">
		<div class="orderpage-all-btn">           
		<!-- Start Design/Banner Tool -->
		<strong class="getStarted"> Get Started</strong>
		<div>
		<div class="orderpage-btn-rev1">				
		<a onclick="submitOrderSpecs('j',44,0)" rel="nofollow">	                     
		<span class="left"><span class="orderup">&nbsp;</span></span>		
		<span class="desc"> <span class="bluetext">Upload Your File &amp; Order Now</span> <em>Configure and select proof options.</em> </span>	
		</a>                
		</div>
		<div class="orderpage-btn-rev1">				
		<a onclick="submitOrderSpecs('p',44,0)" rel="nofollow"> 
		<span class="left"><span class="orderffr">&nbsp;</span></span>
		<span class="desc"> <span class="bluetext">Start with a FREE Proof</span> <em>Get file review. No credit card required.</em> </span>
		</a>                
		</div>
		</div>
		<!-- End PO/FFR Button -->  
		<span><a onclick="parent.jQuery.colorbox({width:&quot;500px&quot;, height:&quot;450px&quot;, iframe:true, scrolling:false, href:&quot;/live-chat.html&quot;});"><span style="width:150px;">Need Help Ordering?</span></a></span>                       
		</div>
	  </div>
    </div>
  </div>
</div>

<div class="secondrow">
  <?php
    hide($content['field_image']);
    hide($content['field_warranty']);
    hide($content['field_details']);
    hide($content['comments']);
    hide($content['links']);
    $rcontent = render($content);
    $rfield_details = render($content['field_details']);
    $rfield_warranty = render($content['field_warranty']);
  ?>
  <div class="wrap-tabs">
    <div class="tabs">
      <?php if (strip_tags($rcontent)) { ?><a id="tab1" href="#" class="active"><?php print t('Description') ?></a><?php } ?>
      <?php if (strip_tags($rfield_details)) { ?><a id="tab2" href="#"><?php print t('Details') ?></a><?php } ?>
      <?php if (strip_tags($rfield_warranty)) { ?><a id="tab3" href="#"><?php print t('Warranty') ?></a><?php } ?>
      <?php if ($node->comment_count) { ?><a id="tab4" href="#"><?php print t('Reviews') ?></a><?php } ?>
    </div>
    <div class="wrap-tabs-content">
      <div id="tab1-content" class="wrap-tab-content">
        <?php print $rcontent ?>
      </div>
      <div id="tab2-content" style="display:none;" class="wrap-tab-content">
        <?php print $rfield_details ?>
      </div>
      <div id="tab3-content" style="display:none;" class="wrap-tab-content">
        <?php print $rfield_warranty ?>
      </div>
      <div id="tab4-content" style="display:none;" class="wrap-tab-content">
        <?php print render($content['comments']); ?>        
      </div>
    </div>
  </div>              
  <?php
    $name = 'related_products';
    $display_id = 'block';
    if ($view = views_get_view($name)) {
      if ($view->access($display_id)) {
        $output = $view->execute_display($display_id);
        $view->destroy();
	      print '<div class="wrap-related"><h3>'.t('Related Products').'</h3>'.$output['content'].'</div>';
      }
      $view->destroy();
    }
  ?>   
</div>
</div>
<?php } ?>
<?php //print '<pre>'. check_plain(print_r($content, 1)) .'</pre>'; ?>
