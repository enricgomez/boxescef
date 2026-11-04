<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.enricgomez.com
 * @since             2.0.0
 * @package           C_c_t_a
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Call to action Elementor Addon
 * Plugin URI:        https://www.enricgomez.com
 * Description:       A custom elementor add-on which adds a custom call to action elementor element with image, title, description and icon.
 * Version:           2.1.0
 * Author:            Asif. Modified by enricgomez
 * Author URI:        https://www.enricgomez.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       c_c_t_a
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 2.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'C_C_T_A_VERSION', '2.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-c_c_t_a-activator.php
 */
function activate_c_c_t_a() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-c_c_t_a-activator.php';
	C_c_t_a_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-c_c_t_a-deactivator.php
 */
function deactivate_c_c_t_a() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-c_c_t_a-deactivator.php';
	C_c_t_a_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_c_c_t_a' );
register_deactivation_hook( __FILE__, 'deactivate_c_c_t_a' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-c_c_t_a.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_c_c_t_a() {

	$plugin = new C_c_t_a();
	$plugin->run();

}
run_c_c_t_a();

function register_custom_call_to_action( $widgets_manager ) {

    require_once( __DIR__ . '/elementor/widgets/custom_call_to_action.php' );

    $widgets_manager->register( new \Elementor_custom_call_to_action() );

}
add_action( 'elementor/widgets/register', 'register_custom_call_to_action' );


/* ENRIC - Translate WPML: textos y enlaces del widget. */
add_filter( 'wpml_elementor_widgets_to_translate', function( $widgets ) {
	$widgets['custom_call_to_action'] = array(
		'conditions' => array( 'widgetType' => 'custom_call_to_action' ),
		'fields'     => array(
			array(
				'field'       => 'widget_title',
				'type'        => __( 'Custom Call To Action: title', 'c_c_t_a' ),
				'editor_type' => 'LINE',
			),
			array(
				'field'       => 'item_description',
				'type'        => __( 'Custom Call To Action: description', 'c_c_t_a' ),
				'editor_type' => 'AREA',
			),
			// Los controles URL se traducen por su subcampo url, con el nombre del control como clave.
			'image_link' => array(
				'field'       => 'url',
				'type'        => __( 'Custom Call To Action: image link', 'c_c_t_a' ),
				'editor_type' => 'LINK',
			),
			'title_link' => array(
				'field'       => 'url',
				'type'        => __( 'Custom Call To Action: title link', 'c_c_t_a' ),
				'editor_type' => 'LINK',
			),
			'icon_link'  => array(
				'field'       => 'url',
				'type'        => __( 'Custom Call To Action: icon link', 'c_c_t_a' ),
				'editor_type' => 'LINK',
			),
		),
	);
	return $widgets;
} );
