<?php

function ajustes_admin_callback(){
  ?>
  <div class="wrap">
    <h1>Ajustes</h1>

		<h2>Pleno Actual</h2>
		<form action="options.php" method="POST">
			<?php
				settings_fields('miembros-pleno-actual');
				do_settings_sections('miembros-pleno-actual');
				$plenos = get_terms( 'pleno', 'orderby=count&hide_empty=0' );
			 ?>
			 <label>Pleno Actual: </label>
			 <select name="miembros-pleno-actual-value" id="miembros-pleno-actual-value">
				 <?php foreach ($plenos as $pleno ): ?>
					 <option value="<?php echo $pleno->name; ?>" <?php if ( ! empty ( get_option('miembros-pleno-actual-value') ) ){ selected( get_option('miembros-pleno-actual-value'), $pleno->name);} ?> ><?php echo $pleno->name; ?></option>
				 <?php endforeach; ?>
			 </select>
			 <?php submit_button(); ?>
		</form>
  </div>

  <?php
}

function miembros_ajustes_register(){
	register_setting('miembros-pleno-actual','miembros-pleno-actual-value');
}
add_action('admin_init','miembros_ajustes_register');
