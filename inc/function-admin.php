<?php
/*
  @package crevette
  ==================
      ADMIN PAGE
  ==================
  add_action( $tag, $function_to_add, $priority, $accepted_args );
  add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
  add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
  register_setting( $option_group, $option_name, $sanitize_callback );
 */

function crevette_add_admin_page(){
  // Generate Crevette admin page
  add_menu_page( 'Crevette Theme Options', 'Crevette', 'manage_options', 'crevette_theme_settings', 'crevette_theme_create_page', get_template_directory_uri().'/img/crevette_16.svg', 1);

  // Add Crevette submenu for admin page
  add_submenu_page( 'crevette_theme_settings', 'Crevette Theme Options', 'General', 'manage_options', 'crevette_theme_settings', 'crevette_theme_create_page' );
  add_submenu_page( 'crevette_theme_settings', 'Crevette Options CSS', 'Custom CSS', 'manage_options', 'crevette_theme_css', 'crevette_theme_css_settings' );

  // Activate custom crevette
  add_action( 'admin_init', 'crevette_custom_settings', "manage_options", 'crevette_custom_settings' );
}
add_action('admin_menu', 'crevette_add_admin_page');

function crevette_theme_create_page(){
  require_once(get_template_directory().'/inc/templates/crevette-admin.php');
}
function crevette_theme_css_settings(){
  echo '<h1>Hey c\'est la page du css</h1>';
}
// Bundle functions of custom admin page
function crevette_custom_settings(){
  register_setting( 'crevette-settings-group', 'full_name');
  register_setting( 'crevette-settings-group', 'twitter_account', 'crevette_sanitize_twitter_account');
  register_setting( 'crevette-settings-group', 'devianart_account');
  register_setting( 'crevette-settings-group', 'facebook_account');

  add_settings_section( 'crevette_sidebar_options', 'Sidebar Options', 'crevette_sidebar_options', 'crevette_theme_settings' );

  add_settings_field( 'full_name', 'Nom complet', 'crevette_sidebar_name', 'crevette_theme_settings', 'crevette_sidebar_options');
  add_settings_field( 'sidebar-twitter', 'Compte Twitter', 'crevette_sidebar_twitter', 'crevette_theme_settings', 'crevette_sidebar_options');
  add_settings_field( 'sidebar-facebook', 'Compte Facebook', 'crevette_sidebar_facebook', 'crevette_theme_settings', 'crevette_sidebar_options');
  add_settings_field( 'sidebar-devianart', 'Compte Deviant Art', 'crevette_sidebar_devianart', 'crevette_theme_settings', 'crevette_sidebar_options');
}

// Sanitization settings
function crevette_sanitize_twitter_account( $input ){
  $output = sanitize_text_field( $input );
  return $output;
}

function crevette_sidebar_name(){
  $full_name = esc_attr(get_option('site_url'));
  echo '<input type="text" name"first_name" placeholder="Prénom" value="'. $full_name .'">';
}
function crevette_sidebar_twitter(){
  $twitterAccount = esc_attr(get_option('sidebar-twitter'));
  echo '<input type="text" name"twitter_account" placeholder="Compte Twitter" value="'.$twitterAccount.'">';
  var_dump($twitterAccount);
}
// Bunch of functions to display html
function crevette_sidebar_facebook(){
  $facebookAccount = esc_attr(get_option('facebook_account'));
  echo '<input type="text" name"twitter_account" placeholder="Adresse Facebook" value="'.$facebookAccount.'">';
  var_dump($facebookAccount);
}
function crevette_sidebar_devianart(){
  $devianartAccount = esc_attr(get_option('devianart_account'));
  echo '<input type="text" name"twitter_account" placeholder="Adresse Deviant Art" value="'.$devianartAccount.'">';
  var_dump($devianartAccount);
}
function crevette_sidebar_options(){
  echo 'Paramétrer les options générales du Thème CrevetteRose';
}
?>