<?php
require_once("../__connect.php");

$status = "false";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ( $_POST['nume'] != '' AND $_POST['prenume'] != '' AND $_POST['email'] != '' AND $_POST['parola'] != '') {

        $nume = mysqli_real_escape_string($link,$_POST['nume']);
        $prenume = mysqli_real_escape_string($link,$_POST['prenume']);
        $email = mysqli_real_escape_string($link,$_POST['email']);
        $parola = mysqli_real_escape_string($link,$_POST['parola']);
        $botcheck = $_POST['form_botcheck'];

		if ( $botcheck == '' ) {

			$sql_select="SELECT * FROM `cursanti` WHERE `email`='".$email."'";
			$query_select=mysqli_query($link,$sql_select);
			if (mysqli_num_rows($query_select)==0) {
				
				$cod_confirmare=generatePassword();
				$sql="INSERT INTO `cursanti` (`nume`,`prenume`,`email`,`parola`,`cod_confirmare`) 
				VALUES 
				('".$nume."','".$prenume."','".$email."','".md5($parola)."','".$cod_confirmare."')";
				
				if ( $query=(mysqli_query($link,$sql)) ):
				
					require_once('phpmailer/class.phpmailer.php');

					$mail = new PHPMailer();

					$mail->setFrom( "office@academiatestarii.ro" ,"Academia Testării" );
					$mail->addReplyTo( "contact@academiatestarii.ro" ,"Academia Testării" );
					$mail->addAddress( $email , $prenume." ".$nume );
					$mail->Subject = "Confirmă înregistrarea pe platforma Academia Testării";

					$greetings = "Salutare ".$prenume."<br><br>";
					$message = "Mulţumim pentru înregistrare! <br>Pentru a intra în contul tău de pe platforma Academia Testării trebuie mai întâi să activezi contul dând clik pe linkul de mai jos:<br><br><a href=\"https://www.academiatestarii.ro/confirma.php?cheie=$cod_confirmare\">Confirmă înregistrarea</a><br><br>Parola ta este: <strong>".$parola."</strong><br><br>Te aşteptăm cu drag,<br>Academia Testării.";

					$body = "$greetings $message";

					$mail->MsgHTML( $body );
					$Sendmail = $mail->Send();
				
					if( $Sendmail == true ):
					$message = 'Mulţumim pentru înregistrare. Am trimis un mesaj de confirmare, te rugăm să verifici emailul şi să dai click pe linkul din mesaj pentru a confirma înregistrarea.';
					$status = "true";
					
					/* Notificare */
					$notificare = new PHPMailer();

					$notificare->setFrom( "office@academiatestarii.ro" ,"Academia Testării" );
					$notificare->addAddress( "contact@academiatestarii.ro" ,"Academia Testării" );
					
					$notificare->Subject = "Academia Testarii - O Inregistrare Noua!";

					$greetingsnotificare = "<h3>O Inregistrare Noua!</h3>";
					$messagenotificare = "<p>Nume: ".$prenume." ".$nume."<br />
								Email: ".$email."<br />tocmai si-a creat un cont pe www.academiatestarii.ro</p>";

					$bodynotificare = "$greetingsnotificare $messagenotificare";

					$notificare->msgHTML( $bodynotificare );
					$Sendmailnotificare = $notificare->Send();
					
					else:
					$message = 'Eroare! Te rugăm sa contactezi webmasterul. Cod Eroare: 12M';
					$status = "false";
					endif;
				
					$message = 'Mulţumim pentru înregistrare. Am trimis un mesaj de confirmare, te rugăm să verifici emailul şi să dai click pe linkul din mesaj pentru a confirma înregistrarea.';
					$status = "true";
				else:
					$message = 'Eroare! Te rugăm sa contactezi webmasterul. Cod Eroare: 12Q';
					$status = "false";
				endif;
			
			} else {
				$message = 'Ai deja cont pe platforma noastra. Te rugăm să foloseşti formularul de login pentru a intra in cont sau pentru a schimba parola.';
				$status = "false";
			}
			
		} else {
			$message = 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
			$status = "false";
		}	
	
    } else {
        $message = 'Te rog să <strong>completezi toate campurile</strong> şi să încerci din nou.';
        $status = "false";
    }
	
} else {
    $message = 'A apărut o eroare, încearcă mai târziu.';
    $status = "false";
}

$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>