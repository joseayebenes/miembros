<?php

/**
* Plugin Name: Miembros
* Plugin URI: http://joseayebenes.es
* Author: @joseayebenes
* Author URI: http://joseayebenes.es
* Version: 0.0.1
* License: GPLv2
* Description: un plugin creado para gestión de miembros
*/

if(! defined('ABSPATH')){
  exit;
}



require_once(plugin_dir_path(__FILE__).'miembros-cpt.php');
require_once(plugin_dir_path(__FILE__).'miembros-tax.php');
require_once(plugin_dir_path(__FILE__).'miembros-fields.php');
require_once(plugin_dir_path(__FILE__).'miembros-admin-pages.php');
