<?php
/**
 * Template Name: Send Email
 * Description: First page of the site
 *
 * @package WordPress
 * @subpackage Winmarkt
 */
	global $wpdb;

	$subject = 'Vrei să știi când adăugăm oferte şi cursuri noi? ';
	$headers = 'From: AcadamiaTestarii.ro <office@academiatestarii.ro>' . "\r\n";
	$query = "SELECT * from db_module";
	$records = $wpdb->get_results($query);
	$i = 0;
	foreach($records as $rec){
	$i++;
	$to = $rec->email;
	$message2 = '<!doctype html>
<html>
  <head>
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Simple Transactional Email</title>
	<style>
	/* -------------------------------------
		INLINED WITH htmlemail.io/inline
	------------------------------------- */
	/* -------------------------------------
		RESPONSIVE AND MOBILE FRIENDLY STYLES
	------------------------------------- */
	@media only screen and (max-width: 620px) {
	  table[class=body] h1 {
		font-size: 28px !important;
		margin-bottom: 10px !important;
	  }
	  table[class=body] p,
			table[class=body] ul,
			table[class=body] ol,
			table[class=body] td,
			table[class=body] span,
			table[class=body] a {
		font-size: 16px !important;
	  }
	  table[class=body] .wrapper,
			table[class=body] .article {
		padding: 10px !important;
	  }
	  table[class=body] .content {
		padding: 0 !important;
	  }
	  table[class=body] .container {
		padding: 0 !important;
		width: 100% !important;
	  }
	  table[class=body] .main {
		border-left-width: 0 !important;
		border-radius: 0 !important;
		border-right-width: 0 !important;
	  }
	  table[class=body] .btn table {
		width: 100% !important;
	  }
	  table[class=body] .btn a {
		width: 100% !important;
	  }
	  table[class=body] .img-responsive {
		height: auto !important;
		max-width: 100% !important;
		width: auto !important;
	  }
	}
	/* -------------------------------------
		PRESERVE THESE STYLES IN THE HEAD
	------------------------------------- */
	@media all {
	  .ExternalClass {
		width: 100%;
	  }
	  .ExternalClass,
			.ExternalClass p,
			.ExternalClass span,
			.ExternalClass font,
			.ExternalClass td,
			.ExternalClass div {
		line-height: 100%;
	  }
	  .apple-link a {
		color: inherit !important;
		font-family: inherit !important;
		font-size: inherit !important;
		font-weight: inherit !important;
		line-height: inherit !important;
		text-decoration: none !important;
	  }
	  .btn-primary table td:hover {
		background-color: #34495e !important;
	  }
	  .btn-primary a:hover {
		background-color: #34495e !important;
		border-color: #34495e !important;
	  }
	}
	</style>
  </head>
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
	<table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
	  <tr>
		<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
		<td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
		  <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

			<!-- START CENTERED WHITE CONTAINER -->
			<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Academia Testării pune preţ pe protecția persoanelor fizice</span>
			<table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

			  <!-- START MAIN CONTENT AREA -->
			  <tr>
				<td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
				  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
					<tr>
					   <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
					   <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Draga, '.$rec->nume.' '.$rec->prenume.'</p>
						<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Academia Testării pune preţ pe protecția persoanelor fizice în ceea ce privește prelucrarea datelor cu caracter personal și libera circulație a acestora.</p>
						<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">În acest sens, dorim să îţi amintim că singurele date cu caracter personal pe care le stocăm despre tine sunt numele, prenumele, adresa de email şi numărul de telefon.</p>
						<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Scopul stocării este acela de a gestiona înregistrarea ta ca utilizator al platformei <a href="http://www.academiatestarii.ro">www.academiatestarii.ro</a> şi a-ţi oferi acces la diferitele sale funcții disponibile (Contul meu), precum şi pentru a-ți trimite informații cu privire la programele viitoare ale Academia Testării sau potenţiale oferte de recrutare venite din partea colaboratorilor nostri. </p>
						<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Îți poți da acordul cu un click pe butonul de mai jos, confirmând datele tale de contact şi selectând opţiunea DA la întrebarea “Dorești să fii abonat la newsletter-ul nostru?”</p>
						<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; text-align: center;"><a href="http://academiatestarii.ro/index.php/gdpr?u='.$rec->id.'">Accesează formularul</a></p>
						<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Dacă nu primim acordul tău explicit, nu-ţi vom mai trimite niciun mesaj. Dacă ne dai acordul, iar pe viitor nu vei mai dori să ținem legătura, te vei putea dezabona în orice moment folosind link-ul Unsubscribe, prezent în toate email-urile primite de la noi.</p>
						<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Dacă dorești să ștergem datele tale personale, ne poți scrie pe adresa <a href="mailto:contact@academiatestarii.ro">contact@academiatestarii.ro</a>. </p>
						<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Pe aceeași adresă ne poți adresa orice întrebare legată de felul în care asigurăm protecția datelor tale.</p>
						<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Cu drag,<br/>
Florin<br/>
--<br/>
Florin Manolescu <br/>Managing Partner <br/> Academia Testării
</p>
					  </td>
					</tr>
				  </table>
				</td>
			  </tr>

			<!-- END MAIN CONTENT AREA -->
			</table>

			<!-- START FOOTER -->
			<div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
			  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
				<tr>
				  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
					<span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Sediul social: Str. Col Stoika Stefan nr. 22 Sector 1 Bucuresti, Romania </span>
				  </td>
				</tr>
				<tr>
				  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
					Powered by <a href="http://academiatestarii.ro" style="color: #999999; font-size: 12px; text-align: center; text-decoration: none;">AcadamiaTestarii</a>.
				  </td>
				</tr>
			  </table>
			</div>
			<!-- END FOOTER -->

		  <!-- END CENTERED WHITE CONTAINER -->
		  </div>
		</td>
		<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
	  </tr>
	</table>
  </body>
</html>';

wp_mail( $to, $subject, $message2, $headers);
}
echo "Sent ".$i." emails";
?>
