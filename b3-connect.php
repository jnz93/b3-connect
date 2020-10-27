<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              unitycode.tech
 * @since             1.0.0
 * @package           B3_Connect
 *
 * @wordpress-plugin
 * Plugin Name:       B3 Connect
 * Plugin URI:        unitycode.tech
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            jnz93
 * Author URI:        unitycode.tech
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       b3-connect
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'B3_CONNECT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-b3-connect-activator.php
 */
function activate_b3_connect() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-b3-connect-activator.php';
	B3_Connect_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-b3-connect-deactivator.php
 */
function deactivate_b3_connect() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-b3-connect-deactivator.php';
	B3_Connect_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_b3_connect' );
register_deactivation_hook( __FILE__, 'deactivate_b3_connect' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-b3-connect.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_b3_connect() {

	$plugin = new B3_Connect();
	$plugin->run();

}
run_b3_connect();
