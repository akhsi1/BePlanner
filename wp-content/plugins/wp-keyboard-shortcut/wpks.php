<?php 
/**
* Plugin Name: WP Keyboard Shortcut
* Plugin URI: recorp.cf/?redirect_plugin_url=true
* Description: Best way to add keyboard shortcuts to your site. And this makes a site more comfortable to use. 
* Version: 1.0.6
* Text-domain: wpks
* Author: ReCorp
* Author URI: recorp.cf/?redirect_from_author_uri=true
*/
if ( ! defined( 'ABSPATH' ) ) exit;



class WP_Keyboard_Shortcut{

public function __construct() {
	define( 'WPKS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
	require_once( WPKS_PLUGIN_PATH .'php/database.php');
	require_once( WPKS_PLUGIN_PATH .'shortcuts/keycode.php');
	require_once( WPKS_PLUGIN_PATH .'php/wpks_functions.php');
	require_once( WPKS_PLUGIN_PATH .'php/scripts.php');


register_activation_hook(__FILE__, array($this,'wpks_active'));

register_activation_hook( __FILE__, 'wpks_create_table' );
register_deactivation_hook( __FILE__, 'wpks_remove_table');

add_action( 'plugins_loaded', array($this,'wpks_load_textdomain') );
add_action('admin_init', array($this,'wpks_redirect'));
add_action('wp_enqueue_scripts', array($this,'adding_jquery_on_header'));

if (is_admin()) {
  if ( !is_multisite() ) {
      include_once(ABSPATH . 'wp-includes/pluggable.php');
       if( current_user_can('editor') || current_user_can('administrator') ) {
          add_action('admin_menu', 'wpks_adding_menu');
        }
      } else {
        add_action('admin_menu', 'wpks_adding_menu');
      }
		require_once( WPKS_PLUGIN_PATH .'php/settings_page.php');
  }

	if (is_admin()) {
			if ( strpos($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], "wp_keyboard_shortcut") == true) {
				require_once( WPKS_PLUGIN_PATH .'php/settings_page.php');
		        /*add_action( 'wp_enqueue_scripts', array($this, 'wp_keyboard_shortcut' ));*/
				 add_action('admin_enqueue_scripts', array($this, 'admin_wpks_scripts'));
			}
		}

	if ( is_admin() ) {
		require_once( WPKS_PLUGIN_PATH .'shortcuts/chrome_shortcuts.php');
		require_once( WPKS_PLUGIN_PATH .'shortcuts/firefox_shortcuts.php');
		require_once( WPKS_PLUGIN_PATH .'shortcuts/ie_shortcuts.php');
	}

       
}

	public function wp_keyboard_shortcut() {
		wp_register_script( 'wpks', plugins_url( '/assets/js/wpks.min.js', __FILE__ , true) );
		wp_register_script( 'tagsinput', plugins_url( '/assets/js/jquery.tagsinput.js', __FILE__ , true) );

	  $translation_array = array(
	'ajax_url' => get_admin_url(),
	'home_url' => get_home_url(),
);

wp_localize_script( 'wpks', 'wpks', $translation_array );
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'wpks');
	wp_enqueue_script( 'tagsinput');

	wp_register_style( 'main_style', plugins_url( '/assets/css/wpks_styles.css', __FILE__ , true) );

	wp_register_style( 'tagsinput', plugins_url( '/assets/css/jquery.tagsinput.css', __FILE__ , true) );
wp_enqueue_style( 'main_style');
wp_enqueue_style( 'tagsinput');

}

public function admin_wpks_scripts() {   
   	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'admin', plugin_dir_url( __FILE__ ) . 'assets/js/wpks.min.js', array('jquery'), '1.0.0' );
   

	  $translation_array = array(
	'ajax_url' => get_admin_url(),
	'plugin_dir' =>  esc_url( plugins_url( "", __FILE__ ) ),
);

wp_localize_script( 'admin', 'wpks', $translation_array );
	wp_enqueue_script( 'admin');

    wp_enqueue_script( 'bootstrap_js', plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.min.js', array('jquery'), '1.0.0' );

    wp_enqueue_script( 'tagsinput_js', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.tagsinput.js', array('jquery', 'jquery-ui-core'), '1.0.0' );

    wp_enqueue_script( 'autocomplete', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.easy-autocomplete.min.js', array('jquery', 'jquery'), '1.0.0' );


	wp_register_style( 'style_admin', plugin_dir_url( __FILE__ ) . 'assets/css/wpks_admin.css', false, '1.0.0' );

	wp_register_style( 'bootstrap_css', plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.min.css', false );

	wp_register_style( 'tagsinput_css', plugin_dir_url( __FILE__ ) . 'assets/css/jquery.tagsinput.css', false );
	
	wp_register_style( 'font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', false );

	wp_register_style( 'easy-autocomplete', plugin_dir_url( __FILE__ ) . 'assets/css/easy-autocomplete.min.css', false );
	
	wp_enqueue_style( 'style_admin' );
	wp_enqueue_style( 'bootstrap_css' );
	wp_enqueue_style( 'tagsinput_css' );
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'easy-autocomplete' );
}

public function wpks_load_textdomain() {
  load_plugin_textdomain( 'wpks', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}

public function wpks_active() {
    add_option('to_wpks_redirect', true);
}

public function wpks_redirect() {
    if (get_option('to_wpks_redirect', false)) {
        delete_option('to_wpks_redirect');
       wp_redirect("admin.php?page=wp_keyboard_shortcut");
    }
}

public function adding_jquery_on_header(){
	wp_enqueue_script('jquery');
}

}

	$WPKS = new WP_Keyboard_Shortcut();
