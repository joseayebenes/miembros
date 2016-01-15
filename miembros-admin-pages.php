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

function ajustes_admin_callback(){
  ?>
  <div class="wrap">
    <h1>Ajustes</h1>
  </div>

  <?php
}

function exportar_admin_callback(){
  ?>
  <div class="wrap">
  <h1>Exportar</h1>

  <p>Cuando hagas clic en el botón de abajo, WordPress creará un archivo para que lo guardes en tu ordenador.</p>

  <h2>Elige qué exportar</h2>
  <form method="get" id="export-filters">
  <fieldset>
  <legend class="screen-reader-text">Contenido a exportar</legend>
  <input type="hidden" name="download" value="true" />

  <p><label><input type="radio" name="content" value="posts" /> Lista de Correos</label></p>
  <p><label><input type="radio" name="content" value="pages" /> Lista de Miembros</label></p>
  <p><label><input type="radio" name="content" value="pages" /> Lista de Miembros Completa</label></p>
  <p><label><input type="radio" name="content" value="job" /> Todo fichero csv</label></p>
  <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Descargar el archivo de exportación"  /></p></form>
  </div>

  <?php
  $args = array(
               'content'    => 'miembro',
               'author'     => false,
               'category'   => false,
               'start_date' => false,
               'end_date'   => false,
               'status'     => false,
   );
   export_wp( $args );

}
