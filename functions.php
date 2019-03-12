<?php

function ClassAutoloader($class_name) {

    /**
     * If the class being requested does not start with our prefix,
     * we know it's not one in our project
     */
    if (0 !== strpos($class_name, 'DPT')) {
        return;
    }

//    $new_class_name = "class-".$class_name;
    $file_name = str_replace(
            '_', // Prefix | Underscores 
            '-', // Remove | Replace with hyphens
            strtolower($class_name) // lowercase
    );

    // Compile our path from the current location
    $file = dirname(__FILE__) . '/includes/class-' . $file_name . '.php';

    // If a file is found
    if (file_exists($file)) {
        // Then load it up!
        require_once "$file";
    } else {
        echo $file . " not exist";
    }
}

spl_autoload_register('ClassAutoloader');

$init = new DPT_Initializer();

function FrontPageHeader() {
    global $init;
    $init->FrontPageHeader();
}

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Start Class
if (!class_exists('WPEX_Theme_Options')) {

    class WPEX_Theme_Options {

        /**
         * Start things up
         *
         * @since 1.0.0
         */
        public function __construct() {

            // We only need to register the admin panel on the back-end
            if (is_admin()) {
                add_action('admin_menu', array('WPEX_Theme_Options', 'add_admin_menu'));
                add_action('admin_init', array('WPEX_Theme_Options', 'register_settings'));
            }
        }

        /**
         * Returns all theme options
         *
         * @since 1.0.0
         */
        public static function get_theme_options() {
            return get_option('theme_options');
        }

        /**
         * Returns single theme option
         *
         * @since 1.0.0
         */
        public static function get_theme_option($id) {
            $options = self::get_theme_options();
            if (isset($options[$id])) {
                return $options[$id];
            }
        }

        /**
         * Add sub menu page
         *
         * @since 1.0.0
         */
        public static function add_admin_menu() {
            add_menu_page(
                    esc_html__('Theme Settings', 'text-domain'), esc_html__('Theme Settings', 'text-domain'), 'manage_options', 'theme-settings', array('WPEX_Theme_Options', 'create_admin_page')
            );
        }

        /**
         * Register a setting and its sanitization callback.
         *
         * We are only registering 1 setting so we can store all options in a single option as
         * an array. You could, however, register a new setting for each option
         *
         * @since 1.0.0
         */
        public static function register_settings() {
            register_setting('theme_options', 'theme_options', array('WPEX_Theme_Options', 'sanitize'));
        }

        /**
         * Sanitization callback
         *
         * @since 1.0.0
         */
        public static function sanitize($options) {

            // If we have options lets sanitize them
            if ($options) {

                // Checkbox
                if (!empty($options['checkbox_example'])) {
                    $options['checkbox_example'] = 'on';
                } else {
                    unset($options['checkbox_example']); // Remove from options if not checked
                }

                // Input
                if (!empty($options['input_example'])) {
                    $options['input_example'] = sanitize_text_field($options['input_example']);
                } else {
                    unset($options['input_example']); // Remove from options if empty
                }

                // Select
                if (!empty($options['select_example'])) {
                    $options['select_example'] = sanitize_text_field($options['select_example']);
                }
            }

            // Return sanitized options
            return $options;
        }

        /**
         * Settings page output
         *
         * @since 1.0.0
         */
        public static function create_admin_page() {
            ?>

            <div class="wrap">

                <h1><?php esc_html_e('Theme Options', 'text-domain'); ?></h1>

                <form method="post" action="options.php">

            <?php settings_fields('theme_options'); ?>

                    <table class="form-table wpex-custom-admin-login-table">

                    <?php // Checkbox example  ?>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Checkbox Example', 'text-domain'); ?></th>
                            <td>
                        <?php $value = self::get_theme_option('checkbox_example'); ?>
                                <input type="checkbox" name="theme_options[checkbox_example]" <?php checked($value, 'on'); ?>> <?php esc_html_e('Checkbox example description.', 'text-domain'); ?>
                            </td>
                        </tr>

                                <?php // Text input example ?>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Input Example', 'text-domain'); ?></th>
                            <td>
                        <?php $value = self::get_theme_option('input_example'); ?>
                                <input type="text" name="theme_options[input_example]" value="<?php echo esc_attr($value); ?>">
                            </td>
                        </tr>

                                <?php // Select example ?>
                        <tr valign="top" class="wpex-custom-admin-screen-background-section">
                            <th scope="row"><?php esc_html_e('Select Example', 'text-domain'); ?></th>
                            <td>
                        <?php $value = self::get_theme_option('select_example'); ?>
                                <select name="theme_options[select_example]">
            <?php
            $options = array(
                '1' => esc_html__('Option 1', 'text-domain'),
                '2' => esc_html__('Option 2', 'text-domain'),
                '3' => esc_html__('Option 3', 'text-domain'),
            );
            foreach ($options as $id => $label) {
                ?>
                                        <option value="<?php echo esc_attr($id); ?>" <?php selected($value, $id, true); ?>>
                                        <?php echo strip_tags($label); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>

                    </table>

            <?php submit_button(); ?>

                </form>

            </div><!-- .wrap -->
        <?php
        }

    }

}
new WPEX_Theme_Options();

// Helper function to use in your theme to return a theme option value
function myprefix_get_theme_option($id = '') {
    return WPEX_Theme_Options::get_theme_option($id);
}


/// media button//
add_action( 'admin_menu', 'register_media_selector_settings_page' );
function register_media_selector_settings_page() {
	add_submenu_page( 'options-general.php', 'Media Selector', 'Media Selector', 'manage_options', 'media-selector', 'media_selector_settings_page_callback' );
}
function media_selector_settings_page_callback() {
	// Save attachment ID
	if ( isset( $_POST['submit_image_selector'] ) && isset( $_POST['image_attachment_id'] ) ) :
		update_option( 'media_selector_attachment_id', absint( $_POST['image_attachment_id'] ) );
	endif;
	wp_enqueue_media();
	?><form method='post'>
		<div class='image-preview-wrapper'>
			<img id='image-preview' src='<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>' height='100'>
		</div>
		<input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
		<input type='hidden' name='image_attachment_id' id='image_attachment_id' value='<?php echo get_option( 'media_selector_attachment_id' ); ?>'>
		<input type="submit" name="submit_image_selector" value="Save" class="button-primary">
	</form><?php
}
add_action( 'admin_footer', 'media_selector_print_scripts' );
function media_selector_print_scripts() {
	$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
	?><script type='text/javascript'>
		jQuery( document ).ready( function( $ ) {
			// Uploading files
			var file_frame;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
			var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
			jQuery('#upload_image_button').on('click', function( event ){
				event.preventDefault();
				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					// Set the post ID to what we want
					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}
				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select a image to upload',
					button: {
						text: 'Use this image',
					},
					multiple: false	// Set to true to allow multiple files to be selected
				});
				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();
					// Do something with attachment.id and/or attachment.url here
					$( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
					$( '#image_attachment_id' ).val( attachment.id );
					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});
					// Finally, open the modal
					file_frame.open();
			});
			// Restore the main ID when the add media button is pressed
			jQuery( 'a.add_media' ).on( 'click', function() {
				wp.media.model.settings.post.id = wp_media_post_id;
			});
		});
	</script><?php
}

