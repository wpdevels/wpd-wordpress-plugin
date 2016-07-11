<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

//creamos la clase con el nombre del archivo
class Wpd_plugin{
	
	//en el constructor es donde llamamos a las acciones que vayamos creando
	public function __construct() {
		add_action( 'admin_menu', array($this,"add_option_menu"));
		add_action( 'wp_enqueue_scripts', array($this,"load_all_scripts"));
		add_action( 'admin_enqueue_scripts', array($this, "wpd_admin_init"));
	}

	public function add_admin_menu(){
		//add_object_page('Fp_plugin', 'Fp_plugin', 'activate_plugins', 'filtering-post', array($this, 'admin_page'));
	}

	public function add_option_menu(){
		add_options_page("Wpd_options_plugin", "Wpd Plugin Options", "read", __FILE__, array($this, 'admin_menu'));
	}

	public function load_all_scripts(){
		wp_enqueue_script("jquery");
		wp_enqueue_script( 'wpd-minscript', plugins_url( '../js/front_script.js', __FILE__ ), array( 'jquery') );
		wp_enqueue_script( 'wpd-bootstrap-style', plugins_url( '../js/bootstrap.min.js', __FILE__ ), array('jquery') );
		wp_enqueue_style( 'wpd-bootstrap-style', plugins_url( '../css/bootstrap.min.css', __FILE__ ) );
		wp_enqueue_style( 'wpd-front-stylesheet', plugins_url( '../css/frontstyle.css', __FILE__ ));
	}

	public function wpd_admin_init() {
		wp_enqueue_script( "jquery");
        wp_enqueue_script( 'wpd-admin-script', plugins_url( '../js/admin_script.js', __FILE__ ), array( 'jquery') );
        wp_enqueue_style( 'wpd-admin-stylesheet', plugins_url( '../css/adminstyle.css', __FILE__ ));
	}


	public function admin_menu(){
		include('options_wpd.php');
	}

	public function wpd_row_meta( $links, $file ) {
		if ( strpos( $file, 'wpd-wordpress-plugin/wpd_wordpress_plugin.php' ) !== false ) {
			$new_links = array(
				'twitter' => '<a href="http://twitter.com/wpdevels" target="_blank">Twitter</a>',
			);

			$links = array_merge( $links, $new_links );
		}

		return $links;
	}

	public function wpd_action_links ( $links ) {
		$mylinks = array(
			'<a href="' . admin_url( 'options-general.php?page=wpd-wordpress-plugin/inc/class_wpd_plugin.php' ) . '">' . __('Settings','wpdplugin') . '</a>',
		);
		return array_merge( $links, $mylinks );
	}
}