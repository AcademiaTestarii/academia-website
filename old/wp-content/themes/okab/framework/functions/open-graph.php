<?php
/**
 * Open graph functions
 *
 * @package Noor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


/*-----------------------------------------------------------------------------------*/
# Open Graph Meta for posts
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'dima_opengraph' ) ) {

	add_action( 'wp_head', 'dima_opengraph' );
	function dima_opengraph() {

		# Check if single and og is active and there is no OG plugin is active ----------
		if ( dima_is_opengraph_active() || ! is_singular() || ! dima_helper::dima_am_i_true( dima_helper::dima_get_option( 'dima_open_graph_meta_tag' ) ) ) {
			return;
		}

		$post           = get_post();
		$og_title       = the_title_attribute( 'echo=0' ) . ' - ' . get_bloginfo( 'name' );
		$og_description = apply_filters( 'dima_exclude_content', $post->post_content );
		$og_description = strip_tags( strip_shortcodes( $og_description ) );
		$og_type        = 'article';
		if ( is_home() || is_front_page() ) {
			$og_title       = get_bloginfo( 'name' );
			$og_description = get_bloginfo( 'description' );
			$og_type        = 'website';
		}

		echo '
<meta property="og:title" content="' . $og_title . '" />
<meta property="og:type" content="' . $og_type . '" />
<meta property="og:description" content="' . esc_attr( wp_html_excerpt( $og_description, 100 ) ) . '" />
<meta property="og:url" content="' . get_permalink() . '" />
<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '" />
';

		if ( has_post_thumbnail() ) {
			echo '<meta property="og:image" content="' . dima_helper::dima_get_featured_image_url( 'dima-post-standard-image' ) . '" />' . "\n";
		}
	}

}


/*-----------------------------------------------------------------------------------*/
# Add the opengraph namespace to the <html> tag
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'dima_add_opengraph_namespace' ) ) {

	add_filter( 'language_attributes', 'dima_add_opengraph_namespace' );
	function dima_add_opengraph_namespace( $input ) {

		# Check if single and og is active and there is no OG plugin is active ----------
		if ( is_admin() || dima_is_opengraph_active() || ! is_singular() || ! dima_helper::dima_get_option( 'dima_open_graph_meta_tag' ) ) {
			return $input;
		}

		return $input . ' prefix="og: http://ogp.me/ns#"';
	}

}


/*-----------------------------------------------------------------------------------*/
# Check if a an open graph plugin active
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'dima_is_opengraph_active' ) ) {

	function dima_is_opengraph_active() {

		# Yoast SEO ----------
		if ( class_exists( 'WPSEO_Frontend' ) ) {
			$yoast = get_option( 'wpseo_social' );
			if ( ! empty( $yoast['opengraph'] ) ) {
				return true;
			}
		}

		# Jetpack ----------
		if ( DIMA_JETPACK_IS_ACTIVE && ( in_array( 'publicize', Jetpack::get_active_modules() ) || in_array( 'sharedaddy', Jetpack::get_active_modules() ) ) ) {
			return true;
		}

		# Else ----------
		return false;
	}

}