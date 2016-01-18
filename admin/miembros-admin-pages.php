<?php
function miembros_add_submenu_page() {

	add_submenu_page(
		'edit.php?post_type=miembro',
		__( 'Ajustes' ),
		__( 'Ajustes' ),
		'manage_options',
		'ajustes',
		'ajustes_admin_callback'
	);

  add_submenu_page(
		'edit.php?post_type=miembro',
		__( 'Exportar' ),
		__( 'Exportar' ),
		'manage_options',
		'exportar',
		'exportar_admin_callback'
	);

}
add_action( 'admin_menu', 'miembros_add_submenu_page' );
