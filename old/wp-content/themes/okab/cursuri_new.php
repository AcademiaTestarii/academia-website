<?php
/**
 * Template Name: Cursuri New
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
<div class="page-section-content " style="padding: 5px 5px;">
	<div class="container page-section">
		<div class="ok-row ">
			<div class="ok-xsd-12 ok-md-12 column_parent">
				<div class="page-section " style="padding: 5px 5px;">
					<div class="uncoltable page-section">
						<div class="uncell">
							<section class="section">
								<div class="page-section-content overflow-hidden" style="padding: 0 0;">
									<div class="background-image-hide dima-pattern-image parallax-background skrollable skrollable-between" data-parallax-start="0%" data-parallax-center="50%" data-parallax-end="100%" data-bg-image="http://academiatestarii.ro/wp-content/uploads/2016/06/callout-pattern.jpg" data-bottom-top="background-position: 50% 0%;" data-center="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;" data-direction="vertical" style="background-image: url(&quot;http://academiatestarii.ro/wp-content/uploads/2016/06/callout-pattern.jpg&quot;); background-position: 50% 35.2317%;"></div>
									<div class="container page-section">
										<div class="ok-row ">
											<div class="ok-sd-6  ok-xsd-12    ok-md-12" style="">
												<h2 id="bucuresti"  style="text-align: left" class="titlu vc_custom_heading wpb_animate_when_almost_visible wpb_slideInLeft slideInLeft wpb_start_animation animated">ÎN BUCUREŞTI</h2>
											</div>
										</div>
									</div>
								</div>
							</section>
							<div class="dima-clear" style="padding-bottom:15px"></div>
							<section class="section">
								<div class="page-section-content ">
									<div class="container page-section">
										<div class="ok-row ">
											<?php
											$args = array(
												'post_type' => 'module',
												'nopaging' => true,
												'posts_per_page' => -1,
												'category_name'  => 'Bucuresti',
												'orderby'=>'menu_order',
												'order'=>'ASC');
											$exec= new WP_Query($args);
											if ($exec->have_posts()) : while ($exec->have_posts()) : $exec->the_post(); ?>
											<div class="ok-sd-6  ok-xsd-12    ok-md-4" style="margin-top: 10px;margin-bottom: 10px;">
												<div class="column-item overflow-hidden text-center columns-6"><a class="overlay dima-img  dima-gallery-item" href="<?php  echo get_post_meta(get_the_ID(), 'link-modul', true); ?>" target="_blank" rel="noopener"><img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>" alt="" width="1000" height="662"></a></div>
												<div class="dima-clear" style="padding-bottom:5px"></div>
												<?php
												global $wpdb;
												$id = get_the_ID();
												$perioade = explode(', ', get_post_meta(get_the_ID(), 'perioada', true));
												$rowcount = $wpdb->get_var("SELECT COUNT(*) FROM useri_inscrisi WHERE modul = $id AND perioada = '$perioade[0]'");
												?>
												<p> Următorul curs:<span style="color: #333399;font-size:13px;"> <?php echo $perioade[0]; ?></span><br>
													<?php if(count($perioade) > 1) {
														array_shift($perioade);
													} ?>
													Locuri disponibile:<span style="color: #333399;font-size:13px;"> <?php echo 15 - $rowcount ; ?></span><br>
													Cursuri viitoare:&nbsp;<span style="color: #333399;font-size:13px;"><?php  echo implode(",", $perioade); ?></span>
												</p>
												<?php if(get_post_meta(get_the_ID(), 'perioada', true) !== 'în curând'){ ?>
												<a data-direction="down" class="dima-button  dima-btn-no-rounded stroke dima-btn-mini float-center" href="http://academiatestarii.ro/index.php/formular/" target="_blank" rel="noopener">Înscrie-te</a>
												<?php } ?>
											</div>
										<?php endwhile; ?>
									<?php else : ?>
										<h2>In curand</h2>
									<?php endif; wp_reset_query(); ?>
								</div>
							</div>
						</div>
					</section>
					<div class="dima-clear" style="padding-bottom:15px"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<div class="page-section-content " style="padding: 5px 5px;">
	<div class="container page-section">
		<div class="ok-row ">
			<div class="ok-xsd-12 ok-md-12 column_parent">
				<div class="page-section " style="padding: 5px 5px;">
					<div class="uncoltable page-section">
						<div class="uncell">
							<section class="section">
								<div class="page-section-content overflow-hidden" style="padding: 0 0;">
									<div class="background-image-hide dima-pattern-image parallax-background skrollable skrollable-between" data-parallax-start="0%" data-parallax-center="50%" data-parallax-end="100%" data-bg-image="http://academiatestarii.ro/wp-content/uploads/2016/06/callout-pattern.jpg" data-bottom-top="background-position: 50% 0%;" data-center="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;" data-direction="vertical" style="background-image: url(&quot;http://academiatestarii.ro/wp-content/uploads/2016/06/callout-pattern.jpg&quot;); background-position: 50% 35.2317%;"></div>
									<div class="container page-section">
										<div class="ok-row ">
											<div class="ok-sd-6  ok-xsd-12    ok-md-12" style="">
												<h2 id="in-tara" style="text-align: left" class="titlu vc_custom_heading wpb_animate_when_almost_visible wpb_slideInLeft slideInLeft wpb_start_animation animated">ÎN ŢARĂ</h2>
											</div>
										</div>
									</div>
								</div>
							</section>
							<div class="dima-clear" style="padding-bottom:15px"></div>
							<section class="section">
								<div class="page-section-content ">
									<div class="container page-section">
										<div class="ok-row ">
											<?php
											$args = array(
												'post_type' => 'module',
												'nopaging' => true,
												'posts_per_page' => -1,
												'category_name'  => 'In tara',
												'orderby'=>'menu_order',
												'order'=>'ASC');
											$exec= new WP_Query($args);
											if ($exec->have_posts()) : while ($exec->have_posts()) : $exec->the_post(); ?>
											<div class="ok-sd-6  ok-xsd-12    ok-md-4" style="margin-top: 10px;margin-bottom: 10px;">
												<div class="column-item overflow-hidden text-center columns-6"><a class="overlay dima-img  dima-gallery-item" href="<?php  echo get_post_meta(get_the_ID(), 'link-modul', true); ?>" target="_blank" rel="noopener"><img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>" alt="" width="1000" height="662"></a></div>
												<div class="dima-clear" style="padding-bottom:5px"></div>
												<?php
												global $wpdb;
												$id = get_the_ID();
												$perioade = explode(', ', get_post_meta(get_the_ID(), 'perioada', true));
												$rowcount = $wpdb->get_var("SELECT COUNT(*) FROM useri_inscrisi WHERE modul = $id AND perioada = '$perioade[0]'");
												?>
												<p> Următorul curs:<span style="color: #333399;font-size:13px;"> <?php echo $perioade[0]; ?></span><br>
													<?php if(count($perioade) > 1) {
														array_shift($perioade);
													} ?>
													Locuri disponibile:<span style="color: #333399;font-size:13px;"> <?php echo 15 - $rowcount ; ?></span><br>
													Cursuri viitoare:&nbsp;<span style="color: #333399;font-size:13px;"><?php echo implode(",", $perioade); ?></span>
												</p>
												<?php if(get_post_meta(get_the_ID(), 'perioada', true) !== 'în curând'){ ?>
												<a data-direction="down" class="dima-button  dima-btn-no-rounded stroke dima-btn-mini float-center" href="http://academiatestarii.ro/index.php/formular/" target="_blank" rel="noopener">Înscrie-te</a>
												<?php } ?>
											</div>
										<?php endwhile; ?>
									<?php else : ?>
										<h2>In curand</h2>
									<?php endif; wp_reset_query(); ?>
								</div>
							</div>
						</div>
					</section>
					<div class="dima-clear" style="padding-bottom:15px"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<div class="page-section-content " style="padding: 5px 5px;display: none;">
	<div class="container page-section">
		<div class="ok-row ">
			<div class="ok-xsd-12 ok-md-12 column_parent">
				<div class="page-section " style="padding: 5px 5px;">
					<div class="uncoltable page-section">
						<div class="uncell">
							<section class="section">
								<div class="page-section-content overflow-hidden" style="padding: 0 0;">
									<div class="background-image-hide dima-pattern-image parallax-background skrollable skrollable-between" data-parallax-start="0%" data-parallax-center="50%" data-parallax-end="100%" data-bg-image="http://academiatestarii.ro/wp-content/uploads/2016/06/callout-pattern.jpg" data-bottom-top="background-position: 50% 0%;" data-center="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;" data-direction="vertical" style="background-image: url(&quot;http://academiatestarii.ro/wp-content/uploads/2016/06/callout-pattern.jpg&quot;); background-position: 50% 35.2317%;"></div>
									<div class="container page-section">
										<div class="ok-row ">
											<div class="ok-sd-6  ok-xsd-12    ok-md-12" style="">
												<h2 id="module"  style="text-align: left" class="titlu vc_custom_heading wpb_animate_when_almost_visible wpb_slideInLeft slideInLeft wpb_start_animation animated">MODULE</h2>
											</div>
										</div>
									</div>
								</div>
							</section>
							<div class="dima-clear" style="padding-bottom:15px"></div>
							<section class="section">
								<div class="page-section-content ">
									<div class="container page-section">
										<div class="ok-row ">
											<?php
											$args = array(
												'post_type' => 'module',
												'nopaging' => true,
												'posts_per_page' => -1,
												'category_name'  => 'Module',
												'orderby'=>'menu_order',
												'order'=>'ASC');
											$exec= new WP_Query($args);
											if ($exec->have_posts()) : while ($exec->have_posts()) : $exec->the_post(); ?>
											<div class="ok-sd-6  ok-xsd-12    ok-md-4" style="margin-top: 10px;margin-bottom: 10px;">
												<div class="column-item overflow-hidden text-center columns-6"><a class="overlay dima-img  dima-gallery-item" href="<?php  echo get_post_meta(get_the_ID(), 'link-modul', true); ?>" target="_blank" rel="noopener"><img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>" alt="" width="1000" height="662"></a></div>
												<div class="dima-clear" style="padding-bottom:5px"></div>
												<?php
												global $wpdb;
												$id = get_the_ID();
												$perioade = explode(', ', get_post_meta(get_the_ID(), 'perioada', true));
												$perioade2 = array_shift($perioade);
												$rowcount = $wpdb->get_var("SELECT COUNT(*) FROM useri_inscrisi WHERE modul = $id AND perioada = '$perioade[0]'");
												?>
												<p> Următorul curs:<span style="color: #333399;font-size:13px;"> <?php echo $perioade[0]; ?></span><br>
													Locuri disponibile:<span style="color: #333399;font-size:13px;"> <?php echo 15 - $rowcount ; ?></span><br>
													Cursuri viitoare:&nbsp;<span style="color: #333399;font-size:13px;"><?php echo implode(",", $perioade2); ?></span>
												</p>
												<?php if(get_post_meta(get_the_ID(), 'perioada', true) !== 'în curând'){ ?>
												<a data-direction="down" class="dima-button  dima-btn-no-rounded stroke dima-btn-mini float-center" href="http://academiatestarii.ro/index.php/formular/" target="_blank" rel="noopener">Înscrie-te</a>
												<?php } ?>
											</div>
										<?php endwhile; ?>
									<?php else : ?>
										<h2>In curand.</h2>
									<?php endif; wp_reset_query(); ?>
								</div>
							</div>
						</div>
					</section>
					<div class="dima-clear" style="padding-bottom:15px"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<div class="page-section-content " style="padding: 5px 5px; display: none;">
	<div class="container page-section">
		<div class="ok-row ">
			<div class="ok-xsd-12 ok-md-12 column_parent">
				<div class="page-section " style="padding: 5px 5px;">
					<div class="uncoltable page-section">
						<div class="uncell">
							<section class="section">
								<div class="page-section-content overflow-hidden" style="padding: 0 0;">
									<div class="background-image-hide dima-pattern-image parallax-background skrollable skrollable-between" data-parallax-start="0%" data-parallax-center="50%" data-parallax-end="100%" data-bg-image="http://academiatestarii.ro/wp-content/uploads/2016/06/callout-pattern.jpg" data-bottom-top="background-position: 50% 0%;" data-center="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;" data-direction="vertical" style="background-image: url(&quot;http://academiatestarii.ro/wp-content/uploads/2016/06/callout-pattern.jpg&quot;); background-position: 50% 35.2317%;"></div>
									<div class="container page-section">
										<div class="ok-row ">
											<div class="ok-sd-6  ok-xsd-12    ok-md-12" style="">
												<h2 id="workshops"  style="text-align: left" class="titlu vc_custom_heading wpb_animate_when_almost_visible wpb_slideInLeft slideInLeft wpb_start_animation animated">WORKSHOPS</h2>
											</div>
										</div>
									</div>
								</div>
							</section>
							<div class="dima-clear" style="padding-bottom:15px"></div>
							<section class="section">
								<div class="page-section-content ">
									<div class="container page-section">
										<div class="ok-row ">
											<?php
											$args = array(
												'post_type' => 'module',
												'nopaging' => true,
												'posts_per_page' => -1,
												'category_name'  => 'Workshopuri',
												'orderby'=>'menu_order',
												'order'=>'ASC');
											$exec= new WP_Query($args);
											if ($exec->have_posts()) : while ($exec->have_posts()) : $exec->the_post(); ?>
											<div class="ok-sd-6  ok-xsd-12    ok-md-4" style="margin-top: 10px;margin-bottom: 10px;">
												<div class="column-item overflow-hidden text-center columns-6"><a class="overlay dima-img  dima-gallery-item" href="<?php  echo get_post_meta(get_the_ID(), 'link-modul', true); ?>" target="_blank" rel="noopener"><img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>" alt="" width="1000" height="662"></a></div>
												<div class="dima-clear" style="padding-bottom:5px"></div>
												<?php
												global $wpdb;
												$id = get_the_ID();
												$perioade = explode(', ', get_post_meta(get_the_ID(), 'perioada', true));
												$perioade2 = array_shift($perioade);
												$rowcount = $wpdb->get_var("SELECT COUNT(*) FROM useri_inscrisi WHERE modul = $id AND perioada = '$perioade[0]'");
												?>
												<p> Următorul curs:<span style="color: #333399;font-size:13px;"> <?php echo $perioade[0]; ?></span><br>
													Locuri disponibile:<span style="color: #333399;font-size:13px;"> <?php echo 15 - $rowcount ; ?></span><br>
													Cursuri viitoare:&nbsp;<span style="color: #333399;font-size:13px;"><?php echo implode(",", $perioade2); ?></span>
												</p>
												<?php if(get_post_meta(get_the_ID(), 'perioada', true) !== 'în curând'){ ?>
												<a data-direction="down" class="dima-button  dima-btn-no-rounded stroke dima-btn-mini float-center" href="http://academiatestarii.ro/index.php/formular/" target="_blank" rel="noopener">Înscrie-te</a>
												<?php } ?>
											</div>
										<?php endwhile; ?>
									<?php else : ?>
										<h2>In curand.</h2>
									<?php endif; wp_reset_query(); ?>
								</div>
							</div>
						</div>
					</section>
					<div class="dima-clear" style="padding-bottom:15px"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
	(function ($) {

		$("#bucuresti-link").click(function() {
			$('html,body').animate({
				scrollTop: $("#bucuresti").offset().top - 100},
				'slow');
		});
		$("#in-tara-link").click(function() {
			$('html,body').animate({
				scrollTop: $("#in-tara").offset().top - 100},
				'slow');
		});
		$("#workshops-link").click(function() {
			$('html,body').animate({
				scrollTop: $("#workshops").offset().top - 100},
				'slow');
		});
		$("#module-link").click(function() {
			$('html,body').animate({
				scrollTop: $("#module").offset().top - 100},
				'slow');
		});
	}(jQuery));
</script>
<style>
.titlu {
	text-align: left;
	color: #fff;
	padding-left: 20px;
	padding-top: 20px;
	font-weight: bold;
	text-transform: uppercase;
}
#bucuresti-link {
	cursor: pointer;
}
#in-tara-link {
	cursor: pointer;
}
#workshops-link {
	cursor: pointer;
}
#module-link {
	cursor: pointer;
}
</style>
<?php get_footer(); ?>
