<?php

namespace Dimchtz\CF7_WYSIWYG\Modules;

if ( !defined('ABSPATH') ) {
    exit;
}

/**
 * Plugin's frontend class
 * 
 * @since 1.0.0
 */

class Frontend {

	public $instance;

	/**
	 * Frontend constructor.
	 *
	 * Initializing the frontend interface.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct($instance) {

		$this->instance = $instance;

		$this->register_hooks();
		$this->register_assets();

	}

	/**
     * Registers all frontend actions and filters.
     * 
     * @since 1.0.0
     * @access public
     */
	public function register_hooks() {

		if ( $this->instance->is_active ) {
			add_action('wpcf7_init', [$this, 'wpcf7_init']);
		}

	}

	/**
     * Registers all available frontend assets.
     * 
     * @since 1.0.0
     * @access public
     */
	public function register_assets() {

		if ( $this->instance->is_active ) {
			add_action('wp_enqueue_scripts', [$this, 'load_scripts']);
		}

	}

	/**
     * Loads all scripts for frontend.
     * 
     * @since 1.0.0
     * @access public
     */
	public function load_scripts() {

		$file_version = $this->instance->version;
		if ( defined(CF7_WYSIWYG_ENV) && CF7_WYSIWYG_ENV == 'DEVELOPMENT' ) {
			$file_version = time();
		}

		wp_enqueue_media();
		wp_enqueue_editor();

		wp_enqueue_script(
			'wysiwyg-main', 
			CF7_WYSIWYG_PLUGIN_ASSETS . '/js/main.frontend.js', 
			array('jquery'), 
			$file_version, 
			true
		);

	}

	/**
	 * Adds a new wysiwyg tag for CF7
     *
	 * @since 1.0.0
	 * @access public
	 */
	public function wpcf7_init() {

		\wpcf7_add_form_tag(
			'wysiwyg',
			[$this, 'wysiwyg_tag_handler'],
			['name-attr' => true]
		);

	}

	/**
	 * Loads the frontend template for the wysiwyg editor
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string The editor's template
	 */
	public function wysiwyg_tag_handler($tag) {

		$tag 	= new \WPCF7_FormTag($tag);
		$atts 	= array();

		$atts['class'] 	= $tag->get_class_option( wpcf7_form_controls_class( $tag->type, 'wysiwyg' ) );
		$atts['id'] 	= $tag->get_id_option() ?: uniqid();
		$atts['name'] 	= $tag->name;

		ob_start(); ?>

			<div class="wpcf7-wysiwyg-container">
				<textarea <?= wpcf7_format_atts( $atts ); ?>></textarea>
			</div>

		<?php return ob_get_clean();

	}

}