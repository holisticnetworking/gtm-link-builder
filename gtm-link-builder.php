<?php
/**
 * Plugin Name:     GTM Link Builder
 * Plugin URI:      https://mower.com
 * Description:     Creates links and tracks events for Google Tag Manager
 * Author:          Thomas Belknap
 * Author URI:      https://mower.com
 * Text Domain:     gtm-link-builder
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Gtm_Link_Builder
 */

namespace Gtm_Link_Builder;
use Gtm_Link_Builder\Library\Gtm_Link_Builder as Gtm_Link_Builder;

require_once plugin_dir_path( __FILE__ ) . '/Library/autoload.php';

// @todo: Push notification on every page load
// @todo: Listen for click events, push for registered ones.
// @todo: Create links with default label/category
// @todo: Admin panel for default settings
// @todo: Admin panel for registering events

$gtm_link_builder = new Gtm_Link_Builder();