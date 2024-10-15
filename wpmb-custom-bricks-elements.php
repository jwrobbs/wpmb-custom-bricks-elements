<?php
/**
 * Plugin Name: WPMB Custom Bricks Elements
 * Plugin URI: https://wpmasterbuilder.com
 * Description: Custom elements for Bricks Builder (WordPress plugin).
 * Version: 1.1.3
 * Author: Josh Robbs
 * Author URI: https://wpmasterbuilder.com
 * License: GPL2
 *
 * @package WPMB_Custom_Bricks_Elements
 */

namespace WPMB_Custom_Bricks_Elements;

defined( 'ABSPATH' ) || exit;

define( 'WPMB_CUSTOM_BRICKS_ELEMENTS_FILE', __FILE__ );
define( 'WPMB_CUSTOM_BRICKS_ELEMENTS_PATH', plugin_dir_path( WPMB_CUSTOM_BRICKS_ELEMENTS_FILE ) );
define( 'WPMB_CUSTOM_BRICKS_ELEMENTS_URL', plugin_dir_url( WPMB_CUSTOM_BRICKS_ELEMENTS_FILE ) );

add_action( 'init', __NAMESPACE__ . '\init', 11 );

/**
 * Initialize the plugin.
 *
 * @return void
 */
function init() {
	$element_files = array(
		__DIR__ . '/src/class-breadcrumbs-for-yoast.php',
		__DIR__ . '/src/code-highlighter/class-code-highlighter-block.php',
	);

	foreach ( $element_files as $file ) {
		if ( file_exists( $file ) ) {
			\Bricks\Elements::register_element( $file );
		}
	}
}
