<?php
function miembros_shortcode_list( $atts, $content = null ) {

  if ( ! isset( $atts['pleno'] ) ) {
		return '<p class="job-error">Es necesario especificar el pleno.</p>';
	}

  $titulaciones = get_terms( 'titulacion', array('orderby' => 'slug', 'order' => 'ASC', 'hide_empty'=> 0));
  $cursos = get_terms( 'curso',array('orderby' => 'slug', 'order' => 'ASC', 'hide_empty'=> 0) );

  foreach ($titulaciones as $titulacion ) {
    ?>
    <div id="miembros-shortcode" >
      <table id="miembros-table" style="width:100%">
        <caption><?php echo "<h4>".$titulacion->name."</h4> "; ?></caption>
        <tr>
          <th>Nombre</th>
          <th>Datos</th>
        </tr>
    <?php
      foreach ($cursos as $curso) {
        $args = array(
          'orderby'          => 'post_title',
          'order'            => 'ASC',
          'post_type'        => 'miembro',
          'post_status'      => 'publish',
          'tax_query'				 => array(
            array(
              'taxonomy' => 'pleno',
              'field'		 => 'slug',
              'terms'		 => get_option('miembros-pleno-actual-value')
            ),
            array(
              'taxonomy' => 'titulacion',
              'field'		 => 'slug',
              'terms'		 => $titulacion->slug
            ),
            array(
              'taxonomy' => 'curso',
              'field'		 => 'slug',
              'terms'		 => $curso->slug
            )
          )
        );

        $miembros = get_posts( $args );
      	if( ! empty( $miembros ) && ! is_wp_error( $miembros ) ) {
      ?>
      <tr id="curso-tr">
        <td colspan="2">
          <?php echo "<b>".esc_html__( $curso->name )."</b>"; ?>
        </td>
      </tr>
      <?php foreach ($miembros as $miembro): ?>
          <tr>
            <td>
              <?php echo esc_html__( $miembro->post_title ); ?>
            </td>
            <td>
              <?php
              $comisiones = get_the_term_list($miembro->ID, 'comision','',', ','') ;
              $colectivos = get_the_term_list($miembro->ID, 'colectivo','',', ') ;
              echo "<b>Comisiones: </b>";
              echo strip_tags($comisiones);
              echo "<br>";
              echo "<b>Colectivos: </b>";
              echo strip_tags($colectivos);
              ?>
            </td>
          </tr>
      <?php endforeach; ?>

    <?php
        }
    }
  ?></table></div><?php
  }

}
add_shortcode( 'miembros_list', "miembros_shortcode_list" );
