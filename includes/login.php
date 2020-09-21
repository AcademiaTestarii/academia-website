<?php
session_start();
require_once("../__connect.php");
$status = "false";
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ( $_POST['email'] != '' AND $_POST['parola'] != '') {

        $email = trim(mysqli_real_escape_string($link,$_POST['email']));
        $parola = trim(mysqli_real_escape_string($link,$_POST['parola']));
        $botcheck = $_POST['form_botcheck'];

		if ( $botcheck == '' ) {

			$sql_select="SELECT * FROM `students` 
WHERE `email`='".$email."' AND `password`='".md5($parola)."' AND `is_active`=1";
			$query_select=mysqli_query($link,$sql_select);
			if (mysqli_num_rows($query_select)==1) {
				$row=mysqli_fetch_assoc($query_select);
				
				$today=date("Y-m-d H:i:s");
				$sql="UPDATE `students` SET `activity`='".$today."' WHERE `id`=".$row['id'];
				
				if ( $query=(mysqli_query($link,$sql)) ):
					$message = 'Bine ai revenit. Vei fi redirecționat către contul tău.';
					$status = "true";
					$_SESSION['key_admin'] = session_id();
					$_SESSION['id'] = $row['id'];
					$message = 'Bine ai revenit!';
				else:
					$message = 'Eroare! Te rugăm să contactezi webmaster-ul. Cod Eroare: 12Q';
					$status = "false";
				endif;
			
			} else {
				$message = 'Ne pare rău. Nu ai cont pe platforma noastră, eşti inactiv sau ai introdus date greşite. Daca ai uitat parola, o poti reseta mai jos.';
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
    $message = 'A apărut o eroare, incearcă mai târziu. Cod Eroare: 14Q';
    $status = "false";
}

$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>