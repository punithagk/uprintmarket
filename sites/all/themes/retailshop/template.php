<?php
// $Id$

if (!isset($_SESSION['retailshoptaxdisp'])) {
  $_SESSION['retailshoptaxdisp'] = false;
} else {
  if (isset($_GET['td'])) {
    $_SESSION['retailshoptaxdisp'] = $_GET['td'];
  }
}

drupal_add_js('
jQuery( function($) {
  $(\'#wrap-back-office .expanded\').click(function() {
    if($("ul#back-office-menu").css("display") == \'none\'){
      $(\'#wrap-back-office .expanded\').css("background", "url('.$GLOBALS['base_url'].'/'.path_to_theme().'/images/cat-expanded-icon.png) no-repeat center center");
      $("ul#back-office-menu").show();
    }
    else{
      $(\'#wrap-back-office .expanded\').css("background", "url('.$GLOBALS['base_url'].'/'.path_to_theme().'/images/cat-collapsed-icon.png) no-repeat center center");
      $("ul#back-office-menu").hide();
    }
  });


  $("ul#back-office-menu li").each(function(){
    if ($(this).find("#cactive").length > 0) {
      $(this).find(\'a.extends\').css("background", "#EEB900 url('.$GLOBALS['base_url'].'/'.path_to_theme().'/images/submenu-arrow.png) no-repeat 210px center");
      $(this).find(\'a.extends\').css("color", "#363031");
      $(this).find("ul.subcategory").css("display","block");
    }
  });
});
', array('type' => 'inline', 'scope' => 'footer', 'weight' => 5));


drupal_add_js('
jQuery( function($) {
  $(\'#wrap-categories .expanded\').click(function() {
    if($("ul#category-menu").css("display") == \'none\'){
      $(\'#wrap-categories .expanded\').css("background", "url('.$GLOBALS['base_url'].'/'.path_to_theme().'/images/cat-expanded-icon.png) no-repeat center center");
      $("ul#category-menu").show();
    }
    else{
      $(\'#wrap-categories .expanded\').css("background", "url('.$GLOBALS['base_url'].'/'.path_to_theme().'/images/cat-collapsed-icon.png) no-repeat center center"); 
      $("ul#category-menu").hide();
    }
  });

  
  $("ul#category-menu li").each(function(){
    if ($(this).find("#cactive").length > 0) {
      $(this).find(\'a.extends\').css("background", "#EEB900 url('.$GLOBALS['base_url'].'/'.path_to_theme().'/images/submenu-arrow.png) no-repeat 210px center"); 
      $(this).find(\'a.extends\').css("color", "#363031"); 
      $(this).find("ul.subcategory").css("display","block");
    }
  });
});
', array('type' => 'inline', 'scope' => 'footer', 'weight' => 5));

if (theme_get_setting('tm_slide_show') == 1) {
drupal_add_js('
jQuery( function($) {
  $(\'#promo-banners #slide-show\').cycle({
    fx:     \'fade\', 
    height: 300,
    timeout: 10000, 
    pager:  \'#slides-pager .position\' 
  });
});
', array('type' => 'inline'));
} else { 
drupal_add_js('
jQuery( function($) {
  $(\'#promo-large-banners #slide-show\').cycle({
    fx:     \'fade\', 
    height: 300,
    timeout: 10000, 
    pager:  \'#slides-pager .position\' 
  });
});
', array('type' => 'inline'));
}

function retailshop_get_cart() {

	$product_count = uc_cart_get_contents();
  $items = FALSE;
  $item_count = 0;
  $total = 0;
  if ($product_count) {
    foreach ($product_count as $item) {
      $display_item = module_invoke($item->module, 'uc_cart_display', $item);
      if (!empty($display_item)) {
        $total += $display_item['#total'];
      }
      $item_count += $item->qty;
          //drupal_set_message('<pre>'. check_plain(print_r($total, 1)) .'</pre>');
    }
  }
  return array('count' => $item_count, 'total' => $total);
}

function retailshop_breadcrumb($breadcrumb) {
  //drupal_set_message('<pre>'. check_plain(print_r($breadcrumb, 1)) .'</pre>');
  if (!empty($breadcrumb['breadcrumb'])) {
	  $out = array();
    $a = TRUE;
	  foreach ($breadcrumb['breadcrumb'] as $data) {
      if ($a) {
        $out[] = str_replace('<a ', '<a class="breadcrumbHome" ', $data);
        $a = FALSE;
      } else {
		    $out[] = $data;
      }
	  }
	  return '<div id="breadcrumb">'. implode ('<span class="seperator"> &nbsp; </span>', $out) .'</div>';
  } else {
    return '<div id="nobreadcrumb">&nbsp;</div>';
  }
}

/* Top Menu */
function retailshop_tree_top($logged_in) {
  static $menu_output = array();
  $menu_name = 'main-menu';
  $type = '';
  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = retailshop_tree_output_top($tree,$type,$logged_in);
  }
  return $menu_output[$menu_name];
}


function retailshop_tree_output_top($tree,$type,$logged_in) {
  global $user;
  $output = $output1 = '';
  if (!$logged_in) { 
    $output1 .= '<li>'.l(t('Sign Up'),'user/register').'</li>';
    $output1 .= '<li>'.l(t('Log in'),'user').'</li>';
  } else {
    $output1 .= '<li>'.l(t('My account'),'user/'.$user->uid).'</li>';
    $output1 .= '<li>'.l(t('Log out'),'user/logout').'</li>';
  }

  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  $s = '';
  foreach ($items as $i => $data) {
	  //drupal_set_message('<pre>'. check_plain(print_r($data, 1)) .'</pre>');
	  //$s .= '<pre>'. check_plain(print_r($data, 1)) .'</pre>';
	  if ($data['link']['in_active_trail']) $a = ' class="active"'; else $a = '';
	  $output .= '<li'.$a.'><a href="'.url($data['link']['href']).'"><span>'.$data['link']['title'].'</span></a>'."</li>";
  }
  return $output ? '<ul id="user-menu">'. $output . $output1 . '</ul>'.$s : '';
}

/* Top Menu */
function retailshop_top_top($menu_name = 'menu-top', $type = 'header-menu') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = retailshop_tree_output_top_top($tree,$type);
  }
  return $menu_output[$menu_name];
}


function retailshop_tree_output_top_top($tree,$type) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  $s = '';
  foreach ($items as $i => $data) {
	  //drupal_set_message('<pre>'. check_plain(print_r($data, 1)) .'</pre>');
	  //$s .= '<pre>'. check_plain(print_r($data, 1)) .'</pre>';
	  if ($data['link']['in_active_trail']) { 
      $a = ' class="active"'; 
    } elseif ($data['link']['href'] == $_GET['q']) {
      $a = ' class="active"';
    } elseif (drupal_is_front_page() and $data['link']['href'] == '<front>') {
      $a = ' class="active"';
    } else {
      $a = ' class="inactive"';
    }
	  $output .= '<li><a href="'.url($data['link']['href']).'"'.$a.'>'.$data['link']['title'].'</a>'."</li>";
  }
  return $output ? '<ul id="'.$type.'">'. $output .'</ul>'.$s : '';
}


/* Top Categories */
function retailshop_tree_cat($menu_name = 'menu-top-categories', $type = '') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = retailshop_tree_output_cat($tree,$type);
  }
  return $menu_output[$menu_name];
}


function retailshop_tree_output_cat($tree,$type) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  $s = '';
  foreach ($items as $i => $data) {
    //$s .= '<pre>'. check_plain(print_r($data, 1)) .'</pre>';
	  if ($data['link']['in_active_trail']) $a = ' class="active"'; else $a = '';
    if ($data['link']['link_path'] == '<front>') $d = ' id="menu_home"'; else $d = '';
    if ($data['below']) {
	  $output .= '<li'.$a.$d.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>' . retailshop_tree_output2_cat($data['below']) ."</li>";
    }
    else {
	  $output .= '<li'.$a.$d.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>";
    }
  }
  return $output ? '<ul>'. $output .'</ul>'.$s : '';
}

function retailshop_tree_output2_cat($tree) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }
  $num_items = count($items);
  foreach ($items as $i => $data) {
	  if ($data['link']['in_active_trail']) $a = ' class="current"'; else $a = '';
	if ($data['below']) {
		$output .= '<li'.$a.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'.retailshop_tree_output3_cat($data['below'])."</li>";
	}
    else {
	  $output .= '<li'.$a.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>";
    }
  }
  return $output ? '<div class="s_submenu">&nbsp;<ul class="s_list_1 clearfix">'. $output .'</ul></div>' : '';
}

