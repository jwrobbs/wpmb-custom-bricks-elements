<?php
/**
 * Code Highlighter Element.
 *
 * @package WPMB_Custom_Bricks_Elements
 */

namespace WPMB_Custom_Bricks_Elements\src\Code_Highlighter;

use Bricks\Element;

defined( 'ABSPATH' ) || exit;

/**
 * Code Highlighter Element.
 *
 * @return void
 */
class Code_Highlighter_Block extends Element {

	/**
	 * Element category.
	 *
	 * @var string
	 */
	public $category = 'WPMB';
	/**
	 * Element name.
	 *
	 * @var string
	 */
	public $name = 'wpmb-code-highlighter';
	/**
	 * Element icon.
	 *
	 * @var string
	 */
	public $icon = 'fa-solid fa-code';
	/**
	 * Element CSS class.
	 *
	 * @var string
	 */
	public $css_selector = '.wpmb-code-highlighter';

	/**
	 * Get label.
	 *
	 * @return string
	 */
	public function get_label() {
		return 'Code Highlighter';
	}

	/**
	 * Set controls
	 *
	 * @return void
	 */
	public function set_controls() {
		// Add title field.
		$this->controls['title'] = array(
			'type'           => 'text',
			'hasDynamicData' => 'text',
			'label'          => 'Title',
			'placeholder'    => 'Add the title here.',

		);

		// Add code content field.
		$this->controls['code_content'] = array(
			'type'           => 'textarea',
			'hasDynamicData' => 'text',
			'label'          => 'Code',
			'default'        => '',
			'rows'           => 8,
		);
		// Add language field.
		$this->controls['snippet_language'] = array(
			'type'           => 'text',
			'hasDynamicData' => 'text',
			'label'          => 'Language',
			'default'        => 'plaintext',
		);
	}

	/**
	 * Enqueue scripts.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		wp_enqueue_script(
			'highlight-js',
			'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js',
			array(),
			'11.7.0',
			true
		);

		// Enqueue specific languages including json, sql, and scss.
		// [] Test how this affects performance. It could be unnecessary.
		$languages = array( 'plaintext', 'javascript', 'php', 'html', 'css', 'bash', 'python', 'json', 'sql', 'shell', 'scss' );
		foreach ( $languages as $language ) {
			wp_enqueue_script(
				'highlight-js-' . $language,
				'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/languages/' . $language . '.min.js',
				array( 'highlight-js' ),
				'11.7.0',
				true
			);
		}

		// Add highlight . js default stylesheet .
		wp_enqueue_style(
			'highlight-js-theme',
			'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/tomorrow-night-blue.min.css',
			array(),
			'11.7.0'
		);

		// Enqueue base CSS for the code block.
		wp_enqueue_style(
			'code-highlighter-css',
			WPMB_CUSTOM_BRICKS_ELEMENTS_URL . '/includes/common/custom-bricks-elements/code-highlighter/code-highlighter.css',
			array(),
			filemtime( WPMB_CUSTOM_BRICKS_ELEMENTS_PATH . '/includes/common/custom-bricks-elements/code-highlighter/code-highlighter.css' ) ?? '1',
		);

			// Initialize highlight . js .
			wp_add_inline_script( 'highlight-js', 'hljs.highlightAll();' );
	}

	/**
	 * Render element.
	 *
	 * @return void
	 */
	public function render() {
		// Get title, code content, and language from settings.
		$title        = $this->settings['title'] ?? '';
		$code_content = $this->settings['code_content'] ?? '';
		$language     = $this->settings['snippet_language'] ?? 'plaintext';
		$language     = 'language-' . $language;

		echo wp_kses_post( "<div {$this->render_attributes( '_root' )}>" );

		// Output the title.
		if ( ! empty( $title ) ) {
			echo '<h3>' . esc_html( $title ) . '</h3>';
		}

		// Output the code block with the selected language class.
		echo '<pre><code class="' . $language . '">' . $code_content . '</code></pre>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		echo '</div>';
	}

	/**
	 * Keywords
	 *
	 * @return array
	 */
	public function get_keywords() {
		return array( 'code', 'highlighter', 'highlight', 'syntax', 'highlighting', 'wpmb' );
	}
}
