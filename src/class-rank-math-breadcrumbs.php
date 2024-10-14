<?php
/**
 * Rank Math Breadcrumbs Element.
 *
 * @package WPMB_Custom_Bricks_Elements
 */

namespace WPMB_Custom_Bricks_Elements\src;

use Bricks\Element;

defined( 'ABSPATH' ) || exit;

/**
 * Rank Math Breadcrumbs Element.
 *
 * @return void
 */
class Rank_Math_Breadcrumbs extends Element {

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
	public $name = 'jwr_rank_math_breadcrumbs';

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
		return 'Rank Math Breadcrumbs';
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
		echo wp_kses_post( "<div {$this->render_attributes( '_root' )}>" );
		echo do_shortcode( '[rank_math_breadcrumb]' );
		echo '</div>';
	}

	/**
	 * Keywords
	 *
	 * @return array
	 */
	public function get_keywords() {
		return array( 'breadcrumbs', 'rank math', 'seo' );
	}
}
