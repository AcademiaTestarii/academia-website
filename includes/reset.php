<?php
session_start();
require_once("../__connect.php");
$status = "false";
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ( $_POST['email'] != '') {

        $email = trim(mysqli_real_escape_string($link,$_POST['email']));
        $botcheck = $_POST['form_botcheck'];

		if ( $botcheck == '' ) {

			$sql_select="SELECT * FROM `cursanti` WHERE `email`='".$email."' AND `activ`=1";
			$query_select=mysqli_query($link,$sql_select);
			if (mysqli_num_rows($query_select)==1) {
				$row=mysqli_fetch_assoc($query_select);
				$cod_resetare=generatePassword();
				$today=date("Y-m-d H:i:s");
				$sql="UPDATE `cursanti` SET `resetare`='".$today."',`cod_resetare`='".$cod_resetare."'  WHERE `id`=".$row['id'];
				
				if ( $query=(mysqli_query($link,$sql)) ):

						require_once('phpmailer/class.phpmailer.php');
						$mail = new PHPMailer();

						$mail->SetFrom( "office@academiatestarii.ro" ,"Academia Testării" );
						$mail->AddReplyTo( "contact@academiatestarii.ro" ,"Academia Testării" );
						$mail->AddAddress( $email , $prenume." ".$nume );
						$mail->Subject = "Cerere resetare parolă platforma Academia Testării";

						$greetings = "Salutare ".$prenume."<br><br>";
						$message = "Ai cerut o resetare a parolei de pe platforma Academia Testării. <br>Poţi schimba parola dupa ce intri în contul tău de pe platforma Academia Testării dând clik pe linkul de mai jos:<br><br><a href=\"https://www.academiatestarii.ro/reset.php?cheie=$cod_resetare\">Schimbă parola</a><br><br>ATENTIE: Acest link expira în 15 minute.<br><br><strong>Daca nu ai solicitat tu acest lucru, te rugăm sa ignori acest mesaj!</strong>";

						$body = "$greetings $message";

						$mail->MsgHTML( $body );
						$sendEmail = $mail->Send();
					
						if( $sendEmail == true ):
						$message = 'Am trimis un email cu instrucțiuni pentru resetarea parolei.';					
						$status = "true";
						else:
						$message = 'Eroare! Te rugăm sa contactezi webmasterul. Cod Eroare: 11R';
						$status = "false";
						endif;

				else:
					$message = 'Eroare! Te rugăm să contactezi webmaster-ul. Cod Eroare: 12R';
					$status = "false";
				endif;
			
			} else {
				$message = 'Ne pare rău. Nu ai cont pe platforma noastră, eşti inactiv sau ai introdus date greşite. Te rugăm să încerci din nou.';
				$status = "false";
			}
			
		} else {
			$message = 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
			$status = "false";
		}	
	
    } else {
        $message = 'Te rog să <strong>completezi toate câmpurile</strong> şi să incerci din nou.';
        $status = "false";
    }
	
} else {
    $message = 'A apărut o eroare, incearcă mai târziu. Cod Eroare: 14R';
    $status = "false";
}

$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>