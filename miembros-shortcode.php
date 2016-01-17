<?php
function miembros_shortcode_list( $atts, $content = null ) {

  if ( ! isset( $atts['pleno'] ) ) {
		return '<p class="job-error">Es necesario especificar el pleno.</p>';
	}

  $atts = shortcode_atts(
		array(
      'pleno' => ''
		), $atts
	);

	$titulaciones = get_terms( 'titulacion', 'orderby=count&hide_empty=0' );
	$displaylist='Error';
	if( ! empty( $titulaciones ) && ! is_wp_error( $titulaciones ) ) {

		$displaylist = '<div id="job-location-list">';
		$displaylist .= '<ul>';

		foreach( $titulaciones  as $titulacion ) {

			$displaylist .= '<li class="job-location">';
			$displaylist .= esc_html__( $titulacion->name ) . '</li>';

		}


	$displaylist .= '</ul></div>';
  }

  return $displaylist;

}
add_shortcode( 'miembros_list', "miembros_shortcode_list" );