function retailshop_tree_output3_cat($tree) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }
  $num_items = count($items);
  foreach ($items as $i => $data) {
	  if ($data['link']['in_active_trail']) $a = ' class="current"'; else $a = '';
	  $output .= '<li'.$a.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>";
  }
  return $output ? '<ul class="s_list_1 clearfix">'. $output .'</ul>' : '';
}

/* Bottom Menu */
function retailshop_tree_bottom($menu_name = 'menu-footer-menu', $type = 'footer-menu') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = retailshop_tree_output_bottom($tree,$type);
  }
  return $menu_output[$menu_name];
}


function retailshop_tree_output_bottom($tree,$type) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  $s = '';
  foreach ($items as $i => $data) {
	  //drupal_set_message('<pre>'. check_plain(print_r($data, 1)) .'</pre>');
	  //$s .= '<pre>'. check_plain(print_r($data, 1)) .'</pre>';
	  if ($data['link']['in_active_trail']) $a = ' class="active"'; else $a = '';
	  $output .= '<li'.$a.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>";
  }
  return $output ? '<ul class="'.$type.'">'. $output .'</ul>'.$s : '';
}


function retailshop_pager($variables) {


  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  //$li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => '', 'element' => $element, 'interval' => 1, 'parameters' => $parameters, 'attributes' => array('class' => 'previous-button')));
  $li_next = theme('pager_next', array('text' => '', 'element' => $element, 'interval' => 1, 'parameters' => $parameters, 'attributes' => array('class' => 'next-button')));
  //$li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    /*if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
      );
    }*/
    if ($li_previous) {
      $items[] = $li_previous;
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = '…';
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i == $pager_max) {
          $items[] = theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters, 'attributes' => array('class' => 'last')));
        } else {
          if ($i < $pager_current) {
            $items[] = theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters, 'attributes' => array()));
          }
          if ($i == $pager_current) {
            $items[] = theme('pager_link', array('text' => $i, 'element' => $element, 'interval' => ($pager_current), 'parameters' => $parameters, 'attributes' => array()));
          }
          if ($i > $pager_current) {
            $items[] = theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters, 'attributes' => array()));
          }
        }
      }
      if ($i < $pager_max) {
        $items[] = '…';
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = $li_next;
    }
    /*if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
      );
    }*/
    return '<div id="wrap-pages"'.($_SESSION['retailshoptaxdisp'] ? '' : ' class="round"').'><div class="left">'.t('Page !pager_current of !pager_max',array('!pager_max' => $pager_max, '!pager_current' => $pager_current)).'</div><div class="right">' . implode('',$items).'</div></div>';

  }
  
}


