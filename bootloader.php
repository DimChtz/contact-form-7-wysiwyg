<?php

namespace Dimchtz\CF7_WYSIWYG;

if ( !defined('ABSPATH') ) {
	exit;
}

// Autoloader will load all the required files
require_once CF7_WYSIWYG_PLUGIN_INCLUDES . '/autoloader.php';

// Plugin Activator/Deactivator
register_activation_hook(CF7_WYSIWYG_PLUGIN_BASENAME, 'Activator::activate');
register_deactivation_hook(CF7_WYSIWYG_PLUGIN_BASENAME, 'Activator::deactivate');

// Fire plugin's core
Plugin::instance();