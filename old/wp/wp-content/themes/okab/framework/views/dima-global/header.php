<?php
/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>

<!DOCTYPE html>
<!--[if IE 9]>
<html class="no-js ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
	if ( ! function_exists( 'dima_meta_site_icon' ) ) :
		function dima_meta_site_icon() {
			/*Faveicon*/
			$dima_iphone_icon        = dima_helper::dima_get_option( 'dima_iphone_icon' );
			$dima_iphone_retina_icon = dima_helper::dima_get_option( 'dima_iphone_retina_icon' );
			$dima_ipad_icon          = dima_helper::dima_get_option( 'dima_ipad_icon' );
			$dima_ipad_retina_icon   = dima_helper::dima_get_option( 'dima_ipad_retina_icon' );

			if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
				$dima_favicon = dima_helper::dima_get_option( 'dima_favicon' );
				if ( $dima_favicon != '' ) {
					echo '<link rel="shortcut icon" href="' . esc_url( dima_helper::dima_protocol_relative( $dima_favicon ) ) . '">';
				}
			}
			if ( $dima_iphone_icon != '' ) {
				echo '<link rel="apple-touch-icon" sizes="57x57" href="' . esc_url( dima_helper::dima_protocol_relative( $dima_iphone_icon ) ) . '">';
			}
			if ( $dima_iphone_retina_icon != '' ) {
				echo '<link rel="apple-touch-icon" sizes="120x120" href="' . esc_url( dima_helper::dima_protocol_relative( $dima_iphone_retina_icon ) ) . '">';
			}
			if ( $dima_ipad_icon != '' ) {
				echo '<link rel="apple-touch-icon" sizes="72x72" href="' . esc_url( dima_helper::dima_protocol_relative( $dima_ipad_icon ) ) . '">';
			}
			if ( $dima_ipad_retina_icon != '' ) {
				echo '<link rel="apple-touch-icon" sizes="144x144" href="' . esc_url( dima_helper::dima_protocol_relative( $dima_ipad_retina_icon ) ) . '">';
			}

			/*Appel Icon*/
		}

		add_action( 'wp_head', 'dima_meta_site_icon', 0 );
	endif;

	?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="all_content">