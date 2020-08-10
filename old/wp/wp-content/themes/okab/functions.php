<?php
/**
 * Okab functions and definitions
 *
 * @package Okab
 * @subpackage 0-function
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
$dima_framework_path  = get_template_directory() . '/framework';
$dima_functions_path  = get_template_directory() . '/framework/functions';
$dima_admin_path      = get_template_directory() . '/framework/functions/admin';
$dima_tmg_path        = get_template_directory() . '/framework/functions/admin/tmg';
$dima_extensions_path = get_template_directory() . '/framework/functions/extensions';
$dima_plugins_path    = get_template_directory() . '/framework/plugins';
$dima_widgets_path    = get_template_directory() . '/framework/functions/widgets';

/**
 * Helpers
 */

require_once( $dima_functions_path . '/helper.php' );
require_once( $dima_framework_path . '/dima_framework.php' );
require_once( $dima_functions_path . '/__okab-data.php' );
require_once( $dima_functions_path . '/template-shortcode.php' );

/*-----------------------------------------------------------------------------------*/
# Require Files
# With locate_template you can override these files with child theme it uses
# load_template() to include the files which uses require_once()
/*-----------------------------------------------------------------------------------*/
locate_template( 'framework/functions/open-graph.php', true, true );

/*if ( DIMA_AMP_IS_ACTIVE ) {
	require_once( $dima_functions_path . '/class-dima-amp.php' );
}*/

/**
 * specific functions.
 */
require_once( $dima_functions_path . '/__okab-template.php' );

/**
 * Admin
 */
require_once( $dima_admin_path . '/setup.php' );
require_once( $dima_admin_path . '/meta/setup.php' );
require_once( $dima_admin_path . '/widgets.php' );
require_once( $dima_admin_path . '/customizer/setup.php' );
require_once( $dima_admin_path . '/pixeldima-setup/setup.php' );

/**
 * Enqueue scripts and styles.
 */
require_once( $dima_functions_path . '/scripts.php' );
require_once( $dima_functions_path . '/styles.php' );

/**
 * Global Function
 */
require_once( $dima_functions_path . '/featured.php' );
require_once( $dima_functions_path . '/pagination.php' );
require_once( $dima_functions_path . '/navbar.php' );
require_once( $dima_functions_path . '/content.php' );
require_once( $dima_functions_path . '/classes.php' );
require_once( $dima_functions_path . '/class-breadcrumbs.php' );


/**
 * Plugins
 */
require_once( $dima_extensions_path . '/dima-mega-menu/dima-mega-menu.php' );


/**
 * Implement the Custom Header feature.
 */
require_once( $dima_tmg_path . '/activation.php' );
require_once( $dima_tmg_path . '/registration.php' );
require_once( $dima_tmg_path . '/updates.php' );

/**
 * Widgets
 */
require_once( $dima_widgets_path . '/widget-about.php' );
require_once( $dima_widgets_path . '/widget-twitter.php' );
require_once( $dima_widgets_path . '/widget-facebook.php' );
require_once( $dima_widgets_path . '/widget-instagram.php' );
require_once( $dima_widgets_path . '/widget-login.php' );
require_once( $dima_widgets_path . '/widget-feedburner.php' );
require_once( $dima_widgets_path . '/widget-social.php' );
require_once( $dima_widgets_path . '/widget-tabs.php' );
require_once( $dima_widgets_path . '/widget-news.php' );
require_once( $dima_widgets_path . '/widget-ads.php' );
require_once( $dima_widgets_path . '/widget-adsense.php' );
require_once( $dima_widgets_path . '/widget-text-html.php' );
require_once( $dima_widgets_path . '/widget-slider.php' );

if ( ! function_exists( 'dima_set_post_views' ) ) {
	function dima_set_post_views( $postID ) {
		$count_key = 'dima_post_views_count';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
		} else {
			$count ++;
			update_post_meta( $postID, $count_key, $count );
		}
	}
}

if ( DIMA_VISUAL_COMOPSER_IS_ACTIVE ) {
	require_once( $dima_extensions_path . '/visual-composer.php' );
}
if ( DIMA_WC_IS_ACTIVE ) {
	require_once( $dima_extensions_path . '/woocommerce.php' );
}
if ( DIMA_KB_IS_ACTIVE ) {
	require_once( $dima_extensions_path . '/knowledge-base.php' );
}
if ( DIMA_AMP_IS_ACTIVE ) {
	require_once( $dima_extensions_path . '/amp.php' );
}
if ( DIMA_BBPRESS_IS_ACTIVE ) {
	require_once( $dima_extensions_path . '/bbpress.php' );
}
if ( DIMA_REVOLUTION_SLIDER_IS_ACTIVE ) {
	require_once( $dima_extensions_path . '/revolution-slider.php' );
}

