<?php

/*
  ===============================
    CUSTOM POST TYPE
    https://youtu.be/vSM7w3zzlSU
  ===============================
*/
function settingsCrevette_post_type(){
  $labels = array(
    'name' => 'Portfolio',
    'singular_name' => 'Portfolio',
    'add_new' => 'Ajouter un élément',
    'all_items' => 'Tous les éléments',
    'add_new_item' => 'Ajoute un élement',
    'edit_item' => 'Editer un élément',
    'new_item' => 'Nouvel élément',
    'view_item' => 'Afficher un élément',
    'search_item' => 'Chercher un élément',
    'not_found' => 'Aucun élément trouvé',
    'not_found_in_trash' => 'Aucun élément trouvé dans la poubelle',
    'parent_item_colon' => 'Element parent'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    /* accessible publiquement */
    'publicly_queryable' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'revisions',
    ),
    'taxonomies' => array('category', 'post_tag'),
    'menu_position' => 5,
    'exclude_from_search' => false
  );
  register_post_type('portfolio', $args);
}
add_action('init', 'settingsCrevette_post_type');

/*
  ===============================
    ADD CPT IN MAIN LOOP
  ===============================
*/

function get_settingsCrevette_post_type( $query ) {

  if ( ( is_home() && $query->is_main_query() ) || is_feed() )
    $query->set( 'post_type', array( 'post', 'page', 'album', 'movie', 'portfolio' ) );

  return $query;
}
add_filter( 'pre_get_posts', 'get_settingsCrevette_post_type' );

?>