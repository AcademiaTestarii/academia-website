<?php
/**
 * AMP
 *
 * @package DIMA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


if ( ! class_exists( 'DIMA_AMP' ) ) {

	class DIMA_AMP {

		/**
		 * __construct
		 *
		 * Class constructor where we will call our filter and action hooks.
		 */
		function __construct() {

			if ( ! DIMA_AMP_IS_ACTIVE || ! dima_helper::dima_am_i_true( dima_helper::dima_get_option( 'dima_amp_enable' ) ) ) {
				return false;
			}


			# Disable the AMP Customizer menu, Control styles from the theme options page.
			remove_action( 'admin_menu', 'amp_add_customizer_link' );

			# Actions ----------
			add_action( 'pre_amp_render_post', array( $this, 'dima_content_filters' ) );
			add_action( 'amp_post_template_head', array( $this, 'dima_head' ) );
			add_action( 'amp_post_template_head', array( $this, 'dima_remove_google_fonts' ), 2 );
			add_action( 'amp_post_template_css', array( $this, 'dima_amp_additional_css_styles' ) );

			# Filters ----------
			add_filter( 'amp_content_max_width', array( $this, 'dima_content_width' ) );
			add_filter( 'amp_post_template_file', array( $this, 'dima_templates_path' ), 10, 3 );


			# Do not load Merriweather Google fonts on AMP pages ----------
			remove_action( 'amp_post_template_head', 'amp_post_template_add_fonts' );

		}


		/**
		 * dima_content_filters
		 *
		 * Add related posts, ads, formats and share buttons to the post content
		 */
		function dima_content_filters() {
			add_filter( 'the_content', array( $this, 'dima_ads' ) );
			add_filter( 'the_content', array( $this, 'dima_post_formats' ) );
			add_filter( 'the_content', array( $this, 'dima_share_buttons' ) );
			add_filter( 'the_content', array( $this, 'dima_related_posts' ) );
		}


		/**
		 * dima_post_formats
		 */
		function dima_post_formats( $content ) {

			$post_format = 'standard';

			ob_start();

			if ( $post_format ) {

				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
			}

			$output = ob_get_clean();

			if ( ! empty( $output ) ) {
				$output  = '<div class="amp-featured">' . $output . '</div>';
				$content = $output . $content;
			}

			return $content;
		}


		/**
		 * dima_related_posts
		 *
		 * Add related posts below the post content
		 */
		function dima_related_posts( $content ) {
			$related_posts_is_on = dima_helper::dima_am_i_true( dima_helper::dima_get_option( 'dima_amp_related_posts' ) );
			$heading             = esc_html__( 'Check Also', 'noor' );
			if ( $related_posts_is_on ) {

				$args = array(
					'posts_per_page' => 5,
					'post_status'    => 'publish',
				);

				$recent_posts = new WP_Query( $args );

				if ( $recent_posts->have_posts() ) {

					$output = '
						<div class="dima-amp-related-posts">
							<h3>' . $heading . '</h3>
							';

					while ( $recent_posts->have_posts() ) {
						$recent_posts->the_post();
						$output .= '<a href="' . amp_get_permalink( get_the_ID() ) . '">' . get_the_title() . '</a>';
					}

					$output .= '
						</div>
					';

					$content = $content . $output;
				}
			}

			return $content;
		}


		/**
		 * dima_share_buttons
		 *
		 * Add the share buttons
		 */
		function dima_share_buttons( $content ) {
			$related_shear_icon_is_on = dima_helper::dima_am_i_true( dima_helper::dima_get_option( 'dima_amp_share_buttons' ) );

			if ( $related_shear_icon_is_on ) {

				$share_buttons = '
					<div class="amp-social">
						<amp-social-share type="facebook"
							width="60"
							height="44"
							data-param-app_id=' . dima_helper::dima_get_option( 'dima_amp_facebook_id' ) . '></amp-social-share>

						<amp-social-share type="twitter"
							width="60"
							height="44"></amp-social-share>

						<amp-social-share type="gplus"
							width="60"
							height="44"></amp-social-share>

						<amp-social-share type="pinterest"
							width="60"
							height="44"></amp-social-share>

						<amp-social-share type="linkedin"
							width="60"
							height="44"></amp-social-share>

						<amp-social-share type="email"
							width="60"
							height="44"></amp-social-share>

					</div>
				';

				$content = $content . $share_buttons;
			}

			return $content;
		}


		/**
		 * dima_ads
		 */
		function dima_ads( $content ) {

			if ( dima_helper::dima_get_option( 'dima_amp_ad_abover' ) != '' ) {
				$content = dima_helper::dima_get_option( 'dima_amp_ad_abover' ) . $content;
			}

			if ( dima_helper::dima_get_option( 'dima_amp_ad_below' ) != '' ) {
				$content = $content . dima_helper::dima_get_option( 'dima_amp_ad_below' );
			}

			return $content;
		}

		/**
		 * dima_content_width
		 */
		function dima_content_width( $content_max_width ) {
			return 840;
		}


		/**
		 * dima_remove_google_fonts
		 *
		 * Do not load Merriweather Google fonts on AMP pages
		 */
		function dima_remove_google_fonts() {

			remove_action( 'amp_post_template_head', 'amp_post_template_add_fonts' );
		}


		/**
		 * _head
		 *
		 */
		function dima_head() {

			# Carousel js file for the Sliders ----------
			echo '<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>';

			# Ads js file ----------
			if ( dima_helper::dima_get_option( 'dima_amp_ad_abover' ) != '' || dima_helper::dima_get_option( 'dima_amp_ad_below' ) != '' ) {
				echo '<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>';
			}

			# Share Buttons ----------
			$related_shear_icon_is_on = dima_helper::dima_am_i_true( dima_helper::dima_get_option( 'dima_amp_share_buttons' ) );
			if ( $related_shear_icon_is_on ) {
				echo '<script custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js" async></script>';
			}

		}


		/**
		 * dima_templates_path
		 *
		 * Set custom template path
		 */
		function dima_templates_path( $file, $type, $post ) {
			if ( 'footer' === $type || 'single' === $type || 'featured-image' === $type ) {
				$file = DIMA_TEMPLATE_PATH . '/amp_templates/' . $type . '.php';
			}

			return $file;
		}


		function dima_amp_additional_css_styles() {
			$amp_log     = $amp_logo_footer = '';
			$logo        = dima_helper::dima_get_option( 'dima_amp_logo' );
			$footer_logo = dima_helper::dima_get_option( 'dima_amp_footer_logo' );
			$logo_retina = $var_header_logo_width = dima_helper::dima_get_option( "dima_header_logo_retina" );

			/* Style */
			$body_bg_color = dima_helper::dima_get_option( 'dima_amp_bg_color' );
			$text_color    = dima_light_or_dark( $body_bg_color, false, '#818181' );
			$title_color   = dima_helper::dima_get_option( 'dima_amp_title_color', $text_color );

			$header_bg_color = dima_helper::dima_get_option( 'dima_amp_header_bg_color' );

			$meta_color = dima_helper::dima_get_option( 'dima_amp_meta_color' );
			$link_color = dima_helper::dima_get_option( 'dima_amp_link_color' );

			$footer_bg_color      = dima_helper::dima_get_option( 'dima_amp_footer_bg_color' );
			$footer_color         = dima_light_or_dark( $footer_bg_color, false, '#333333', '#a2a2a2' );
			$footer_link_color    = dima_light_or_dark( $footer_bg_color, false, '#333333', '#FFFFFF' );
			$sec_footer_color     = dima_helper::dima_get_option( 'dima_amp_footer_border_color' );
			$sec_footer_txt_color = dima_light_or_dark( $sec_footer_color, false, '#333333', '#FFFFFF' );

			if ( $amp_logo_footer == '' ) {
				$amp_logo_footer = $footer_logo;
			}
			if ( $logo_retina == '' && $logo == '' ) {
				$amp_log = '';
			} else if ( $logo != '' ) {
				$amp_log = $logo;
			} else if ( $logo_retina != '' ) {
				$amp_log = $logo_retina;
			}
			?>


            html{
            background-color: <?php echo esc_attr( $header_bg_color ); ?>;
            }

            body {
            background: <?php echo esc_attr( $body_bg_color ); ?>;
            color: <?php echo esc_attr( $text_color ); ?>;
            font-weight: 300;
            line-height: 1.75em;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue","Open Sans",sans-serif;
            padding-bottom: 0;
            }

            .amp-wp-article{
            color: <?php echo esc_attr( $text_color ); ?>;
            font-weight: 400;
            margin: 1.5em auto;
            max-width: 700px;
            overflow-wrap: break-word;
            word-wrap: break-word;
            }

            .amp-wp-title {
            color: <?php echo esc_attr( $title_color ); ?>;
            display: block;
            flex: 1 0 100%;
            font-weight: bold;
            margin: 0 0 .625em;
            width: 100%;
            font-size: 2em;
            line-height: 1.2;
            }

            h1,h2,h3,h4,h5,h6{
            color: <?php echo esc_attr( $title_color ); ?>;
            }

            .amp-wp-meta {
            color: <?php echo esc_attr( $meta_color ); ?>;
            display: inline-block;
            flex: 2 1 50%;
            }

            .amp-wp-header {
            background-color: <?php echo esc_attr( $header_bg_color ); ?>;
            box-shadow: 0 0 24px 0 rgba(0,0,0,0.25);
            }
            .amp-wp-header .amp-wp-site-icon{
            display:none;
            }

            .amp-wp-header div {
            color: <?php echo esc_attr( $title_color ); ?>;
            font-size: 1em;
            font-weight: 400;
            margin: 0 auto;
            max-width: calc(700px - 32px);
            position: relative;
            padding: 23px 16px;
            }
            .amp-wp-header a {
            background-image: url(<?php echo esc_url( $amp_log ) ?>);
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center center;
            display: block;
            height: 35px;
            width: 215px;
            margin: 0 auto;
            text-indent: -9999px;
            }

            .amp-wp-comments-link a,
            a, a:visited {
            color: <?php echo esc_attr( $link_color ); ?>;
            text-decoration: none;
            }
            .amp-wp-comments-link a {
            border-style: solid;
            border-color: <?php echo esc_attr( $link_color ); ?>;
            border-width: 2px;
            border-radius: 0;
            }

            blockquote {
            background: <?php echo esc_attr( $body_bg_color ); ?>;
            border-left: 5px solid <?php echo esc_attr( $header_bg_color ); ?>;;
            position: relative;
            color: <?php echo esc_attr( $text_color ); ?>;;
            -webkit-box-shadow: 0px 0px 0px 1px #eeeeee;
            box-shadow: 0px 0px 0px 1px #eeeeee;
            }
            .amp-social {
            margin: 30px 0;
            text-align: center;
            }

            .dima-amp-related-posts a {
            display: block;
            padding: 5px 10px;
            }

			<?php /*Footer*/ ?>

            .footer-container {
            background-color: <?php echo esc_attr( $footer_bg_color ); ?>;
            color: <?php echo esc_attr( $footer_color ); ?>;
            text-align: center;
            }

            .footer-container .top-footer {
            position: relative;
            padding: 60px 0;
            }

            .footer-logo {
            background-image: url(<?php echo esc_url( $amp_logo_footer ) ?>);
            }

            .footer-logo {
            display: block;
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            height: 50px;
            width: 200px;
            margin: auto;
            margin-bottom: 1.5em;
            }

            footer .dima-footer {
            position: relative;
            border-top: 1px solid <?php echo esc_attr( $sec_footer_color ); ?>;
            color: <?php echo esc_attr( $footer_color ); ?>;
            padding: 35px 0;
            }

            .dima-menu li {
            display: inline-block;
            padding: 0 10px;
            }

            .copyright a,
            .dima-menu a,
            .dima-menu a:hover,
            .dima-menu a:active,
            .dima-menu a:visited  {
            color: <?php echo esc_attr( $footer_link_color ); ?>;
            }
            .scroll-to-top {
            font-size: 20px;
            line-height: 40px;
            position: absolute;
            display: block;
            background: <?php echo esc_attr( $sec_footer_color ); ?>;
            left: 50%;
            margin-left: -20px;
            top: -20px;
            text-align: center;
            text-decoration: none;
            width: 40px;
            height: 40px;
            z-index: 1040;
            }

            .scroll-to-top a{
            color:<?php echo esc_attr( $sec_footer_txt_color ) ?>;
            }
            .scroll-to-top svg{
            width:24px;
            height: 40px;
            }

			<?php

		}

	}

	# Instantiate the class ----------
	new DIMA_AMP();

}