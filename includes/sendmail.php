<?php

require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');

$mail = new PHPMailer();

$status = "false";

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( $_POST['nume'] != '' AND $_POST['email'] != '' AND $_POST['catre'] != '' AND $_POST['mesaj'] != '' ) {

        $nume = $_POST['nume'];
        $email = $_POST['email'];
        $catre = $_POST['catre'];
        $telefon = $_POST['telefon'];
        $mesaj = $_POST['mesaj'];

        $subject = 'Mesaj de pe pagina web Academia Testarii';

        $botcheck = $_POST['form_botcheck'];

        $toemail = $catre; // Your Email Address
        $toname = 'Academia Testarii'; // Receiver Name

        if( $botcheck == '' ) {

            $mail->SetFrom( $email , $nume );
            $mail->AddReplyTo( $email , $nume );
            $mail->AddAddress( $toemail , $toname );
            $mail->Subject = $subject;

            $nume = isset($name) ? "Nume: $nume<br>" : '';
            $email = isset($email) ? "Email: $email<br>" : '';
            $telefon = isset($telefon) ? "Telefon: $telefon<br><br>" : '';
            $mesaj = isset($mesaj) ? "Mesaj: $mesaj<br><br>" : '';

            $body = "$nume $email $telefon $mesaj";

            $mail->MsgHTML( $body );
            $sendEmail = $mail->Send();

            if( $sendEmail == true ):
                $message = 'Multumim pentru mesaj. Te vom contacta in cel mai scurt timp';
                $status = "true";
            else:
                $message = 'Mesajul nu a putut fi trimis. <br /><br /><strong>Motiv:</strong><br />' . $mail->ErrorInfo . '';
                $status = "false";
            endif;
        } else {
            $message = 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
            $status = "false";
        }
    } else {
        $message = 'Te rugam sa completezi toate campurile.';
        $status = "false";
    }
} else {
    $message = 'A aparut o eroare, te rugam sa incerci din nou mai tarziu.';
    $status = "false";
}

$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>