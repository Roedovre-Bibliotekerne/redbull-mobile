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
