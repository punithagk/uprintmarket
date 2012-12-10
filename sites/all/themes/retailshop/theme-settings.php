<?php

function retailshop_form_system_theme_settings_alter(&$form, $form_state) {

  $form['advansed_theme_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Advansed Theme Settings'),
  );

  $form['advansed_theme_settings']['tm_slide_show'] = array(
    '#type' => 'select',
    '#title' => t('Slide show'),
    '#default_value' => theme_get_setting('tm_slide_show'),
    '#options' => array(
        '1' => t('Normal'),
        '2' => t('Large'),
    ),
  );
  
/*
  $form['advansed_theme_settings']['tm_texture'] = array(
    '#type' => 'select',
    '#title' => t('Texture'),
    '#default_value' => theme_get_setting('tm_texture'),
    '#options' => array(
        'texture_1' => t('Squares'),
        'texture_2' => t('Noise'),
        'texture_3' => t('Rough'),
        '0' => t('No texture')
    ),
  );

  $form['advansed_theme_settings']['tm_twitter'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter'),
    '#default_value' => theme_get_setting('tm_twitter'),
    '#size' => 32,
  );

  $form['advansed_theme_settings']['tm_facebook'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook'),
    '#default_value' => theme_get_setting('tm_facebook'),
    '#size' => 32,
  );

  $form['#submit'][] = 'retailshop_form_system_theme_settings_alter_submit';
  */
}

/*

function retailshop_form_system_theme_settings_alter_submit(&$form, &$form_state) {
$retailshop_color_themes = array(
        'theme1' => array(
            'main_color'             => '4cb1ca',
            'secondary_color'        => 'f12b63',
            'intro_color'            => 'e6f6fa',
            'intro_text_color'       => '103e47',
            'intro_title_color'      => '4cb1ca',
            'price_color'            => '4cb1ca',
            'price_text_color'       => 'ffffff',
            'promo_price_color'      => 'f12b63',
            'promo_price_text_color' => 'ffffff',
            'background_color'       => 'edf3f5',
            'texture'                => 'texture_3'
        ),
        'theme2' => array(
            'main_color'             => '71b013',
            'secondary_color'        => 'ff9900',
            'intro_color'            => 'dcf5ce',
            'intro_text_color'       => '385217',
            'intro_title_color'      => '65a819',
            'price_color'            => 'bfe388',
            'price_text_color'       => '395215',
            'promo_price_color'      => 'ff9900',
            'promo_price_text_color' => 'ffffff',
            'background_color'       => 'f9fff2',
            'texture'                => 'texture_2'
        ),
        'theme3' => array(
            'main_color'             => 'ff8c00',
            'secondary_color'        => '40aebd',
            'intro_color'            => 'ffecc7',
            'intro_text_color'       => '574324',
            'intro_title_color'      => 'f27100',
            'price_color'            => 'f5c275',
            'price_text_color'       => '4d3b17',
            'promo_price_color'      => '40aebd',
            'promo_price_text_color' => 'ffffff',
            'background_color'       => 'fffceb',
            'texture'                => 'texture_1'
        ),
        'theme4' => array(
            'main_color'             => 'b3a97d',
            'secondary_color'        => '4cb1ca',
            'intro_color'            => 'f0eddf',
            'intro_text_color'       => '8a8577',
            'intro_title_color'      => '7a7153',
            'price_color'            => 'e3dcbf',
            'price_text_color'       => '4d4938',
            'promo_price_color'      => '4cb1ca',
            'promo_price_text_color' => 'ffffff',
            'background_color'       => 'f7f5ef',
            'texture'                => 'texture_1'
        )
    );

  if ($form_state['values']['tm_color_scheme']) {
    $form_state['values']['tm_main_color'] = $retailshop_color_themes[$form_state['values']['tm_color_scheme']]['main_color'];
    $form_state['values']['tm_secondary_color'] = $retailshop_color_themes[$form_state['values']['tm_color_scheme']]['secondary_color'];
    $form_state['values']['tm_intro_color'] = $retailshop_color_themes[$form_state['values']['tm_color_scheme']]['intro_color'];
    $form_state['values']['tm_intro_text_color'] = $retailshop_color_themes[$form_state['values']['tm_color_scheme']]['intro_text_color'];
    $form_state['values']['tm_intro_title_color'] = $retailshop_color_themes[$form_state['values']['tm_color_scheme']]['intro_title_color'];
    $form_state['values']['tm_price_color'] = $retailshop_color_themes[$form_state['values']['tm_color_scheme']]['price_color'];
    $form_state['values']['tm_price_text_color'] = $retailshop_color_themes[$form_state['values']['tm_color_scheme']]['price_text_color'];
    $form_state['values']['tm_promo_price_color'] = $retailshop_color_themes[$form_state['values']['tm_color_scheme']]['promo_price_color'];
    $form_state['values']['tm_promo_price_text_color'] = $retailshop_color_themes[$form_state['values']['tm_color_scheme']]['promo_price_text_color'];
    $form_state['values']['tm_background_color'] = $retailshop_color_themes[$form_state['values']['tm_color_scheme']]['background_color'];
    $form_state['values']['tm_texture'] = $retailshop_color_themes[$form_state['values']['tm_color_scheme']]['texture'];

    $form_state['values']['tm_color_scheme'] = 0;
  }

//drupal_set_message('<pre>'. check_plain(print_r($form_state, 1)) .'</pre>');
}

$_theme_names = array(
        'theme1' => t('Blue'),
        'theme2' => t('Green'),
        'theme3' => t('Orange'),
        'theme4' => t('Tan')
    );

*/