function module() {
	$labels = array(
		'name'               => _x( 'Modul', 'post type general name' ),
		'singular_name'      => _x( 'Modul', 'post type singular name' ),
		'add_new'            => _x( 'Adauga Modul', 'book' ),
		'add_new_item'       => __( 'Adauga Modul' ),
		'edit_item'          => __( 'Edit Modul' ),
		'new_item'           => __( 'Adauga Modul' ),
		'all_items'          => __( 'Toate Modulele' ),
		'view_item'          => __( 'Vezi Modul' ),
		'search_items'       => __( 'Cauta Modul' ),
		'not_found'          => __( 'Modul not found' ),
		'not_found_in_trash' => __( 'Modul not found in trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Module'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Sidebar Image',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes', 'templates', 'custom-fields' ),
		'has_archive'   => true,
		'hierarchical'  => true,
	);
	register_post_type( 'module', $args );
}
add_action( 'init', 'module' );

function custom_registration_redirect() {
	return home_url('/index.php/formular/');
}
add_action('woocommerce_registration_redirect', 'custom_registration_redirect', 2);


function add_custom_meta_boxes() {
	add_meta_box('wp_custom_attachment', 'Curs 1 PDF', 'wp_custom_attachment', 'module', 'normal', 'high');
	add_meta_box('wp_custom_attachment2', 'Curs 2 PDF', 'wp_custom_attachment2', 'module', 'normal', 'high');
	add_meta_box('wp_custom_attachment3', 'Curs 3 PDF', 'wp_custom_attachment3', 'module', 'normal', 'high');
	add_meta_box('wp_custom_attachment4', 'Curs 4 PDF', 'wp_custom_attachment4', 'module', 'normal', 'high'); 
	add_meta_box('wp_custom_attachment5', 'Curs 5 PDF', 'wp_custom_attachment5', 'module', 'normal', 'high');
	add_meta_box('wp_custom_attachment6', 'Curs 6 PDF', 'wp_custom_attachment6', 'module', 'normal', 'high');
	add_meta_box('wp_custom_attachment7', 'Curs 7 PDF', 'wp_custom_attachment7', 'module', 'normal', 'high');
	add_meta_box('wp_custom_attachment8', 'Curs 8 PDF', 'wp_custom_attachment8', 'module', 'normal', 'high');
	add_meta_box('wp_custom_attachment9', 'Curs 9 PDF', 'wp_custom_attachment9', 'module', 'normal', 'high');
	add_meta_box('wp_custom_attachment10', 'Curs 10 PDF', 'wp_custom_attachment10', 'module', 'normal', 'high');
	add_meta_box('wp_custom_attachment11', 'Curs 11 PDF', 'wp_custom_attachment11', 'module', 'normal', 'high');
	add_meta_box('wp_custom_attachment12', 'Curs 12 PDF', 'wp_custom_attachment12', 'module', 'normal', 'high'); 
} // end add_custom_meta_boxes

add_action('add_meta_boxes', 'add_custom_meta_boxes');

function wp_custom_attachment() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');


	if(get_post_meta($post->ID, 'wp_custom_attachment', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment', true)['url'].'">Download</a>';
	} else {
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment" name="wp_custom_attachment" value="" size="25" />';
	}


	echo $html;

}

function wp_custom_attachment2() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment2_nonce');
	if(get_post_meta($post->ID, 'wp_custom_attachment2', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment2', true)['url'].'">Download</a>';
	} else { 
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment2" name="wp_custom_attachment2" value="" size="25" />';
	}
	echo $html;

}

function wp_custom_attachment3() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment3_nonce');
	if(get_post_meta($post->ID, 'wp_custom_attachment3', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment3', true)['url'].'">Download</a>';
	} else {
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment3" name="wp_custom_attachment3" value="" size="25" />';
	}
	echo $html;

}

function wp_custom_attachment4() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment4_nonce');
	if(get_post_meta($post->ID, 'wp_custom_attachment4', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment4', true)['url'].'">Download</a>';
	} else {
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment4" name="wp_custom_attachment4" value="" size="25" />';
	}
	echo $html;

}

