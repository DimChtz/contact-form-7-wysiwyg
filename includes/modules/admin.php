<?php

namespace Dimchtz\CF7_WYSIWYG\Modules;

if ( !defined('ABSPATH') ) {
    exit;
}

/**
 * Plugin's admin class
 * 
 * @since 1.0.0
 */

class Admin {

	public $instance;

	/**
	 * Admin constructor.
	 *
	 * Initializing the admin interface.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct($instance) {

		$this->instance = $instance;

		$this->register_hooks();

	}

	/**
     * Registers all admin actions and filters.
     * 
     * @since 1.0.0
     * @access public
     */
	public function register_hooks() {

		if ( $this->instance->is_active ) {
			add_action('wpcf7_admin_init', [$this, 'wpcf7_init'], 45);
		} else {
			add_action('admin_notices', [$this, 'requirements_notification']);
		}

	}

	/**
	 * Prints a notice for plugin requirements
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function requirements_notification() { ?>

	    <div class="notice notice-error">
	        <p>
	        	<?php _e('WYSIWYG Editor for Contact Form 7 is enabled but not effective', 'cf7-wysiwyg'); ?>.
	        	<?php _e('Please install and activate', 'cf7-wysiwyg'); ?> <a href="<?= admin_url('/plugin-install.php?s=Contact+Form+7&tab=search&type=term'); ?>"><?php _e('Contact Form 7', 'cf7-wysiwyg'); ?></a>.
	        </p>
	    </div>

	<?php }

	/**
	 * Adds a new wysiwyg tag for CF7
     *
	 * @since 1.0.0
	 * @access public
	 */
	public function wpcf7_init() {

		\WPCF7_TagGenerator::get_instance()->add(
			'wysiwyg',
			'WYSIWYG Editor',
			[$this, 'wysiwyg_tag_generator']
		);

	}

	/**
	 * Loads the template for the wysiwyg tag generator form
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function wysiwyg_tag_generator($contact_form, $args = '') {

		include CF7_WYSIWYG_PLUGIN_TEMPLATES . '/generator.php';

	}

}