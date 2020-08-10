<?php
/**
 * Template Name: GDPR
 * Description: First page of the site
 *
 * @package WordPress
 * @subpackage Project
 */
 $p = ($_GET);

 $user = $p['u'];
get_header();
	?>
	<div class="container page-section">
		<div class="ok-row ">
			<div class="ok-xsd-12 ok-md-12 column_parent">
				<div class="page-section ">
					<div class="uncoltable page-section">
						<div class="uncell">
                            <h2 class="dima-custom-heading text-center">Confirmă datele de contact </h2>
                            <p>Vrem să te ținem în continuare la curent cu ofertele şi programele noastre. Te rugăm să completezi datele de contact şi să selectezi opţiunea DA la întrebarea “Doreşti să fii abonat la newsletterul nostru” şi să dai click pe butonul Confirmă datele de contact.
</p>
					<div class="dima-clear" style="padding-bottom:50px"></div>
					<div role="form" class="wpcf7" id="wpcf7-f102-p19-o1" lang="en-US" dir="ltr">
						<form action="" id="form" method="post" class="wpcf7-form" novalidate="novalidate">
							<div class="ok-row">
								<div class="ok-md-4 ok-xsd-12   ">
									<p>Adresa de email<br>
										<span class="wpcf7-form-control-wrap"><input type="text" name="nume" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span>
									</p>
								</div>
								<div class="ok-md-4 ok-xsd-12   ">
									<p>Prenume<br>
										<span class="wpcf7-form-control-wrap"><input type="text" name="prenume" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email prenume" aria-required="true" aria-invalid="false"></span> </p>
									</div>
                                    <div class="ok-md-4 ok-xsd-12   ">
    								<p>Nume<br>
    										<span class="wpcf7-form-control-wrap"><input type="text" name="prenume" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email nume" aria-required="true" aria-invalid="false"></span> </p>
    								</div>
								</div>
								<div class="ok-row">
									<div class="ok-md-4 ok-xsd-12   ">
										<p>Telefon<br>
											<span class="wpcf7-form-control-wrap "><input type="text" name="telefon" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email telefon" aria-required="true" aria-invalid="false"></span> </p>
										</div>
										<div class="ok-md-4 ok-xsd-12   ">
											<p>Dorești să fii abonat la newsletter-ul nostru?<br>
												<span class="wpcf7-form-control-wrap ">
                                                    <select class="newsletter" name="">
                                                        <option value="1">DA</option>
                                                        <option value="2">NU</option>
                                                    </select>
                                                </span> </p>
											</div>
										</div>


									<div class="ok-row">

											<input type="hidden" name="user" class="user" value="<?php echo $user;?>">
											<p class="dima-btn-rounded text-center"><div  class="no-rounded button-block fill small dima-button trimite
												">Confirma datele de contact</div><span class="ajax-loader"></span></p>
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
						$('.trimite').click(function(){
							$.ajax({
								type : 'POST',
								url : 'http://academiatestarii.ro/index.php/gdpr-ajax/',
								dataType : 'json',
								data: {
									user 	: $('.user').val(),
                                    nume 	: $('.nume').val(),
                                    prenume 	: $('.prenume').val(),
                                    telefon 	: $('.telefon').val(),
                                    newsletter 	: $('.newsletter').val(),
								},
								success : function(data){
									location.href = 'http://academiatestarii.ro/index.php';

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

<?php ;get_footer(); ?>
