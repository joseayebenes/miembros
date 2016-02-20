<?php

/**
* Plugin Name: Miembros
* Plugin URI: http://joseayebenes.es
* Author: @joseayebenes
* Author URI: http://joseayebenes.es
* Version: 1.0
* License: GPLv2
* Description: un plugin creado para gestión de miembros
*/

if(! defined('ABSPATH')){
  exit;
}

require_once(plugin_dir_path(__FILE__).'fpdf/pdf.php');


require_once(plugin_dir_path(__FILE__).'miembros-cpt.php');
require_once(plugin_dir_path(__FILE__).'miembros-tax.php');
require_once(plugin_dir_path(__FILE__).'miembros-fields.php');
require_once(plugin_dir_path(__FILE__).'miembros-shortcode.php');
require_once(plugin_dir_path(__FILE__).'miembros-enqueue.php');

require_once(plugin_dir_path(__FILE__).'admin/miembros-admin-pages.php');
require_once(plugin_dir_path(__FILE__).'admin/miembros-ajustes-page.php');
require_once(plugin_dir_path(__FILE__).'admin/miembros-exportar-page.php');
