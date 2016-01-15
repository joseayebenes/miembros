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
  <p><label><input type="radio" name="content" value="all" checked="checked" aria-describedby="all-content-desc" /> Todo el contenido</label></p>

  <p><label><input type="radio" name="content" value="posts" /> Entradas</label></p>

  <p><label><input type="radio" name="content" value="pages" /> Páginas</label></p>
  <p><label><input type="radio" name="content" value="miembro" /> Miembros</label></p>
  <p><label><input type="radio" name="content" value="job" /> Job Listings</label></p>

  <p><label><input type="radio" name="content" value="attachment" /> Medios</label></p>

  <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Descargar el archivo de exportación"  /></p></form>
  </div>

  <?php

  require(plugin_dir_path(__FILE__).'fpdf/fpdf.php');
  $pdf=new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',16);
  $pdf->Cell(40,10,'¡Mi primer pdf con FPDF!');
  $pdf->Output(plugin_dir_path(__FILE__) . 'report.pdf', "F");
  ?>
  <a class="button button-primary" href="<?php echo plugin_dir_url(__FILE__).'report.pdf'; ?>" download>download not open it</a>
  <?php
}
