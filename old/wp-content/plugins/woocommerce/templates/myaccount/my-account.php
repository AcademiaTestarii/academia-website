<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

/**
 * My Account navigation.
 * @since 2.6.0
 */
//do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 * @since 2.6.0
		 */
		
		$id = get_current_user_id();
		global $wpdb;
		$rowcount = $wpdb->get_results("SELECT * FROM db_module WHERE user = $id");

		?>
		<div class="container page-section">
			<div class="ok-row ">
				<div class="ok-xsd-12 ok-md-12 column_parent">
					<div class="page-section ">
						<div class="uncoltable page-section">
							<div class="uncell">
								<div class="dima-clear" style="padding-bottom:50px"></div>
								<h2 class="dima-custom-heading text-center">Contul meu</h2>
								<?php
								foreach ($rowcount as $result) {
									if($result->status != 0) {
										$ID = $result->perioada;
										$args = array(
											'p' => $ID,
											'post_type' => 'module',
											'nopaging' => true,
											'posts_per_page' => -1,
											'orderby'=>'menu_order',
											'order'=>'ASC');
										$exec= new WP_Query($args); 
										if ($exec->have_posts()) : while ($exec->have_posts()) : $exec->the_post(); ?>
										<h2>Modul: <?php the_title() ?></h2>
										<div class="ok-xsd-6 ok-md-6">
											<ul class="dima-accordion dima-acc-arrow dima-acc-sample">
												<li class="panel dima-accordion-group">
													<div class="dima-accordion-header">
														<a class="dima-accordion-toggle" data-toggle="collapse" href="#collapse-1" aria-expanded="false">Linkuri de test</a>
													</div>
													<div id="collapse-1" class="dima-accordion-content collapse in" aria-expanded="true" >
														<div class="dima-accordion-inner">
															<div class="dima-pricing-table "  style="float:none;">
																<div class="dima-pricing-col" style="float:none;">
																	<div class="dima-pricing-col-info ">
																		<ul class="icon-list">
																			<li><a href="<?php echo get_post_meta(get_the_ID(), 'ver1', true)?>" target="_blank">Varianta 1</a></li>
																			<li><a href="<?php echo get_post_meta(get_the_ID(), 'ver2', true)?>" target="_blank">Varianta 2</a></li>
																			<li><a href="<?php echo get_post_meta(get_the_ID(), 'ver3', true)?>" target="_blank">Varianta 3</a></li>
																			<li><a href="<?php echo get_post_meta(get_the_ID(), 'ver4', true)?>" target="_blank">Varianta 4</a></li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>

										</div>
										<div class="ok-xsd-6 ok-md-6">
											<ul class="dima-accordion dima-acc-arrow dima-acc-sample">
												<li class="panel dima-accordion-group">
													<div class="dima-accordion-header">
														<a class="dima-accordion-toggle" data-toggle="collapse" href="#collapse-2" aria-expanded="false">Cursuri si Teme in format pdf</a>
													</div>
													<div id="collapse-2" class="dima-accordion-content collapse in" aria-expanded="true" >
														<div class="dima-accordion-inner">
															<div class="dima-pricing-table "  style="float:none;">
																<div class="dima-pricing-col" style="float:none;">
																	<div class="dima-pricing-col-info ">
																		<ul  class="icon-list">
																			<?php $img =  get_post_meta(get_the_ID(), 'wp_custom_attachment', true); 
																			$img2 = get_post_meta(get_the_ID(), 'wp_custom_attachment2', true); 
																			$img3 = get_post_meta(get_the_ID(), 'wp_custom_attachment3', true); 
																			$img4 = get_post_meta(get_the_ID(), 'wp_custom_attachment4', true); 
																			$img5 = get_post_meta(get_the_ID(), 'wp_custom_attachment5', true); 
																			$img6 = get_post_meta(get_the_ID(), 'wp_custom_attachment6', true); 

																			?>
																			<?php if($img){  ?><li><a  href="<?php echo $img['url']; ?>" target="_blank">Curs  1 PDF</a></li> <?php } ?>
																			<?php if($img2){  ?><li><a  href="<?php echo $img2['url']; ?>" target="_blank">Curs  2 PDF</a></li><?php } ?>
																			<?php if($img3){  ?><li><a  href="<?php echo $img3['url']; ?>" target="_blank">Curs  3 PDF</a></li><?php } ?>
																			<?php if($img4){  ?><li><a  href="<?php echo $img4['url']; ?>" target="_blank">Curs  4 PDF</a></li><?php } ?>
																			<?php if($img5){  ?><li><a  href="<?php echo $img5['url']; ?>" target="_blank">Curs  5 PDF</a></li><?php } ?>
																			<?php if($img6){  ?><li><a  href="<?php echo $img6['url']; ?>" target="_blank">Curs  6 PDF</a></li><?php } ?>
																			<?php
																			if($result->status == 2) { ?>
																			<?php $img7 =  get_post_meta(get_the_ID(), 'wp_custom_attachment7', true); 
																			$img8 = get_post_meta(get_the_ID(), 'wp_custom_attachment8', true); 
																			$img9 = get_post_meta(get_the_ID(), 'wp_custom_attachment9', true); 
																			$img10 = get_post_meta(get_the_ID(), 'wp_custom_attachment10', true); 
																			$img11 = get_post_meta(get_the_ID(), 'wp_custom_attachment11', true); 
																			$img12 = get_post_meta(get_the_ID(), 'wp_custom_attachment12', true); 

																			?>
																			<?php if($img7){  ?><li><a  href="<?php echo $img7['url']; ?>" target="_blank">Tema Curs 3</a></li><?php } ?>
																			<?php if($img8){  ?><li><a  href="<?php echo $img8['url']; ?>" target="_blank">Tema Curs 4</a></li><?php } ?>
																			<?php if($img9){  ?><li><a  href="<?php echo $img9['url']; ?>" target="_blank">Tema Curs 5</a></li><?php } ?>
																			<?php if($img10){  ?><li><a  href="<?php echo $img10['url']; ?>" target="_blank">Tema Curs 6</a></li><?php } ?>
																			<?php if($img11){  ?><li><a  href="<?php echo $img11['url']; ?>" target="_blank">Curs  11 PDF</a></li><?php } ?>
																			<?php if($img12){  ?><li><a  href="<?php echo $img12['url']; ?>" target="_blank">Curs  12 PDF</a></li><?php } ?>

																			<?php } ?>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
										<hr>
									<?php  endwhile; ?>
								<?php else : ?>
									<h2>Not Found</h2>
								<?php endif; wp_reset_query();
							} } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
