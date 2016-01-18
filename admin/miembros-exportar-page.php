<?php

function exportar_admin_callback(){
  ?>
  <div class="wrap">
  <h1>Exportar <img src="<?php echo esc_url( admin_url() . '/images/loading.gif' ); ?>" id="loading-animation"></h1>

  <p>Cuando hagas clic en el botón de abajo, WordPress creará un archivo para que lo guardes en tu ordenador.</p>

  <h2>Elige qué exportar</h2>
  <form id="form-export">
  <fieldset>
  <legend class="screen-reader-text">Contenido a exportar</legend>
  <p><label><input type="radio" name="content" value="correos" /> Lista de Correos</label></p>
  <p><label><input type="radio" name="content" value="miembros" /> Lista de Miembros</label></p>
  <p><label><input type="radio" name="content" value="miembros-detallada" /> Lista de Miembros Detallada</label></p>
  <p><label><input type="radio" name="content" value="csv" /> Todo fichero csv</label></p>
  <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Generar el archivo de exportación"  /></p>
	</form>

	</div>

  <?php

}


function miembros_ajax_export() {

	if ( ! check_ajax_referer( 'miembros-export', 'security' ) ) {
		return wp_send_json_error( 'Invalid Nonce' );
	}

	if ( ! current_user_can( 'manage_options' ) ) {
		return wp_send_json_error( 'You are not allow to do this.' );
	}

	$data = $_POST['data'];

	$type = str_replace("content=","",$data);

	if($type=="correos"){

		$args = array(
			'orderby'          => 'titulacion',
			'order'            => 'DESC',
			'post_type'        => 'miembro',
			'post_status'      => 'publish',
			'tax_query'				 => array(
				array(
					'taxonomy' => 'pleno',
					'field'		 => 'slug',
					'terms'		 => get_option('miembros-pleno-actual-value')
				)
			)
		);
		$miembros = get_posts( $args );

		$file_name ='print.pdf';
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','',20);
		$pdf->Cell(0,10,'Lista de Correos',0,1,'C');
		$pdf->SetFont('Times','',12);
		foreach ($miembros as $miembro ) {
			$pdf->Cell(0,5,get_post_meta($miembro->ID,'email',true),0,1);
		}
		$pdf->output(plugin_dir_path(__FILE__).$file_name,'F');
	}else{
		wp_send_json_error("Tipo Incorrecto");
	}

	wp_send_json_success( plugin_dir_url(__FILE__).$file_name);

}
add_action( 'wp_ajax_export', 'miembros_ajax_export' );
