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
	?>
  <div>
    <div class="field-row">
        <div class="field-label">
          <label for="email" class="dwwp-row-title">Email</label>
        </div>
        <div class="field-input">
          <input type="text" id="email" name="name" value="">
        </div>
    </div>
		<div class="field-row">
        <div class="field-label">
          <label for="telefono" class="dwwp-row-title">Teléfono</label>
        </div>
        <div class="field-input">
          <input type="text" id="telefono" name="name" value="">
        </div>
    </div>
  </div>
	<?php
}
