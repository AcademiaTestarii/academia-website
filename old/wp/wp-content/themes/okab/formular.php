<?php
/**
 * Template Name: Formular Inscriere
 * Description: First page of the site
 *
 * @package WordPress
 * @subpackage Project
 */
get_header();

if ( is_user_logged_in() ) {
	?>
<style>
	.perioada{
		display:none;
	}
	.perioada-enabled{
		display:block;
	}
</style>
	<div class="container page-section">
		<div class="ok-row ">
			<div class="ok-xsd-12 ok-md-12 column_parent">
				<div class="page-section ">
					<div class="uncoltable page-section">
						<div class="uncell">
						<!--
						<h2 class="dima-custom-heading text-center">Contacteaza-ne</h2>
						<p style="text-align: center;">&nbsp;Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis<br>
							bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
						</p>
					-->
					<div class="dima-clear" style="padding-bottom:50px"></div>
					<div role="form" class="wpcf7" id="wpcf7-f102-p19-o1" lang="en-US" dir="ltr">
						<form action="" id="form" method="post" class="wpcf7-form" novalidate="novalidate">
							<div class="ok-row">
								<div class="ok-md-4 ok-xsd-12   ">
									<p>Nume<br>
										<span class="wpcf7-form-control-wrap"><input type="text" name="nume" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required nume" aria-required="true" aria-invalid="false"></span>
									</p>
								</div>
								<div class="ok-md-4 ok-xsd-12   ">
									<p>Prenume<br>
										<span class="wpcf7-form-control-wrap"><input type="text" name="prenume" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email prenume" aria-required="true" aria-invalid="false"></span> </p>
									</div>
									<div class="ok-md-4 ok-xsd-12 hidden">
										<span class="wpcf7-form-control-wrap "><input type="hidden" name="email" value="<?php $current_user = wp_get_current_user();echo $current_user->user_email;?>" class="wpcf7-form-control wpcf7-text email" aria-invalid="false"></span> </p>
									</div>
								</div>
								<div class="ok-row">
									<div class="ok-md-4 ok-xsd-12   ">
										<p>Profesie Actuala<br>
											<span class="wpcf7-form-control-wrap "><input type="text" name="profesie" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required profesie" aria-required="true" aria-invalid="false"></span>
										</p>
									</div>
									<div class="ok-md-4 ok-xsd-12   ">
										<p>Telefon<br>
											<span class="wpcf7-form-control-wrap "><input type="text" name="telefon" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email telefon" aria-required="true" aria-invalid="false"></span> </p>
										</div>
										<div class="ok-md-4 ok-xsd-12   ">
											<p>Data Nastere<br>
												<span class="wpcf7-form-control-wrap "><input type="text" name="data" value="" size="40" class="wpcf7-form-control wpcf7-text data" placeholder="20/08/1989" aria-invalid="false"></span> </p>
											</div>
										</div>
										<div class="ok-row">
											<div class="ok-md-4 ok-xsd-12   ">
												<p>Modulul dorit:<br>
													<span class="wpcf7-form-control-wrap your-name">
														<select  name="modul" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required modul">
															<option value="0">Alege Modulul Dorit</option>
															<?php
															$args = array(
																'post_type' => 'module',
																'nopaging' => true,
																'posts_per_page' => -1,
																'orderby'=>'menu_order',
																'order'=>'ASC');
															$exec= new WP_Query($args);
															if ($exec->have_posts()) : while ($exec->have_posts()) : $exec->the_post(); ?>
															<option value="<?php the_ID(); ?>">
																<?php the_title(); ?> - <?php  echo get_post_meta(get_the_ID(), 'pret', true); ?> RON
															</option>

														<?php endwhile; ?>
													<?php else : ?>
														<h2>Not Found</h2>
													<?php endif; wp_reset_query(); ?>
												</select>
											</span>
										</p>
									</div>
									<div class="ok-md-4 ok-xsd-12   ">
										<p>Perioada dorita:<br>
											<?php
											$args = array(
												'post_type' => 'module',
												'nopaging' => true,
												'posts_per_page' => -1,
												'orderby'=>'menu_order',
												'order'=>'ASC');
											$exec= new WP_Query($args);
											if ($exec->have_posts()) : while ($exec->have_posts()) : $exec->the_post(); ?>
											<select id="perioada-<?php the_ID(); ?>" class="perioada perioada-disabled">
												<?php
												global $wpdb;
												$id = get_the_ID();
												$perioade = explode(', ', get_post_meta(get_the_ID(), 'perioada', true));

												foreach ($perioade as $perioada) {
													$rowcount = $wpdb->get_var("SELECT COUNT(*) FROM db_module WHERE modul = $id AND perioada = '$perioada'");
													if(15 -  $rowcount > 0 ) {
												?>

														<option value="<?php echo $perioada; ?>">
															<?php echo $perioada; ?> - Locuri disponibile: <?php echo 15 -  $rowcount;?>
														</option>

													<?php } }; ?>
												</select>
											<?php endwhile; ?>
										<?php else : ?>
											<h2>Not Found</h2>
										<?php endif; wp_reset_query(); ?>
									</div>
									<div class="ok-md-4 ok-xsd-12   ">
										<p>Educatie<br>
											<span class="wpcf7-form-control-wrap your-email"><input type="text" name="educatie" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email educatie" aria-required="true" aria-invalid="false"></span> </p>
										</div>
									</div>
									<div class="ok-row">
										<div class="ok-md-4 ok-xsd-12   ">
											<p>Cunostinte Engleza:<br>
												<span class="wpcf7-form-control-wrap your-name">
													<select name="Engleza" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required engleza">
														<option value="1">Începător</option>
														<option value="2" selected="true">Mediu</option>
														<option value="3">Avansat</option>
													</select>
												</span>
											</p>
										</div>
										<div class="ok-md-4 ok-xsd-12   ">
											<p>Cunostinte Office:<br>
												<span class="wpcf7-form-control-wrap your-name">
													<select name="Office" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required office">
														<option value="1" selected="true">Începător</option>
														<option value="2" >Mediu</option>
														<option value="3">Avansat</option>
													</select>
												</span>
											</p>
										</div>
										<div class="ok-md-4 ok-xsd-12   ">
											<p>Cunostinte Web:<br>
												<span class="wpcf7-form-control-wrap your-name">
													<select name="web" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required web">
														<option value="1" selected="true">Începător</option>
														<option value="2" >Mediu</option>
														<option value="3">Avansat</option>
													</select>
												</span>
											</p>
										</div>
									</div>
									<div class="ok-row">
										<div class="ok-md-4 ok-xsd-12   ">
											<p>Modul de plata:<br>
												<span class="wpcf7-form-control-wrap your-name">
													<input type="radio" id="online" name="plata" value="1" checked class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required plata-tip">
													<label for="online">Online</label>
													<input type="radio" id="transfer" name="plata" value="2" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required plata-tip">
													<label for="transfer">Transfer Bancar</label>
												</span>
										</div>
										<div class="ok-md-4 ok-xsd-12   ">
											<p>Tipul  de plata:<br>
												<span class="wpcf7-form-control-wrap your-name">
													<input type="radio" id="integral" name="tip_plata" value="1" checked class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required tip_plata">
													<label for="integral">Integral</label>
													<input type="radio" id="transfer" name="tip_plata" value="2" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required tip_plata">
													<label for="transfer">In doua rate</label>
												</span>
										</div>
											<input type="hidden" name="user" class="user" value="<?php echo get_current_user_id()?>">
											<p class="dima-btn-rounded text-center"><div  class="no-rounded button-block fill small dima-button trimite
												">Trimite</div><span class="ajax-loader"></span></p>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<script type="text/javascript">
					(function ($) {
						$('.modul').on('change', function() {
						  $(".perioada").removeClass("perioada-enabled");
						  $("#perioada-"+ this.value).addClass("perioada-enabled");
						})
						$('.trimite').click(function(){
							$('.nume').removeClass('failed');
							$('.prenume').removeClass('failed');
							$('.telefon').removeClass('failed');
							$('.email').removeClass('failed');
							$('.profesie').removeClass('failed');
							$('.data').removeClass('failed');
							$('.modul').removeClass('failed');
							$('.perioada-enabled').removeClass('failed');
							$('.educatie').removeClass('failed');
							$('.engleza').removeClass('failed');
							$('.office').removeClass('failed');
							$('.web').removeClass('failed');

							$.ajax({
								type : 'POST',
								url : 'http://academiatestarii.ro/wp/index.php/ajax/',
								dataType : 'json',
								data: {
									nume 	: $('.nume').val(),
									prenume : $('.prenume').val(),
									email 	: $('.email').val(),
									profesie 	: $('.profesie').val(),
									perioada 	: $('.perioada-enabled').val(),
									modul 	: $('.modul').val(),
									educatie 	: $('.educatie').val(),
									engleza 	: $('.engleza').val(),
									office 	: $('.office').val(),
									web 	: $('.web').val(),
									user 	: $('.user').val(),
									telefon : $('.telefon').val(),
									data 	: $('.data').val(),
									mod_plata 	: $("input[name='plata']:checked"). val(),
									tip_plata 	: $("input[name='tip_plata']:checked"). val()
								},
								success : function(data){
									if(data.nume){
										$('.nume').addClass('failed');
									}
									if(data.prenume){
										$('.prenume').addClass('failed');
									}
									if(data.email){
										$('.email').addClass('failed');
									}
									if(data.profesie){
										$('.profesie').addClass('failed');
									}
									if(data.educatie){
										$('.educatie').addClass('failed');
									}
									if(data.telefon){
										$('.telefon').addClass('failed');
									}
									if(data.data){
										$('.data').addClass('failed');
									}
									if(data.modul){
										$('.modul').addClass('failed');
									}
									if(data.perioada){
										$('.perioada-enabled').addClass('failed');
									}

									if(data.response == 'yes'){

										if ( $('.plata-tip:checked').val() == 1) {
											$('#form').fadeOut(500, function(){
												$('.wpcf7').html("<h2>Îţi mulţumim! Te rugăm să faci plata folosind linkul de mai jos:</h2><a style='width:289px; height:50px;display:block;margin:auto;margin-bottom:50px;color:transparent;background:url(http://static.payu.com/en/standard/partners/buttons/payu_account_button_long_03.png)'  href='"+data.payu+"' target='_blank' class='dima-custom-heading text-center'>Payu</a>");
											});
										} else{
											$('#form').fadeOut(500, function(){
												$('.wpcf7').html("<h2>Va multumim! Va rugam sa facem plata in urmatorul cont bancar:</h2><h1>RNMC1231231233456363453453534</h1>");
											});
										}

									}

								},
								error : function(XMLHttpRequest, textStatus, errorThrown){
									console.log("error");
									console.log(errorThrown);
									console.log(textStatus);
									console.log(XMLHttpRequest);
					// $('#trimite').fadeIn('fast');
					// $('#wait').hide(500);
					// $('#raspuns').removeClass().addClass('error').text('S-a produs o eroare.').show(500);
					// $j('#demoForm').show(500);
				}

			}, function(){
				// console.log("dupa");
			});

						});
					}(jQuery));
				</script>
				<style>
				.failed{
					border:1px solid red !important; }
				</style>
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
																		<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Ai uitat parola?', 'woocommerce' ); ?></a>
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
									<?php } ;get_footer(); ?>