function wp_custom_attachment5() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment5_nonce');
	if(get_post_meta($post->ID, 'wp_custom_attachment5', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment5', true)['url'].'">Download</a>';
	} else {
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment5" name="wp_custom_attachment5" value="" size="25" />';
	}
	echo $html;

}

function wp_custom_attachment6() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment6_nonce');
	if(get_post_meta($post->ID, 'wp_custom_attachment6', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment6', true)['url'].'">Download</a>';
	} else {
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment6" name="wp_custom_attachment6" value="" size="25" />';
	}
	echo $html;

}

function wp_custom_attachment7() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment7_nonce');
	if(get_post_meta($post->ID, 'wp_custom_attachment7', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment7', true)['url'].'">Download</a>';
	} else {
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment7" name="wp_custom_attachment7" value="" size="25" />';
	}
	echo $html;

}

function wp_custom_attachment8() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment8_nonce');
	if(get_post_meta($post->ID, 'wp_custom_attachment8', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment8', true)['url'].'">Download</a>';
	} else {
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment8" name="wp_custom_attachment8" value="" size="25" />';
	}
	echo $html;

}

function wp_custom_attachment9() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment9_nonce');
	if(get_post_meta($post->ID, 'wp_custom_attachment9', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment9', true)['url'].'">Download</a>';
	} else {
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment9" name="wp_custom_attachment9" value="" size="25" />';
	}
	echo $html;

}

function wp_custom_attachment10() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment10_nonce');
	if(get_post_meta($post->ID, 'wp_custom_attachment10', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment10', true)['url'].'">Download</a>';
	} else {
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment10" name="wp_custom_attachment10" value="" size="25" />';
	}
	echo $html;

}

function wp_custom_attachment11() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment11_nonce');
	if(get_post_meta($post->ID, 'wp_custom_attachment11', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment11', true)['url'].'">Download</a>';
	} else {
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment11" name="wp_custom_attachment11" value="" size="25" />';
	}
	echo $html;

}

function wp_custom_attachment12() {
	global $post,$wpdb;
	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment12_nonce');
	if(get_post_meta($post->ID, 'wp_custom_attachment12', true)){
		$html .= '<a href="'.get_post_meta($post->ID, 'wp_custom_attachment12', true)['url'].'">Download</a>';
	} else {
		$html = '<p class="description">';
		$html .= 'Upload your PDF here.';
		$html .= '</p>';
		$html .= '<input type="file" id="wp_custom_attachment12" name="wp_custom_attachment12" value="" size="25" />';
	}
	echo $html;

}

