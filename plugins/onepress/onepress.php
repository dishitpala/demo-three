<?php
/**
 * Plugin Name: OnePress
 * Description: OnePress is a plugin that provides a set of features and functionality for WordPress sites.
 * Version: 1.0.0
 * Author: rtCamp, Dishit Pala
 * Author URI: https://rtcamp.com
 * Text Domain: onepress
 */

define( 'ONEPRESS_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'ONEPRESS_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

require ONEPRESS_PATH . '/plugin-loader.php';

OnePressPluginLoader::get_instance();
