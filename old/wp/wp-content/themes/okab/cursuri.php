<?php
/**
 * Template Name: Cursuri
 * Description: First page of the site
 *
 * @package WordPress
 * @subpackage Project
 */
get_header();

?>

<div class="container page-section">
	<div class="ok-row ">
		<div class="ok-xsd-12 ok-md-12 column_parent">
			<div class="page-section ">
				<div class="uncoltable page-section">
					<div class="uncell">
						<div class="dima-clear" style="padding-bottom:50px"></div>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php the_content(); ?>

						<?php endwhile; ?>


					<?php else : ?>

						<h2>Not Found</h2>

					<?php endif; ?>
					<br><br>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<section class="section doi"><div class="no-padding-section page-section-content  overflow-hidden"><div class=" background-image-hide background-cover"  style=""></div><div><div class="ok-row "><div class="ok-xsd-12 ok-md-12 column_parent"><div class="page-section "><div class="uncoltable page-section"><div class="uncell"><h1 class="dima-custom-heading"><p></p>
</h1><h1 style="text-align: center; color: #0063aa;">Program Cursuri</h1>
<p></p></div></div></div></div></div></div></div></section> <br>




<section class="section" style="">
	<div class="container">
		<div class="container background-image-hide background-cover"  ></div>
		<div>
			<div class="ok-row ">
					<?php
					$args = array(
						'post_type' => 'module',
						'nopaging' => true,
						'posts_per_page' => -1,
						'orderby'=>'menu_order',
						'order'=>'ASC');
					$exec= new WP_Query($args);
					if ($exec->have_posts()) : while ($exec->have_posts()) : $exec->the_post(); ?>
					<div class="ok-xsd-12 ok-md-4 column_parent">
						<div class="page-section ">
							<div class="uncoltable page-section">
								<div class="uncell">
									<div class="dima-pricing-table ">
										<div class="dima-pricing-col  box-shadow">
											<div class="header di_blue ">
												<h4 class="dima-table-title"><?php the_title();  ?> - <?php  echo get_post_meta(get_the_ID(), 'pret', true); ?> RON</h4>
											</div>
											<div class="dima-pricing-col-info ">
												<?php
												global $wpdb;
												$id = get_the_ID();
												$perioade = explode(', ', get_post_meta(get_the_ID(), 'perioada', true));

												foreach ($perioade as $perioada) {
													$rowcount = $wpdb->get_var("SELECT COUNT(*) FROM db_module WHERE modul = $id AND perioada = '$perioada'");
													if(12 -  $rowcount > 0 ) {
														?>
														<ul class="icon-list">
															<li><a href="http://academiatestarii.ro/wp/index.php/formular/" class="dima-button  dima-btn-rounded fill dima-btn-small"><?php echo $perioada; ?> - Locuri: <?php echo 12 -  $rowcount;?></a></li>
														</ul>
														<?php } }; ?>


														<a data-direction="down" class="dima-button  dima-btn-rounded fill dima-btn-large" href="<?php  echo get_post_meta(get_the_ID(), 'link-modul', true); ?>">Mai multe informaţii</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php else : ?>
						<h2>Not Found</h2>
					<?php endif; wp_reset_query(); ?>



				</div>
			</div>
		</div>
	</section>




	<section class="section"><div class="no-padding-section page-section-content  overflow-hidden"><div class=" background-image-hide background-cover"  style=""></div><div><div class="ok-row "><div class="ok-xsd-12 ok-md-12 column_parent"><div class="page-section "><div class="uncoltable page-section"><div class="uncell"><h2 class="dima-custom-heading"><p></p>
	</h2><h3 style="text-align: center; color: #fff;">În funcţie de cerere, acest program poate suferi modificări.</h3>
	<p></p></div></div></div></div></div></div></div></section>
	<?php get_footer(); ?>
