<?php
namespace Gtm_Link_Builder\Admin;

class Gtm_Link_Builder_Screens {
	// @todo GTM for WordPress Menus
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_screens' ] );
		add_action( 'admin_init', [ $this, 'register_settings' ] );
	}

	public function register_settings() {
		register_setting( 'gtm-account-info', 'container_id' );
		register_setting( 'gtm-tags', 'tag_variables' );
	}

	public function admin_screens() {
		// Primary page, account info
		add_menu_page(
			__( 'Google Tag Manager', 'gtm-link-builder' ),
			__( 'Tag Manager', 'gtm-link-builder' ),
			'administrator',
			__FILE__,
			[ $this, 'account_settings_page' ],
			'dashicons-tag'
		);
		// Define tags:
		add_submenu_page(
			__FILE__,
			'Tags',
			'Tags',
			'administrator',
			'tags',
			[ $this, 'tags_screen' ]
		);
		// Define tags:
		add_submenu_page(
			__FILE__,
			'Menus',
			'Menus',
			'administrator',
			'menus',
			[ $this, 'menus_screen' ]
		);
	}

	public function account_settings_page() {
		?>
		<div class="wrap">
			<h1>Google Tag Manager Link Builder</h1>
			<form method="post" action="options.php">
				<?php settings_fields( 'gtm-account-info' ); ?>
				<?php do_settings_sections( 'gtm-account-info' ); ?>
				<label for="container_id">Container ID</label><input type="text" name="container_id" id="container_id" value="<?php echo esc_attr( get_option('container_id') ); ?>" />
				<?php submit_button('Update'); ?>
			</form>
		</div>
		<?php
	}

	public function tags_screen() {
		$tags  = get_option('tag_variables');
		$count = 0;
		?>
		<div class="wrap">
			<h1>Tag and Value Registration</h1>
			<p>Below is a matrix of key/default value pairs for your GTM account. These represent the data-{{key}}={{value}} format that data attributes will take once applied to the page.</p>
			<form method="post" action="options.php">
				<?php settings_fields( 'gtm-tags' ); ?>
				<?php do_settings_sections( 'gtm-tags' ); ?>
				<table class="gtm-link-builder-table">
					<thead><td>Label</td><td>Default value</td></thead>
					<tbody>
					<?php
						if( is_array( $tags ) ) {
							$count = count( $tags );
							foreach( $tags as $key=>$data ) {
								$key_input = sprintf(
									'<label>data-</label><input type="text" name="tag_variables[%d][key]" value="%s"',
									$key,
									$data['key']
								);
								$val_input = sprintf(
									'<input type="text" name="tag_variables[%d][value]" value="%s"',
									$key,
									$data['value']
								);
								printf(
									'<tr><td>%s</td><td>%s</td></tr>',
									$key_input,
									$val_input
								);
							}
						}
					?>
					<tr>
						<td><label>data-</label><input type="text" placeholder="attribute" name="tag_variables[<?php echo $count ?>][key]" /></td>
						<td><input type="text" placeholder="defaut" name="tag_variables[<?php echo $count ?>][value]" /></td>
					</tr>
					</tbody>
					<tfoot><td>Label</td><td>Default value</td></tfoot>
				</table>
				<?php submit_button('Update'); ?>
			</form>
		</div>
		<?php
	}

	public function menus_screen() {
		echo 'Gnarly. This is, like, menu stuff.';
	}
}