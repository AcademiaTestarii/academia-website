<?php
require_once("../__connect.php");

$status = "false";
$host = $_SERVER['HTTP_HOST'];
if (isset($_POST['action'])) {
    if ( $_POST['nume'] != '' AND $_POST['prenume'] != '' AND $_POST['email'] != '' AND $_POST['data_nastere'] != '' AND $_POST['telefon'] != '' AND $_POST['adresa'] != '' AND $_POST['localitate'] != '' AND $_POST['judet'] != '' AND $_POST['curs']!="--" ) {

        $cursant = mysqli_real_escape_string($link,$_POST['cursant']);
        $nume = mysqli_real_escape_string($link,$_POST['nume']);
        $prenume = mysqli_real_escape_string($link,$_POST['prenume']);
        $email = mysqli_real_escape_string($link,trim($_POST['email']));
        $data_nastere = mysqli_real_escape_string($link,$_POST['data_nastere']);
        $profesie = mysqli_real_escape_string($link,$_POST['profesie']);
        $telefon = mysqli_real_escape_string($link,$_POST['telefon']);
        $adresa = mysqli_real_escape_string($link,$_POST['adresa']);
        $localitate = mysqli_real_escape_string($link,$_POST['localitate']);
        $judet = mysqli_real_escape_string($link,$_POST['judet']);
        $educatie = mysqli_real_escape_string($link,$_POST['educatie']);
        $engleza = mysqli_real_escape_string($link,$_POST['engleza']);
        $alta_limba = mysqli_real_escape_string($link,$_POST['alta_limba']);
        $ms_office = mysqli_real_escape_string($link,$_POST['ms_office']);
        $web = mysqli_real_escape_string($link,$_POST['web']);
        $id_curs = mysqli_real_escape_string($link,$_POST['curs']);
        $cost = mysqli_real_escape_string($link,$_POST['cost']);
        $modalitate_plata = mysqli_real_escape_string($link,$_POST['modalitate_plata']);
        $tip_plata = mysqli_real_escape_string($link,$_POST['tip_plata']);
		if (isset($_POST['newsletter'])) {$newsletter=1;} else {$newsletter=0;}

        $botcheck = $_POST['form_botcheck'];

		if ( $botcheck == '' ) {

			$sql_select="SELECT * FROM `students` WHERE `email`='".$email."'";
			$query_select=mysqli_query($link,$sql_select);

			if (mysqli_num_rows($query_select)==0) {

				$parola=generateParolaMica();
				$cod_confirmare=generatePassword();
				$sql="INSERT INTO `students` (`last_name`,`first_name`,`email`,`password`,`confirmation_code`,`date_of_birth`,`job_title`,`phone`,`address`,`city`,`county`,`education`,`english`,`other_language`,`ms_office`,`web`,`newsletter`) VALUES (
				'".$nume."',
				'".$prenume."',
				'".$email."',
				'".md5($parola)."',
				'".$cod_confirmare."',
				'".$data_nastere."',
				'".$profesie."',
				'".$telefon."',
				'".$adresa."',
				'".$localitate."',
				'".$judet."',
				'".$educatie."',
				'".$engleza."',
				'".$alta_limba."',
				'".$ms_office."',
				'".$web."',
				".$newsletter."
				)";
				if ( $query=(mysqli_query($link,$sql)) ) {

					$id_cursant=mysqli_insert_id($link);
					$sql2="INSERT INTO `class_students` (`student_id`, `class_id`, `payment_method`,`payment_type`)
					VALUES
					(".$id_cursant.", ".$id_curs.", '".$modalitate_plata."', '".$tip_plata."')";
					$query2=mysqli_query($link,$sql2);
					require_once('phpmailer/class.phpmailer.php');

					$mail = new PHPMailer();

					$mail->setFrom( "office@academiatestarii.ro" ,"Academia Testării" );
					$mail->addReplyTo( "contact@academiatestarii.ro" ,"Academia Testării" );
					$mail->addAddress( $email , $prenume." ".$nume );

					$mail->Subject = "Confirma înregistrarea pe platforma Academia Testarii";

					$greetings = "Salut ".$prenume."<br><br>";
					$message = "<p>Mulţumim pentru înregistrare! Ti-am rezervat un loc in clasă.<br>
					Pentru a finaliza inscrierea, te rugam sa faci plata, conform modalitatii de plata aleasa (integral, in rate), in contul RO42 INGB 0000 9999 0985 9526. Te rugam sa mentionezi in detaliile de plata, persoana pentru care se face plata.<p>
					<p>Pentru a intra în contul tău de pe platforma Academia Testării trebuie mai întâi să activezi contul dând clik pe linkul de mai jos:<br><br><a href=\"$host/confirma.php?cheie=$cod_confirmare\">Confirmă înregistrarea</a><br><br>Am setat o parola temporara pentru tine: <strong>".$parola."</strong>. Poti schimba parola imediat dupa ce activezi contul.</p>
					<p>Iti multumim,<br>Echipa Academia Testarii</p>";

					$body = "$greetings $message";

					$mail->msgHTML( $body );
					$Sendmail = $mail->Send();

					if( $Sendmail == true ) {
					$message = 'Mulţumim pentru înregistrare. Am trimis un mesaj de confirmare, te rugăm să verifici emailul şi să dai click pe linkul din mesaj pentru a confirma înregistrarea.';
					$status = "true";

					/* Notificare */
					$sqlnotificare="SELECT *, main_classes.title as main_title FROM `classes`
					LEFT JOIN `main_classes` ON `classes`.`main_class_id`=`main_classes`.`id`
					WHERE `classes`.`id`=".$id_curs." AND main_classes.trainer_provider_id=$academiaTestariiTrainerProvider";
					$querynotificare=mysqli_query($link,$sqlnotificare);

					if (mysqli_num_rows($querynotificare)>0) {
						$cursactiv=mysqli_fetch_assoc($querynotificare);
						$valoare=$cursactiv['price'];
						$nume_curs=$cursactiv['main_title'];
						$data=$cursactiv['registration_start_date'];
					}
					$notificare = new PHPMailer();

					$notificare->setFrom( "office@academiatestarii.ro" ,"Academia Testării" );
					$notificare->addAddress( "contact@academiatestarii.ro" ,"Academia Testării" );

					$notificare->Subject = "Academia Testarii - O Inscriere Noua!";

					$greetingsnotificare = "<h3>O Inscriere Noua!</h3>";
					$messagenotificare = "<p>Nume: ".$prenume." ".$nume."<br />
								Email: ".$email."<br />
								Modul: ".$nume_curs."<br />
								Start curs: ".$data."<br />
								Pret curs: ".$valoare."<br />
								Telefon: ".$telefon."</p>";

					$bodynotificare = "$greetingsnotificare $messagenotificare";

					$notificare->msgHTML( $bodynotificare );
					$Sendmailnotificare = $notificare->Send();

					} else {
					$message = 'Eroare! Te rugăm sa contactezi webmasterul. Cod Eroare: 12M';
					$status = "false";
					}

					$message = 'Mulţumim pentru înregistrare. Am trimis un mesaj de confirmare, te rugăm să verifici emailul şi să dai click pe linkul din mesaj pentru a confirma înregistrarea.';
					$status = "true";

					} else {
					//printf("Error SQL adaugare blog: %s\n", mysqli_error($link));
					$message = 'Eroare! Te rugăm sa contactezi webmasterul. Cod Eroare: 12Q';
					$status = "false";
					}

			} else {
				$id_cursant=$cursant;
				$sql3="INSERT INTO `class_students` (`student_id`, `class_id`, `payment_method`,`payment_type`)
				VALUES
				(".$id_cursant.", ".$id_curs.", '".$modalitate_plata."', '".$tip_plata."')";
				$query3=mysqli_query($link,$sql3);
				$message = 'Mulţumim pentru înregistrare. Ti-am rezervat un loc in clasă.';
				$status = "true";

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

$status_array = array( 'message' => $message, 'status' => $status, 'curs' => $id_curs);
echo json_encode($status_array);
?>