<?php

function miembros_register_post_type(){

  $singular = 'Miembro';
  $plural = 'Miembros';

  $labels  = array(
      'name'              => $plural,
      'singular_name'     => $singular,
      'add_name'          => 'Añadir Nuevo',
      'add_new_item'      => 'Añadir Nuevo '.$singular,
      'edit'              => 'Editar',
      'edit_item'         => 'Editar '.$singular,
      'new_item'          => 'Nuevo '. $singular,
      'view'              => 'Ver '.$singular,
      'view_item'         => 'Ver '.$singular,
      'search_term'       => 'Buscar '.$plural,
      'parent'            => 'Parent '.$singular,
      'not_found'         => 'Ningún '.$singular.' encontrado',
      'not_found_in_trash'=>  'No '.$plural.' en papelera'
  );

  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'show_in_nav_menus'   => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 6,
    'menu_icon'           => 'dashicons-groups',
    'can_export'          => true,
    'delete_with_user'    => false,
    'hierarchical'        => false,
    'has_archive'         => true,
    'query_var'           => true,
    'capability_type'     =>'post',
    'map_meta_cap'        => true,
    // 'capabilities'     => array(),
    'rewrite'             => array(
      'slug'         => 'miembros',
      'with_front'   => true,
      'pages'        => true,
      'feeds'        => true,
    ),
    'supports'            => array(
      'title'
    )
  );

  register_post_type('miembro',$args);
}

add_action('init','miembros_register_post_type');


function custom_enter_title( $input ) {
    global $post_type;

    if( is_admin() && 'Introduce el título aquí' == $input && 'miembro' == $post_type )
        return 'Introduce el Nombre y Apellidos';

    return $input;
}

add_filter('gettext','custom_enter_title');