function save_custom_meta_data($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment', $upload);
    			update_post_meta($id, 'wp_custom_attachment', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data


function save_custom_meta_data2($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment2_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment2']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment2']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment2']['name'], null, file_get_contents($_FILES['wp_custom_attachment2']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment2', $upload);
    			update_post_meta($id, 'wp_custom_attachment2', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment2'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data

function save_custom_meta_data3($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment3_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment3']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment3']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment3']['name'], null, file_get_contents($_FILES['wp_custom_attachment3']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment3', $upload);
    			update_post_meta($id, 'wp_custom_attachment3', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment3'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data

function save_custom_meta_data4($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment4_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment4']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment4']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment4']['name'], null, file_get_contents($_FILES['wp_custom_attachment4']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment4', $upload);
    			update_post_meta($id, 'wp_custom_attachment4', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment4'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data

function save_custom_meta_data5($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment5_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment5']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment5']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment5']['name'], null, file_get_contents($_FILES['wp_custom_attachment5']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment5', $upload);
    			update_post_meta($id, 'wp_custom_attachment5', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment5'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data

function save_custom_meta_data6($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment6_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment6']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment6']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment6']['name'], null, file_get_contents($_FILES['wp_custom_attachment6']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment6', $upload);
    			update_post_meta($id, 'wp_custom_attachment6', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment6'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data

function save_custom_meta_data7($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment7_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment7']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment7']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment7']['name'], null, file_get_contents($_FILES['wp_custom_attachment7']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment7', $upload);
    			update_post_meta($id, 'wp_custom_attachment7', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment7'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data

function save_custom_meta_data8($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment8_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment8']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment8']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment8']['name'], null, file_get_contents($_FILES['wp_custom_attachment8']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment8', $upload);
    			update_post_meta($id, 'wp_custom_attachment8', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment8'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data


function save_custom_meta_data9($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment9_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment9']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment9']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment9']['name'], null, file_get_contents($_FILES['wp_custom_attachment9']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment9', $upload);
    			update_post_meta($id, 'wp_custom_attachment9', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment9'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data

function save_custom_meta_data10($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment10_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment10']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment10']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment10']['name'], null, file_get_contents($_FILES['wp_custom_attachment10']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment10', $upload);
    			update_post_meta($id, 'wp_custom_attachment10', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment10'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data

function save_custom_meta_data11($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment11_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment11']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment11']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment11']['name'], null, file_get_contents($_FILES['wp_custom_attachment11']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment11', $upload);
    			update_post_meta($id, 'wp_custom_attachment11', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment11'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data

function save_custom_meta_data12($id) {

	/* --- security verification --- */
	if(!wp_verify_nonce($_POST['wp_custom_attachment12_nonce'], plugin_basename(__FILE__))) {
		return $id;
    } // end if

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return $id;
    } // end if

    if('module' == $_POST['post_type']) {
    	if(!current_user_can('edit_page', $id)) {
    		return $id;
      } // end if
  } else {
  	if(!current_user_can('edit_page', $id)) {
  		return $id;
        } // end if
    } // end if
    /* - end security verification - */

    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment12']['name'])) {

        // Setup the array of supported file types. In this case, it's just PDF.
    	$supported_types = array('application/pdf');

        // Get the file type of the upload
    	$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment12']['name']));
    	$uploaded_type = $arr_file_type['type'];

        // Check if the type is supported. If not, throw an error.
    	if(in_array($uploaded_type, $supported_types)) {

            // Use the WordPress API to upload the file
    		$upload = wp_upload_bits($_FILES['wp_custom_attachment12']['name'], null, file_get_contents($_FILES['wp_custom_attachment12']['tmp_name']));

    		if(isset($upload['error']) && $upload['error'] != 0) {
    			wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    		} else {
    			add_post_meta($id, 'wp_custom_attachment12', $upload);
    			update_post_meta($id, 'wp_custom_attachment12', $upload);     
            } // end if/else
            unset( $_FILES['wp_custom_attachment12'] ); 
        } else {
        	wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else

    } // end if

} // end save_custom_meta_data

add_action('save_post', 'save_custom_meta_data');
add_action('save_post', 'save_custom_meta_data2');
add_action('save_post', 'save_custom_meta_data3');
add_action('save_post', 'save_custom_meta_data4');

add_action('save_post', 'save_custom_meta_data5');
add_action('save_post', 'save_custom_meta_data6');
add_action('save_post', 'save_custom_meta_data7');
add_action('save_post', 'save_custom_meta_data8');

add_action('save_post', 'save_custom_meta_data9');
add_action('save_post', 'save_custom_meta_data10');
add_action('save_post', 'save_custom_meta_data11');
add_action('save_post', 'save_custom_meta_data12');

function update_edit_form() {
	echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');

add_action("admin_menu", "cheama_admin");

function cheama_admin() { 
	add_menu_page('Cursanti', 'Cursanti', 'manage_options', 'oameni_inscrisi', 'oameni_inscrisi');  
}  

function oameni_inscrisi() {  
	 $file = plugin_dir_path( __FILE__ ) . "oameni_inscrisi.php";

    if ( file_exists( $file ) )
        require $file;

} 

add_action('admin_head', 'hide_links');

function hide_links() {
  echo '<style>
    #menu-posts-dima-portfolio {
	  display: none;
	}
	#menu-comments {
		display: none;
	}
	#toplevel_page_woocommerce {
		display: none;
	}
	#menu-posts-product {
		display: none;
	}
	#menu-posts-forum {
		display: none;
	}
	#menu-posts-reply {
		display: none;
	}
	#toplevel_page_mailchimp-for-wp {
		display: none;
	}
	#toplevel_page_envato-market {
		display: none;
	}
	#toplevel_page_amp-plugin-options {
		display: none;
	}
	#toplevel_page_vc-general {
		display: none;
	}
	#menu-posts-topic {
		display: none;
	}
	#menu-posts {
		display:none;
	}
  </style>';
}