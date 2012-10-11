<?php

/**
 * Override theme_ting_search_form().
 */
function redbull_mobile_ting_search_form($form){
  
  $form['submit']['#type']  = "image_button" ;
  $form['submit']['#src']   = drupal_get_path('theme','redbull_mobile')."/images/search-btn.png";
  $form['submit']['#attributes']['class'] = "";

  unset($form['example_text']);
  return drupal_render($form);
}
/**
 * Implements hook_preprocess_page().
 */
function redbull_mobile_preprocess_page(&$variables) {
  if (in_array('page-user-login', $variables['template_files'])) {
    $variables['content'] = '<h1>' . t('Login') . '</h1>' . $variables['content'];
  }

  if (in_array('page-user-status', $variables['template_files'])) {
    $variables['content'] = '<h1>' . t('Min konto') . '</h1>' . $variables['content'];
  }

  // Render the main navigation menu.
  $variables['main_menu'] = theme('links', menu_navigation_links('menu-mobile-menu'), array('class' => 'top-menu mobilemenu clear-block'));

  // Get bottom navigation links.
  $bottom_menu = menu_navigation_links('menu-mobile-bottom-menu');

  // Add link to the desktop version.
  $bottom_menu['mainsite'] = array('href' => 'mt/desktop/front_panel', 'title' => t('Go to the library site'));

  if (!drupal_is_front_page()) {
    $bottom_menu = array_merge(array('frontpage' => array('href' => '<front>', 'title' => t('Front page'))), $bottom_menu);
  }
  $variables['bottom_menu'] = theme('links', $bottom_menu, array('class' => 'bottom-menu mobilemenu clear-block'));

  // Add admin class to the body if applicable.
  if (!empty($variables['admin'])) {
    $variables['body_classes'] .= ' admin';
  }
}
