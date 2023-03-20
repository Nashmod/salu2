<?php

/**
 * Plugin Name: Obsidianlab
 * Description: Obsidianlab custom code.
 * Version: 0.1.0
 * Author: Obsidianlab
 * Author URI: https://obsidianlab.io
 * Text Domain: obsidianlab
 * Domain Path: /languages
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

define('OBSIDIANLAB__FILE__', __FILE__);
define('OBSIDIANLAB_PLUGIN_BASE', plugin_basename(OBSIDIANLAB__FILE__));
define('OBSIDIANLAB_PATH', plugin_dir_path(OBSIDIANLAB__FILE__));

require_once OBSIDIANLAB_PATH . 'inc/plugin.php';
