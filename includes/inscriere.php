<?php

require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');

$mail = new PHPMailer();

$message = "";
$status = "false";

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( $_POST['form_name'] != '' AND $_POST['form_email'] != '' AND $_POST['form_subject'] != '' ) {

        $name = $_POST['form_name'];
        $email = $_POST['form_email'];
        $subject = $_POST['form_subject'];
        $phone = $_POST['form_phone'];
        $message = $_POST['form_message'];

        $subject = isset($subject) ? $subject : 'Mesaj de pe pagina web';

        $botcheck = $_POST['form_botcheck'];

        $toemail = 'contact@academiatestarii.ro'; // Your Email Address
        $toname = 'Academia Testarii';                // Receiver Name

        if( $botcheck == '' ) {

            $mail->SetFrom( $email , $name );
            $mail->AddReplyTo( $email , $name );
            $mail->AddAddress( $toemail , $toname );
            $mail->Subject = $subject;

            $name = isset($name) ? "Nume: $name<br><br>" : '';
            $email = isset($email) ? "Email: $email<br><br>" : '';
            $phone = isset($phone) ? "Telefon: $phone<br><br>" : '';
            $message = isset($message) ? "Mesaj: $message<br><br>" : '';

            $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>Mesaj trimis de la: ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$name $email $phone $message $referrer";

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