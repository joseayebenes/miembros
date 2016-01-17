<?php
function miembros_register_taxonomy(){

  $singular = 'Curso';
  $plural = 'Cursos';

  $labels = array(
    'name'              => $plural,
    'singular_name'     => $singular,
    'search_items'      => 'Buscar '.$plural,
    'popular_items'     => $plural.' Populares',
    'all_items'         => 'Todos los '.$singular,
    'parent_item'       => null,
    'parent_item_colon' => null,
    'edit_item'         => 'Editar '.$singular,
    'update_item'       => 'Actualizar '.$singular,
    'add_new_item'      => 'Añadir Nuevo '.$singular,
    'new_item_name'     => 'Nuevo '.$singular,
    'separte_items_with_commas' => 'Separar '.$plural.' con comas',
    'add_or_remove_items' => 'Añadir o Eliminar '.$plural,
    'choose_from_most_used' => 'Elegir desde el más usado '.$plural,
    'not_found'         => $plural.' no encontrados',
    'menu_name'         => $plural,
  );

  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'show_admin_callback'   => '_update_post_term_count',
    'update_count_callback' => true,
    'rewrite'               => array('slug' => 'curso' )
  );

  register_taxonomy('curso','miembro',$args);

  $singular = 'Titulación';
  $plural = 'Titulaciones';

  $labels = array(
    'name'              => $plural,
    'singular_name'     => $singular,
    'search_items'      => 'Buscar '.$plural,
    'popular_items'     => $plural.' Populares',
    'all_items'         => 'Todos los '.$singular,
    'parent_item'       => null,
    'parent_item_colon' => null,
    'edit_item'         => 'Editar '.$singular,
    'update_item'       => 'Actualizar '.$singular,
    'add_new_item'      => 'Añadir Nuevo '.$singular,
    'new_item_name'     => 'Nuevo '.$singular,
    'separte_items_with_commas' => 'Separar '.$plural.' con comas',
    'add_or_remove_items' => 'Añadir o Eliminar '.$plural,
    'choose_from_most_used' => 'Elegir desde el más usado '.$plural,
    'not_found'         => $plural.' no encontrados',
    'menu_name'         => $plural,
  );

  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'show_admin_callback'   => '_update_post_term_count',
    'update_count_callback' => true,
    'rewrite'               => array('slug' => 'titulacion' )
  );

  register_taxonomy('titulacion','miembro',$args);

  $singular = 'Comisión';
  $plural = 'Comisiones';

  $labels = array(
    'name'              => $plural,
    'singular_name'     => $singular,
    'search_items'      => 'Buscar '.$plural,
    'popular_items'     => $plural.' Populares',
    'all_items'         => 'Todos las '.$plural,
    'parent_item'       => null,
    'parent_item_colon' => null,
    'edit_item'         => 'Editar '.$singular,
    'update_item'       => 'Actualizar '.$singular,
    'add_new_item'      => 'Añadir Nuevo '.$singular,
    'new_item_name'     => 'Nuevo '.$singular,
    'separte_items_with_commas' => 'Separar '.$plural.' con comas',
    'add_or_remove_items' => 'Añadir o Eliminar '.$plural,
    'choose_from_most_used' => 'Elegir desde el más usado '.$plural,
    'not_found'         => $plural.' no encontrados',
    'menu_name'         => $plural,
  );

  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'show_admin_callback'   => '_update_post_term_count',
    'update_count_callback' => true,
    'rewrite'               => array('slug' => 'comisiones' )
  );

  register_taxonomy('comision','miembro',$args);

  $singular = 'Colectivo';
  $plural = 'Colectivos';

  $labels = array(
    'name'              => $plural,
    'singular_name'     => $singular,
    'search_items'      => 'Buscar '.$plural,
    'popular_items'     => $plural.' Populares',
    'all_items'         => 'Todos los '.$singular,
    'parent_item'       => null,
    'parent_item_colon' => null,
    'edit_item'         => 'Editar '.$singular,
    'update_item'       => 'Actualizar '.$singular,
    'add_new_item'      => 'Añadir Nuevo '.$singular,
    'new_item_name'     => 'Nuevo '.$singular,
    'separte_items_with_commas' => 'Separar '.$plural.' con comas',
    'add_or_remove_items' => 'Añadir o Eliminar '.$plural,
    'choose_from_most_used' => 'Elegir desde el más usado '.$plural,
    'not_found'         => $plural.' no encontrados',
    'menu_name'         => $plural,
  );

  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'show_admin_callback'   => '_update_post_term_count',
    'update_count_callback' => true,
    'rewrite'               => array('slug' => 'colectivos' )
  );

  register_taxonomy('colectivo','miembro',$args);

  $singular = 'Pleno';
  $plural = 'Plenos';

  $labels = array(
    'name'              => $plural,
    'singular_name'     => $singular,
    'search_items'      => 'Buscar '.$plural,
    'popular_items'     => $plural.' Populares',
    'all_items'         => 'Todos los '.$singular,
    'parent_item'       => null,
    'parent_item_colon' => null,
    'edit_item'         => 'Editar '.$singular,
    'update_item'       => 'Actualizar '.$singular,
    'add_new_item'      => 'Añadir Nuevo '.$singular,
    'new_item_name'     => 'Nuevo '.$singular,
    'separte_items_with_commas' => 'Separar '.$plural.' con comas',
    'add_or_remove_items' => 'Añadir o Eliminar '.$plural,
    'choose_from_most_used' => 'Elegir desde el más usado '.$plural,
    'not_found'         => $plural.' no encontrados',
    'menu_name'         => $plural,
  );

  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'show_admin_callback'   => '_update_post_term_count',
    'update_count_callback' => true,
    'rewrite'               => array('slug' => 'plenos' )
  );

  register_taxonomy('pleno','miembro',$args);
}

add_action('init','miembros_register_taxonomy');
