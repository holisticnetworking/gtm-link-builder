<?php
namespace Gtm_Link_Builder;

use Gtm_Link_Builder\Includes\Gtm_Link_Builder;
use Gtm_Link_Builder\Includes\Gtm_Link_Builder_Activator;
use Gtm_Link_Builder\Includes\Gtm_Link_Builder_Deactivator;

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://mower.com
 * @since             1.0.0
 * @package           Gtm_Link_Builder
 *
 * @wordpress-plugin
 * Plugin Name:       Google Tag Manager Link Builder
 * Plugin URI:        http://mower.com
 * Description:       Creates mess-free HTML5 links with Google Tag Manager markup.
 * Version:           1.0.0
 * Author:            Mower
 * Author URI:        http://mower.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gtm-link-builder
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Autoloader
 */
require_once plugin_dir_path( __FILE__ ) . '/Includes/autoload.php';
// require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MOWER_GTM_LINK_BUILDER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gtm-link-builder-activator.php
 */
function activate_gtm_link_builder() {
	Gtm_Link_Builder_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gtm-link-builder-deactivator.php
 */
function deactivate_gtm_link_builder() {
	Gtm_Link_Builder_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gtm_link_builder' );
register_deactivation_hook( __FILE__, 'deactivate_gtm_link_builder' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function get_gtm_link_builder() {
	$gtm_factory = new Gtm_Link_Builder();
	$gtm_factory->run();
	return $gtm_factory;
}
