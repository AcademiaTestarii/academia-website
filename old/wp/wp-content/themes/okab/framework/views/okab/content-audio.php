<?php
/**
 * @package Dima Framework
 * @subpackage views okab
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
?>
<?php
if ( is_singular() && ! is_page() ) {
	$args = dima_helper::get_featured_args();
} else {
	$args = dima_helper::get_featured_args( $this );
}
?>

<article <?php post_class( $args['post_class'] ); ?> >
	<?php

	if ( has_post_thumbnail() ):

		if ( $args['show_image'] ) {
			dima_featured_image( array(
				'post_type' => $args['blog_type'],
				'img_hover' => $args['img_hover'],
				'elm_hover' => $args['elm_hover'],
				'no_border' => $args['no_border'],
			) );

		}
		dima_featured_audio();

	endif;

	if ( ! has_post_thumbnail() ):
		dima_featured_audio();
		dima_get_entry_meta( $args['meta'] );
	endif;
	?>

	<div class="<?php dima_pots_content_class(); ?>">
		<?php dima_helper::dima_get_view( 'okab', '_content', 'post-header' ); ?>
		<?php dima_get_post_content( $args['is_full_post_content_blog'], $args['words'] ); ?>
		<?php dima_helper::dima_get_view( 'okab', '_content', 'post-footer' ); ?>
	</div>
</article>