<?php
/**
 * Template Name: Contul Meu
 * Description: First page of the site
 *
 * @package WordPress
 * @subpackage Project
 */
get_header();
if ( is_user_logged_in() ) {
?>
<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 * @since 2.6.0
		 */

		$id = get_current_user_id();
		global $wpdb;
		$email = $wpdb->get_var("SELECT email FROM db_module WHERE user = $id");

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
								//echo $id;
								$rowcount = $wpdb->get_results("SELECT * FROM useri_inscrisi WHERE email = '$email'");
								foreach ($rowcount as $result) {
									
									if($result->status != 0) {
										$IDmodul = $result->modul;
										$args = array(
											'p' => $IDmodul,
											'post_type' => 'module',
											'nopaging' => true,
											'posts_per_page' => -1,
											'orderby'=>'menu_order',
											'order'=>'ASC');
										$exec= new WP_Query($args);
										if ($exec->have_posts()) : while ($exec->have_posts()) : $exec->the_post(); ?>
										<h2>Modul: <?php the_title() ?></h2>
										<?php if($result->mod_plata == 2 && $result->status == 1 ) {  ?>
										<a target="_blank" href="<?php echo get_post_meta(get_the_ID(), 'payu_rata2', true) ?>"><span class=" dima-menu-span dima-button fill dima-btn-mini">Plateste a doua rata</span></a>
										<div class="clearfix"></div> <br><br>
										<?php } ?>
										<div class="ok-xsd-6 ok-md-6">
											<?php if($result->perioada != 1) { ?>
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
											<?php } ?>
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
																			
																			$img7 =  get_post_meta(get_the_ID(), 'wp_custom_attachment7', true);
																			$img8 = get_post_meta(get_the_ID(), 'wp_custom_attachment8', true);
																			$img9 = get_post_meta(get_the_ID(), 'wp_custom_attachment9', true);
																			$img10 = get_post_meta(get_the_ID(), 'wp_custom_attachment10', true);
																			$img11 = get_post_meta(get_the_ID(), 'wp_custom_attachment11', true);
																			$img12 = get_post_meta(get_the_ID(), 'wp_custom_attachment12', true);

																			?>
																			<?php if($img7){  ?><li><a  href="<?php echo $img7['url']; ?>" target="_blank">Tema 1</a></li><?php } ?>
																			<?php if($img8){  ?><li><a  href="<?php echo $img8['url']; ?>" target="_blank">Tema 2</a></li><?php } ?>
																			<?php if($img9){  ?><li><a  href="<?php echo $img9['url']; ?>" target="_blank">Tema 3</a></li><?php } ?>
																			<?php if($img10){  ?><li><a  href="<?php echo $img10['url']; ?>" target="_blank">Tema 4</a></li><?php } ?>
																			<?php if($img11){  ?><li><a  href="<?php echo $img11['url']; ?>" target="_blank">Tema 5</a></li><?php } ?>
																			<?php if($img12){  ?><li><a  href="<?php echo $img12['url']; ?>" target="_blank">Tema 6</a></li><?php } ?>

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
								<?php endif; wp_reset_query();
							} } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } else { ?>

<div class="container page-section">
					<div class="ok-row ">
						<div class="ok-xsd-12 ok-md-12 column_parent">
							<div class="page-section ">
								<div class="uncoltable page-section">
									<div class="u-columns col2-set" id="customer_login">
										<div class="ok-row">
											<div class="ok-md-6 ok-xsd-12">
												<div class="col-1">
													<div class="box">
														<h3><?php esc_html_e( 'Login', 'woocommerce' ); ?></h3>

														<form method="post" class="login">

															<?php do_action( 'woocommerce_login_form_start' ); ?>

															<p class="form-row form-row-wide">
																<label for="username"><?php esc_html_e( 'Username sau email', 'woocommerce' ); ?> <span
																	class="required">*</span></label>
																	<input type="text" class="input-text" name="username" id="username"
																	value="<?php if ( ! empty( $_POST['username'] ) ) {
																		echo esc_attr( $_POST['username'] );
																	} ?>"/>
																</p>
																<p class="form-row form-row-wide">
																	<label for="password"><?php esc_html_e( 'Parola', 'woocommerce' ); ?> <span
																		class="required">*</span></label>
																		<input class="input-text" type="password" name="password" id="password"/>
																	</p>

																	<?php do_action( 'woocommerce_login_form' ); ?>

																	<p class="form-row no-bottom-margin">
																		<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
																		<input type="submit" class="button" name="login"
																		value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"/>
																		<label for="rememberme" class="inline">
																			<input name="rememberme" type="checkbox" id="rememberme"
																			value="forever"/> <?php _e( 'Tine-ma minte', 'woocommerce' ); ?>
																		</label>
																	</p>
																	<div class="lost_password">
																		<a href="http://academiatestarii.ro/wp-login.php?action=lostpassword"><?php esc_html_e( 'Ai uitat parola?', 'woocommerce' ); ?></a>
																	</div>
																	<?php do_action( 'woocommerce_login_form_end' ); ?>

																</form>
															</div>
															<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
															</div>
														</div>

														<div class="ok-md-6 ok-xsd-12">
															<div class="col-2">
																<div class="box">
																	<h3><?php esc_html_e( 'Înregistrează-te', 'woocommerce' ); ?></h3>

																	<form method="post" class="register">

																		<?php do_action( 'woocommerce_register_form_start' ); ?>

																		<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

																			<p class="form-row form-row-wide">
																				<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span
																					class="required">*</span></label>
																					<input type="text" class="input-text" name="username" id="reg_username"
																					value="<?php if ( ! empty( $_POST['username'] ) ) {
																						echo esc_attr( $_POST['username'] );
																					} ?>"/>
																				</p>

																			<?php endif; ?>

																			<p class="form-row form-row-wide">
																				<label for="reg_email"><?php esc_html_e( 'Email', 'woocommerce' ); ?> <span
																					class="required">*</span></label>
																					<input type="email" class="input-text" name="email" id="reg_email"
																					value="<?php if ( ! empty( $_POST['email'] ) ) {
																						echo esc_attr( $_POST['email'] );
																					} ?>"/>
																				</p>

																				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

																					<p class="form-row form-row-wide">
																						<label for="reg_password"><?php esc_html_e( 'Parola', 'woocommerce' ); ?> <span
																							class="required">*</span></label>
																							<input type="password" class="input-text" name="password" id="reg_password"/>
																						</p>

																					<?php endif; ?>

																					<!-- Spam Trap -->
																					<div style="<?php echo( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;">
																						<label for="trap"><?php esc_html_e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text"
																						name="email_2"
																						id="trap"
																						tabindex="-1"/>
																					</div>

																					<?php do_action( 'woocommerce_register_form' ); ?>
																					<?php do_action( 'register_form' ); ?>

																					<p class="form-row">
																						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
																						<input type="submit" class="button" name="register"
																						value="<?php esc_attr_e( 'Înregistrează-te', 'woocommerce' ); ?>"/>
																					</p>

																					<?php do_action( 'woocommerce_register_form_end' ); ?>

																				</form>
																			</div>
																		</div>
																	</div>

																</div>
															</div>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
<?php } ?>
<?php get_footer(); ?>
