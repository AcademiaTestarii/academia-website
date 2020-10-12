<?php
session_start();
if (isset($_GET['cheie']) AND strlen($_GET['cheie'])==12 AND ctype_alnum($_GET['cheie'])) {
	require_once("__connect.php");
	$cod_confirmare=mysqli_real_escape_string($link,$_GET['cheie']);
	$sql="SELECT * FROM `students` WHERE `confirmation_code`='".$cod_confirmare."' AND `is_active`=0";
	$query=mysqli_query($link,$sql);
	if (mysqli_num_rows($query)==1) {
		// activam
		$row=mysqli_fetch_assoc($query);
		$sql_update="UPDATE `students` SET `is_active`=1,`confirmation_code`=NULL WHERE id=".$row['id'];
		$update=mysqli_query($link,$sql_update);
		$_SESSION['key_admin'] = session_id();
		$_SESSION['id'] = $row['id'];
		require_once('phpmailer/class.phpmailer.php');
			$mail->CharSet = 'UTF-8';
			$mail->Encoding = 'base64';
			$mail = new PHPMailer();

			$mail->SetFrom( "office@academiatestarii.ro" ,"Academia Testării" );
			$mail->AddReplyTo( "contact@academiatestarii.ro" ,"Academia Testării" );
			$mail->AddAddress( $email , $prenume." ".$nume );
			$mail->Subject = "Confirma înregistrarea pe platforma Academia Testarii";

			$greetings = "Salutare ".$prenume."<br><br>";
			$message = "Mulţumim pentru confirmare! <br>Am setat o parola temporara pentru tine: <strong></strong>.
			<p>O poti scimba orican din contul tau sau folosind ntru a intra în contul tău de pe platforma Academia Testării trebuie mai întâi să activezi contul dând clik pe linkul de mai jos:<br><br><a href=\"/confirma.php?cheie=$cod_confirmare\">Confirmă înregistrarea</a><br><br>Te aşteptăm cu drag,<br>Academia Testării.";

			$body = "$greetings $message";

			$mail->MsgHTML( $body );
			$sendEmail = $mail->Send();

		header("Location:contul_tau.php");
	} else {
		// deja activat
		echo "Acest cont a fost deja activat sau codul de activare este invalid.";
		header("Location:index.php");
	}
// no direct access
} else {
	header("Location:index.php");
}
?>