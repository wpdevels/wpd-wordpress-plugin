<?php
/*
Plugin Name: WPDevels Base Plugin
Plugin URI: https://wpdevels.es/
Description: A Base Plugin
Version: 1.0
Author: WPDevels
Author URI: http://wpdevels.es/
twitter: wpdevels
License: GPL2
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include('inc/class_wpd_plugin.php');

//creamos la instancia para poder utilizarlo 
$wpdplugin = new Wpd_plugin();