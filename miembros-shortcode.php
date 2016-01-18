<?php
function miembros_shortcode_list( $atts, $content = null ) {

  if ( ! isset( $atts['pleno'] ) ) {
		return '<p class="job-error">Es necesario especificar el pleno.</p>';
	}

  $titulaciones = get_terms( 'titulacion', 'orderby=count&hide_empty=0' );
  $cursos = get_terms( 'curso', 'orderby=count&hide_empty=0' );

  foreach ($titulaciones as $titulacion ) {
    ?>
    <div id="miembros-shortcode" >
      <table id="miembros-table" style="width:100%">
        <caption><?php echo $titulacion->name; ?></caption>
        <tr>
          <th>Nombre</th>
          <th>Datos</th>
        </tr>
    <?php
      foreach ($cursos as $curso) {
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
          <?php echo esc_html__( $curso->name ); ?>
        </td>
      </tr>
      <?php foreach ($miembros as $miembro): ?>
          <tr>
            <td>
              <?php echo esc_html__( $miembro->post_title ); ?>
            </td>
            <td>
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
