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

	$nume = $p['nume'];
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
	$web = $p['web'];
	$user = $p['user'];
	$mod_plata = $p['mod_plata'];
	$tip_plata = $p['tip_plata'];

	$to = get_option('admin_email');
	$subject = 'AcadamiaTestarii - O Inscriere Noua!';
	$headers = 'From: AcadamiaTestarii.ro <office@academiatestarii.ro>' . "\r\n";
	$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"></body>Cerere de oferta:';
	$message .= '<br />';
	$message .= '<br />Nume: ';
	$message .= $nume;
	$message .= '<br />Email: ';
	$message .= $email;
	$message .= '<br />Zi de nastere: ';
	$message .= $telefon;
	$message .= '<br /></body></html>';

// $field = ',"sasa":"sdsd"';
	if( $nume == '' ){ $field .= ',"nume":"no"'; }
	if( $email == '' ){ $field .= ',"email":"no"'; }
	if( $prenume == '' ){ $field .= ',"prenume":"no"'; }
	if( $data == '' ){ $field .= ',"data":"no"'; }
	if( $modul == 0 ){ $field .= ',"modul":"no"'; }
	if( $profesie == '' ){ $field .= ',"profesie":"no"'; }
	if( $telefon == '' || !preg_match('~^\d{10}$~', $telefon)){ $field .= ',"telefon":"no"'; }
	if( $educatie == '' ){ $field .= ',"educatie":"no"'; }

	if( !isset($field) ){

	//	$query = "INSERT INTO `db_module` (nume, prenume, profesie, email, telefon, data, perioada, educatie, engleza, web, office, user) VALUES ('{$nume}', '{$prenume}', '{$profesie}','{$email}', '{$telefon}', '{$data}','{$perioada}', '{$educatie}', '{$engleza}', '{$web}', '{$office}', '{$user}',)";
		
		$wpdb->insert( 
			'db_module', 
			array( 
				'nume' => $nume, 
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

		$ID = $modul;
		global $post,$wpdb;
		$payu = get_post_meta($ID, 'payu', true);
		$payuR = get_post_meta($ID, 'payu_rata', true);

		wp_mail( $to, $subject, $message, $headers, $attachments );

		if ($tip_plata == 2) {
			echo '{"response":"yes" , "payu": "'.$payuR.'"}';
		} else {
			echo '{"response":"yes" , "payu": "'.$payu.'"}';
		}
	} else{

		echo '{"response":"no"'.$field.'}';

	}

?>