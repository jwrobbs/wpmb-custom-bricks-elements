<?php
/**
 * Plugin Name: WPMB Custom Bricks Elements
 * Plugin URI: https://wpmasterbuilder.com
 * Description: Custom elements for Bricks Builder (WordPress plugin).
 * Version: 1.0.1
 * Author: Josh Robbs
 * Author URI: https://wpmasterbuilder.com
 * License: GPL2
 *
 * @package WPMB_Custom_Bricks_Elements
 */

namespace WPMB_Custom_Bricks_Elements;

use WPMB_Custom_Bricks_Elements\src\Breadcrumbs_For_Yoast;

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
	new Breadcrumbs_For_Yoast();
}