function retailshop_pager_previous($variables) {
  $text = $variables['text'];
  $element = $variables['element'];
  $interval = $variables['interval'];
  $parameters = $variables['parameters'];
  $attributes = $variables['attributes'];
  global $pager_page_array;
  $output = '';

  if ($pager_page_array[$element] > 0) {
    $page_new = pager_load_array($pager_page_array[$element] - $interval, $element, $pager_page_array);
      $output = theme('pager_link', array('text' => $text, 'page_new' => $page_new, 'element' => $element, 'parameters' => $parameters, 'attributes' => $attributes));
  }

  return $output;
}

function retailshop_pager_next($variables) {
  $text = $variables['text'];
  $element = $variables['element'];
  $interval = $variables['interval'];
  $parameters = $variables['parameters'];
  $attributes = $variables['attributes'];
  global $pager_page_array, $pager_total;
  $output = '';

  if ($pager_page_array[$element] < ($pager_total[$element] - 1)) {
    $page_new = pager_load_array($pager_page_array[$element] + $interval, $element, $pager_page_array);
      $output = theme('pager_link', array('text' => $text, 'page_new' => $page_new, 'element' => $element, 'parameters' => $parameters, 'attributes' => $attributes));
  }

  return $output;
}

function retailshop_menu_tree($tree) {
  return '<ul>'. $tree['tree'] .'</ul>';
}

/**
 * Generate the HTML output for a menu item and submenu.
 *
 * @ingroup themeable
 */
 
function retailshop_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  return '<li>'. $link . $menu ."</li>\n";
}


/* Node */
function retailshop_get_node($type = 'type') {
	static $node = false;
	if (!$node and arg(0) == 'node' and is_numeric(arg(1))){
		$node = db_fetch_array(db_query('SELECT * FROM {node} where nid = %d',arg(1)));
	}	
  return $node[$type];
}

function retailshop_get_node_style() {
	static $node = false;
	if (!isset($node) and arg(0) == 'node' and is_numeric(arg(1)) and !arg(2)){
		$node = node_load(arg(1));
		return $node->field_style[0]['value'];
	} else {
		return 'n';
	} 
}

function retailshop_get_tax_link($vid = 1) {
	$out = '';
	$result = db_query('SELECT * FROM {term_data} where vid = %d',$vid);
	while ($term = db_fetch_object($result)) {
		$out .= l($term->name, 'taxonomy/term/'.$term->tid).' ';
	}	
  return $out;
}

function retailshop_truncate_utf8($string, $len, $wordsafe = FALSE, $dots = FALSE, &$ll = 0) {

  if (drupal_strlen($string) <= $len) {
    return $string;
  }

  if ($dots) {
    $len -= 4;
  }

  if ($wordsafe) {
    $string = drupal_substr($string, 0, $len + 1); // leave one more character
    if ($last_space = strrpos($string, ' ')) { // space exists AND is not on position 0
      $string = substr($string, 0, $last_space);
      $ll = $last_space;
    }
    else {
      $string = drupal_substr($string, 0, $len);
	  $ll = $len;
    }
  }
  else {
    $string = drupal_substr($string, 0, $len);
	$ll = $len;
  }

  if ($dots) {
    $string .= ' ...';
  }

  return $string;
}


