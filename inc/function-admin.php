<?php
/*
  @package crevette
  ==================
      ADMIN PAGE
  ==================
 */

function crevette_add_admin_page(){
  // Generate Crevette admin page
  add_menu_page( 'Crevette Theme Options', 'Crevette', 'manage_options', 'crevette_theme_settings', 'crevette_theme_create_page', get_template_directory_uri().'/img/crevette_16.svg', 1);

  // Add Crevette submenu for admin page
  add_submenu_page( 'crevette_theme_settings', 'Crevette Theme Options', 'General', 'manage_options', 'crevette_theme_settings', 'crevette_theme_create_page' );
  add_submenu_page( 'crevette_theme_settings', 'Crevette Options CSS', 'Custom CSS', 'manage_options', 'crevette_theme_css', 'crevette_theme_css_settings' );

  // Activate custom settings
  add_action( 'admin_init', 'crevette_custom_settings', "manage_options", 'crevette_custom_settings' );
}
add_action('admin_menu', 'crevette_add_admin_page');
function crevette_theme_create_page(){
  require_once(get_template_directory().'/inc/templates/crevette-admin.php');
}
function crevette_theme_css_settings(){
  echo '<h1>Hey c\'est la page du css</h1>';
}
function crevette_custom_settings(){
  register_setting( 'crevette-settings-group', 'first_name');
  add_settings_section( 'crevette_sidebar-options', 'Sidebar Options', 'crevette_sidebar_options', 'crevette_theme_settings' );
  add_settings_field( 'sidebar-name', 'Prénom', 'crevette_sidebar_name', 'crevette_theme_settings', 'crevette_sidebar-options');
}
function crevette_sidebar_options(){
  echo 'Paramétrer les options générales du Thème CrevetteRose';
}
function crevette_sidebar_name(){
  $firstName = esc_attr(get_option('first_name'));
  echo '<input type="text" name"first_name" placeholder="Met ton prénom" value="'.$firstName.'">';
}
?>