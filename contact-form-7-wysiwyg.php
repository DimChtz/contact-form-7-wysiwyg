<?php

/**
 * @link 			  #
 * @since 			  1.0.0
 * @package 		  Contact_Form_7_WYSIWYG
 *
 * @wordpress-plugin
 * Plugin Name: 	  WYSIWYG Editor for Contact Form 7
 * Plugin URI: 		  https://github.com/DimChtz/contact-form-7-wysiwyg
 * Description: 	  Adds WYSIWYG Editor field for Contact Form 7
 * Version: 		  1.0.2
 * Author: 			  Dimitris Chatzis
 * Author URI: 		  https://github.com/DimChtz
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cf7-wysiwyg
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( !defined('WPINC') ) {
	die;
}

define('CF7_WYSIWYG_VERSION', '1.0.0');
define('CF7_WYSIWYG_ENV', 'PRODUCTION');
define('CF7_WYSIWYG_PLUGIN_DIR', dirname(__FILE__));
define('CF7_WYSIWYG_PLUGIN_URL', plugin_dir_url(__FILE__));
define('CF7_WYSIWYG_PLUGIN_BASENAME', dirname(plugin_basename(__FILE__)));
define('CF7_WYSIWYG_PLUGIN_INCLUDES', CF7_WYSIWYG_PLUGIN_DIR . '/includes');
define('CF7_WYSIWYG_PLUGIN_TEMPLATES', CF7_WYSIWYG_PLUGIN_DIR . '/templates');
define('CF7_WYSIWYG_PLUGIN_ASSETS', CF7_WYSIWYG_PLUGIN_URL . '/assets');

// Call the bootloader
require_once __DIR__ . '/bootloader.php';