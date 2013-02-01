<?php
//http://themeshaper.com/2010/06/03/sample-theme-options/
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'winterfell_options', 'winterfell_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'winterfelltheme' ), __( 'Homepage Slider', 'winterfelltheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for category selector
 */
$cats = get_categories();
foreach($cats as $cat){
$select_options[$cat->term_id]["value"] = $cat->term_id;
$select_options[$cat->term_id]["label"] = $cat->name;
}

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Home Page Slider', 'winterfelltheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'winterfelltheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'winterfell_options' ); ?>
			<?php $options = get_option( 'winterfell_theme_options' ); ?>

			<table class="form-table">
				<?php
				/**
				 * Choose # of posts
				 */
				?>
			
				<tr valign="top"><th scope="row"><?php _e( 'Number of Posts To Show', 'winterfelltheme' ); ?></th>
					<td>
						<input id="winterfell_theme_options[sometext]" class="regular-text" type="text" name="winterfell_theme_options[sometext]" value="<?php esc_attr_e( $options['sometext'] ); ?>" />
						<label class="description" for="winterfell_theme_options[sometext]"><?php _e( 'winterfell text input', 'winterfelltheme' ); ?></label>
					</td>
				</tr>


				<?php
				/**
				 * Select category for slider
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Category To Show', 'winterfelltheme' ); ?></th>
					<td>
						<select name="winterfell_theme_options[slide-cat]">
							<?php
								$selected = $options['slide-cat'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="winterfell_theme_options[slide-cat]"><?php _e( 'Category', 'winterfelltheme' ); ?></label>
					</td>
				</tr>

=
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'winterfelltheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;


	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['slide-cat'], $select_options ) )
		$input['slide-cat'] = null;



	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/