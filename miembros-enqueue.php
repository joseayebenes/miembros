<?php
function miembros_admin_enqueue() {
	global $pagenow, $typenow;

	if ( $typenow == 'miembro') {

		wp_enqueue_style( 'miembros-css', plugins_url( 'css/miembros-admin.css', __FILE__ ) );

	}

	if ( ($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'miembro' ) {

		//wp_enqueue_script( 'dwwwp-job-js', plugins_url( 'js/admin-jobs.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), '20150204', true );
		//wp_enqueue_script( 'dwwp-custom-quicktags', plugins_url( 'js/dwwp-quicktags.js', __FILE__ ), array( 'quicktags' ), '20150206', true );
		//wp_enqueue_style( 'jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );

	}

	if ( $pagenow =='edit.php' && $typenow == 'miembro') {

		wp_enqueue_script( 'export-js', plugins_url( 'js/export.js', __FILE__ ), array( 'jquery' ), '20150626', true );
		wp_localize_script( 'export-js', 'MIEMBROS', array(
			'security' => wp_create_nonce( 'miembros-export' ),
			'success' => __( 'Success.' ),
			'failure' => __( 'There was an error saving the sort order, or you do not have proper permissions.' )
		) );

	}

}
add_action( 'admin_enqueue_scripts', 'miembros_admin_enqueue' );

function miembros_front_enqueue() {

	wp_enqueue_style( 'miembros-css', plugins_url( 'css/miembros-front.css', __FILE__ ) );

}
add_action( 'wp_enqueue_scripts', 'miembros_front_enqueue' );
