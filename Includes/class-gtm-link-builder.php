<?php
namespace Gtm_Link_Builder\Includes;

use Gtm_Link_Builder\Admin\Gtm_Link_Builder_Admin;
use Gtm_Link_Builder\Frontend\Gtm_Link_Builder_Public;
use Gtm_Link_Builder\Includes\Gtm_Link_Builder_Link;

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://mower.com
 * @since      1.0.0
 *
 * @package    Gtm_Link_Builder
 * @subpackage Gtm_Link_Builder/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Gtm_Link_Builder
 * @subpackage Gtm_Link_Builder/includes
 * @author     Mower <tbelknap@mower.com>
 */
class Gtm_Link_Builder {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Gtm_Link_Builder_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	protected $label;
	protected $category;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $args = array() ) {
		if ( defined( 'MOWER_GTM_LINK_BUILDER_VERSION' ) ) {
			$this->version = MOWER_GTM_LINK_BUILDER_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'gtm-link-builder';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

		if( isset( $args['category'] ) ) {
			$this->set_category( $args['category'] );
		}
		if( isset( $args['label'] ) ) {
			$this->set_label( $args['label'] );
		}
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Gtm_Link_Builder_Loader. Orchestrates the hooks of the plugin.
	 * - Gtm_Link_Builder_i18n. Defines internationalization functionality.
	 * - Gtm_Link_Builder_Admin. Defines all hooks for the admin area.
	 * - Gtm_Link_Builder_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		$this->loader = new Gtm_Link_Builder_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Gtm_Link_Builder_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Gtm_Link_Builder_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Gtm_Link_Builder_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Gtm_Link_Builder_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Gtm_Link_Builder_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	public function instance( $args ) {
		return new Gtm_Link_Builder_Link( $args );
	}

	/**
	 * @return mixed
	 */
	public function get_label() {
		return $this->label;
	}

	/**
	 * @param mixed $label
	 */
	public function set_label( $label ) {
		$this->label = esc_attr( $label );
	}

	/**
	 * @return mixed
	 */
	public function get_category() {
		return $this->category;
	}

	/**
	 * @param mixed $category
	 */
	public function set_category( $category ) {
		$this->category = esc_attr( $category );
	}

}
