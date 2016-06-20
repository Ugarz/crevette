<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php wp_title();?> - Options</title>
</head>
<body>
  <h1>Options du thème <?php bloginfo('name');?></h1>
  
  <p class="descritpion">Cette page permet de gérer les options paramétrables du thème !</p>
  
  <?php settings_errors();?>

  <form method="post" action="options.php" >
    <?php settings_fields('crevette-settings-group');?>
    <?php do_settings_sections( 'crevette_theme_settings' ); ?>
    <?php submit_button('Enregistrer les modifications');?>
  </form>

</body>
</html>