<?php
/**
 * Template Name: Ajax
 * Description: First page of the site
 *
 * @package WordPress
 * @subpackage Winmarkt
 */
	global $wpdb;
	$p = ($_POST);

	$prenume = $p['prenume'];
	$email = $p['email'];
	$profesie = $p['profesie'];
	$telefon = $p['telefon'];
	$data = $p['data'];
	$perioada = $p['perioada'];
	$modul = $p['modul'];
	$educatie = $p['educatie'];
	$engleza = $p['engleza'];
	$office = $p['office'];
	$termeni = $p['termeni'];
    $conditii = $p['conditii'];
	$nume = $p['nume'];
    $adresa = $p['adresa'];
	$web = $p['web'];
	$user = $p['user'];
	$mod_plata = $p['mod_plata'];
	$tip_plata = $p['tip_plata'];
	$ID = $modul;
	$title = get_the_title($ID);
	$to = get_option('admin_email');
	$subject = 'AcadamiaTestarii - O Inscriere Noua!';
	$headers = 'From: AcadamiaTestarii.ro <office@academiatestarii.ro>' . "\r\n";
	$message .= '<h2>O noua inscriere</h2>';
	$message .= '<br />Nume: ';
	$message .= $nume;
	$message .= '<br />Email: ';
	$message .= $email;
	$message .= '<br />Modul: ';
	$message .= $title;
	$message .= '<br />Perioada: ';
	$message .= $perioada;
	$message .= '<br />Telefon: ';
	$message .= $telefon;
	$message .= '<br /></body></html>';

	// Form Validations
	if( $nume == '' ){ $field .= ',"nume":"no"'; }
    if( $adresa == '' ){ $field .= ',"adresa":"no"'; }
    if( $engleza == 1 ){ $field .= ',"engleza":"no"'; }
	if( $email == '' ){ $field .= ',"email":"no"'; }
	if( $prenume == '' ){ $field .= ',"prenume":"no"'; }
	if( $data == '' ){ $field .= ',"data":"no"'; }
	if($termeni == 'false'){ $field .= ',"termeni":"no"'; }
    if($conditii == 'false'){ $field .= ',"conditii":"no"'; }
	if( $modul == 0 ){ $field .= ',"modul":"no"'; }
	if( $profesie == '' ){ $field .= ',"profesie":"no"'; }
	if( $telefon == '' || !preg_match('~^\d{10}$~', $telefon)){ $field .= ',"telefon":"no"'; }
	if( $educatie == '' ){ $field .= ',"educatie":"no"'; }

	$exists = $wpdb->get_var("SELECT COUNT(*) FROM useri_inscrisi WHERE email = '$email' AND perioada = '$perioada' AND modul = '$modul'");
	
		if ( $exists > 0 ) {
			 $field .= ',"email":"no"';
			   
		} 
		

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
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Mulţumim pentru înscriere.</span>
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                       <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                       <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Buna, '.$nume.' '.$prenume.'</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Mulţumim pentru înscriere.</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Ti-am rezervat un loc in programul nostru '.$title.' din perioada '.$perioada.'.</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Pentru confirmare, te rugam sa efectuezi transferul bancar in contul de mai jos si sa trimiti dovada platii la adresa office@academiatestarii.ro in termen de 2 zile lucratoare.<br/>Foloseste detaliile: 
                        </p>
                       <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Cont: RO26 INGB 0000 9999 0778 6148  <br/>Deschis la banca: ING Bank, Bucuresti <br/> Beneficiar: ACADTEST SRL 
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Îţi stăm la dispoziţie pentru alte informaţii, pe <a href="mailto:contact@academiatestarii.ro"> mail</a>, <a href="https://www.facebook.com/academiatestarii/">Facebook</a> sau la telefon (<a href="tel:0799005004">0799005004<a> sau <a href="tel:0734540913">0734540913</a>).
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Ne vedem la curs!</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Bucurie, <br/>Echipa Academia Testării</p>
                        
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

$message3 = '<!doctype html>
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
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Mulţumim pentru înscriere.</span>
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                       <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                       <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Buna, '.$nume.' '.$prenume.'</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Mulţumim pentru înscriere.</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">'.$title.' se va desfăşura în perioada '.$perioada.', în DBConnect din cadrul DB Global Technology, din Dimitrie Pompeiu nr. 6A (punct de reper: statia de Metrou Pipera).</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Pe lângă atitudinea deschisă pentru a învăţa ceva nou, te rugăm să mai iei cu tine Cartea de Identitate, deoarece accesul în clădire se face pe baza acesteia. 
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;"><a href="http://academiatestarii.ro/index.php/my-account/">Intră in cont</a> pentru a accesa detaliile personale, programul si materialele de curs.
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Îţi stăm la dispoziţie pentru alte informaţii, pe <a href="mailto:contact@academiatestarii.ro"> mail</a>, <a href="https://www.facebook.com/academiatestarii/">Facebook</a> sau la telefon (<a href="tel:0799005004">0799005004<a> sau <a href="tel:0734540913">0734540913</a>).
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Ne vedem la curs!</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Bucurie, <br/>Echipa Academia Testării</p>
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

	if( !isset($field) ){

	//	Database insertion
		$wpdb->insert( 
			'db_module', 
			array( 
				'nume' => $nume,
                'adresa' => $adresa,
                'prenume' => $prenume,
				'profesie' => $profesie, 
				'email' => $email, 
				'telefon' => $telefon, 
				'data' => $data, 
				'perioada' => $perioada, 
				'modul' => $modul, 
				'educatie' => $educatie, 
				'engleza' => $engleza, 
				'web' => $web, 
				'office' => $office, 
				'status' => 0, 
				'user' => $user,
				'tip_plata' => $tip_plata,
				'mod_plata' => $mod_plata

			), 
			array( 
				'%s',
                '%s',
                '%s',
				'%s', 
				'%s', 
				'%s', 
				'%s', 
				'%s',
				'%d',
				'%s',  
				'%d',
				'%d',
				'%d',
				'%d',
				'%d',
				'%d',
				'%d'
			) 
		);

		$wpdb->insert( 
				'useri_inscrisi', 
				array( 
					'email' => $email, 
					'perioada' => $perioada, 
					'status' => 0, 
					'modul' => $modul,
					'mod_plata' => $mod_plata
				), 
				array( 
					'%s', 
					'%s',
					'%d',
					'%d',
					'%d'
				) 
		);

		global $post,$wpdb;
		$payu = get_post_meta($ID, 'payu', true);
		$payuR = get_post_meta($ID, 'payu_rata', true);

		//Sending Emails
		wp_mail( $to, $subject, $message, $headers);
		if ($mod_plata == 1) {
			wp_mail( $email, 'Multumim pentru inscriere!', $message3, $headers);
		} else {
			wp_mail( $email, 'Multumim pentru inscriere!', $message2, $headers);
		}

		if ($tip_plata == 2) {
			echo '{"response":"yes" , "payu": "'.$payuR.'"}';
		} else {
			echo '{"response":"yes" , "payu": "'.$payu.'"}';
		}
	} else{

		echo '{"response":"no"'.$field.'}';

	}

?>