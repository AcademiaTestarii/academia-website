<?php

require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');

$mail = new PHPMailer();

$status = "false";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['email'] != '' and $_POST['mesaj'] != '') {

    $email = $_POST['email'];
    $mesaj = $_POST['mesaj'];
    $telefon = $_POST['telefon'];
    $nume_companie = $_POST['nume-companie'];
    $name = $_POST['nume'] . ' ' . $_POST['prenume'];
    //$car = $_POST['subiect'];

    $subject = 'Mesaj de pe pagina de servicii companii';

    $botcheck = $_POST['form_botcheck'];

    $toemail = 'contact@academiatestarii.ro'; // Your Email Address
    $toname = 'Academia Testarii'; // Receiver Name

    if ($botcheck == '') {

      $mail->setFrom($email, $name);
      $mail->addReplyTo($email, $name);
      $mail->addAddress($toemail, $toname);
      $mail->addBCC("dmirea@rec.org",  "Daniel Mirea");
      $mail->Subject = $subject;

      $email = isset($email) ? "Email: $email<br><br>" : '';
      $mesaj = isset($mesaj) ? "Mesaj: $mesaj<br><br> Nr Telefon: $telefon <br><br> Companie: $nume_companie" : '';

      $body = "$email $mesaj";

      $mail->msgHTML($body);
      $Sendmail = $mail->Send();

      if ($Sendmail == true) :
        $message = 'Multumim pentru mesaj. Te vom contacta in cel mai scurt timp';
        $status = "true";
      else :
        $message = 'Nu am putut trimite mesajul datorita unei erori. Incearca mai tarziu sau scrie-ne direct la contact@academiatestarii.ro<br /><br /><strong>Eroare:</strong><br />' . $mail->ErrorInfo . '';
        $status = "false";
      endif;
    } else {
      $message = 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
      $status = "false";
    }
  } else {
    $message = 'Te rugam sa completezi toate campurile si sa incerci din nou.';
    $status = "false";
  }
} else {
  $message = 'Eroare. Incearca mai tarziu.';
  $status = "false";
}

$status_array = array('message' => $message, 'status' => $status);
echo json_encode($status_array);
