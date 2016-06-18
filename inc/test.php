<?php
/*
  ===============================
  Ma Page d'options pour le Theme
  ===============================
*/
function ThemeOptionSettings(){
  register_settings('crevetteSecure','site');
  register_settings('crevetteSecure','twitter');
  register_settings('crevetteSecure','fb');
}
add_action('admin_menu', 'ThemeOptionAdminMenuPage');
// add a page options
function ThemeOptionAdmin MenuPage(){
  add_menu_page(
    'Options Crevette', // Name page
    'Options Crevette', //
    'manage_options', // capability
    'theme-option-admin-page', //slug
    'ThemeOptionAdminPage', // callback function
    get_template_directory_uri().'/icon_crevette.png', // icon url 16x16
    3
  );
}

function ThemeOptionAdminPage(){
?>
  <div class="wrap">
    <div style="20px 0;">
      <h1>Réglages du thème</h1> <img src="<?php echo get_template_directory_uri();?>/icon_crevette.png">
    </div>
    
    <?php var_dump($_REQUEST); ?>
    <?php
      if ($_REQUEST['settings-updated'] == true) {
        ?>
        <div id="setting-error-setting_updated" class="updated settings-error">
          <p><strong>bravo maggle</strong></p>
        </div>
        <?php
      } else {
        ?>
        <div id="setting-error" class="settings-error"><strong>OOPS</strong></div>
        <?php
      }
    ?>
    <form method="POST" action="">  
      <?php settings_fields('crevetteSecure');?>
      <table class="form-table">
        <thead>Cette page est dédiée au mainteneur du site internet. Elle permet de rapidement changer certains paramètres du site.</thead>
        <tbody>
          <tr valign="middle">
            <th scope="row">
              <label for="blogname">Titre du site</label></th>
            <td>
              <input name="blogname" type="text" id="blogname" value="<?php echo get_option('site');?>" class="regular-text">
              <p class="description">Mettre à jour le nom de votre site</p>
            </td>
          </tr>
          <tr valign="middle">
            <th scope="row">
              <label for="twitter">Twitter</label></th>
            <td>
              <input name="twitter" type="text" id="twitter" value="@<?php echo get_option('twitter');?>" class="regular-text">
              <p class="description">Mettre à jour votre nom twitter</p>
            </td>
          </tr>
          <tr valign="middle">
            <th scope="row">
              <label for="facebook">Facebook</label></th>
            <td>
              <input name="facebook" type="text" id="facebook" value="<?php echo get_option('fb');?>https://fr-fr.facebook.com/" class="regular-text">
              <p class="description">Mettre à jour votre adresse facebook</p>
            </td>
          </tr>
        </tbody>
      </table>
      <?php submit_button('Sauvegarder mes options'); ?>
    </form>
  </div>
<?php
}
?>