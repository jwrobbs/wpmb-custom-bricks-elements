<?php
/**
 * Breadcrumbs for Yoast Element.
 *
 * @package WPMB_Custom_Bricks_Elements
 */

namespace WPMB_Custom_Bricks_Elements\src;

use Bricks\Element;

defined( 'ABSPATH' ) || exit;

/**
 * Breadcrumbs for Yoast Element.
 *
 * @return void
 */
class Breadcrumbs_For_Yoast extends Element {

	/**
	 * Element category.
	 *
	 * @var string
	 */
	public $category = 'custom';
	/**
	 * Element name.
	 *
	 * @var string
	 */
	public $name = 'wpmb_yoast_breadcrumbs';

	/**
	 * Element icon.
	 *
	 * @var string
	 */
	public $icon = 'fa-solid fa-bread-slice';

	/**
	 * Get element title.
	 *
	 * @return string
	 */
	public function get_label() {
		return 'Breadcrumbs for Yoast';
	}

	/**
	 * Set control group
	 *
	 * @return void
	 */
	public function set_control_groups() {
	}

	/**
	 * Set controls
	 *
	 * @return void
	 */
	public function set_controls() {
	}

	/**
	 * Render element HTML on frontend
	 *
	 * If no 'render_builder' function is defined then this code is used to render element HTML in builder, too.
	 */
	public function render() {
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			echo wp_kses_post( "<div {$this->render_attributes( '_root' )}>" );
			yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
			echo '</div>';
		}
	}

	/**
	 * Keywords
	 *
	 * @return array
	 */
	public function get_keywords() {
		return array( 'breadcrumbs', 'yoast', 'seo' );
	}
}
