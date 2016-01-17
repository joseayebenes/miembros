<?php

function miembros_add_custom_metabox() {
	add_meta_box(
		'miembros_meta',
		'Datos',
		'miembros_meta_callback',
		'miembro',
		'normal',
		'core'
	);
}

add_action( 'add_meta_boxes', 'miembros_add_custom_metabox' );
function miembros_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'miembros_nonce' );
	$miembros_stored_meta = get_post_meta( $post->ID ); ?>

  <div>
    <div class="field-row">
        <div class="field-label">
          <label for="email" class="dwwp-row-title">Email</label>
        </div>
        <div class="field-input">
          <input type="text" id="email" name="email" value="<?php if( !empty($miembros_stored_meta['email']) ){
						echo esc_attr($miembros_stored_meta['email'][0]);
					} ?>">
        </div>
    </div>
		<div class="field-row">
        <div class="field-label">
          <label for="telefono" class="dwwp-row-title">Teléfono</label>
        </div>
        <div class="field-input">
          <input type="text" id="telefono" name="telefono" value="<?php if( !empty($miembros_stored_meta['telefono']) ){
						echo esc_attr($miembros_stored_meta['telefono'][0]);
					} ?>">
        </div>
    </div>
  </div>
	<?php
}

function miembros_meta_save($post_id){
	// Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'miembros_nonce' ] ) && wp_verify_nonce( $_POST[ 'miembros_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if ( isset( $_POST[ 'email' ] ) ) {
    	update_post_meta( $post_id, 'email', sanitize_text_field( $_POST[ 'email' ] ) );
    }

		if ( isset( $_POST[ 'telefono' ] ) ) {
    	update_post_meta( $post_id, 'telefono', sanitize_text_field( $_POST[ 'telefono' ] ) );
    }
}
add_action( 'save_post', 'miembros_meta_save' );
