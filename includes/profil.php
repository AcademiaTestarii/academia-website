<?php
session_start();
require_once("../__connect.php");
$status = "false";
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ( isset($_POST['action']) && ($_POST['action']=="profil") ) {

			$id = trim(mysqli_real_escape_string($link,$_POST['cursant']));
			$nume = trim(mysqli_real_escape_string($link,$_POST['nume']));
			$prenume = trim(mysqli_real_escape_string($link,$_POST['prenume']));
			$adresa = trim(mysqli_real_escape_string($link,$_POST['adresa']));
			$localitate = trim(mysqli_real_escape_string($link,$_POST['localitate']));
			$data_nastere = trim(mysqli_real_escape_string($link,$_POST['data_nastere']));
			$judet = trim(mysqli_real_escape_string($link,$_POST['judet']));
			$companie = trim(mysqli_real_escape_string($link,$_POST['companie']));
			$pozitie = trim(mysqli_real_escape_string($link,$_POST['pozitie']));
			$telefon = trim(mysqli_real_escape_string($link,$_POST['telefon']));

			$botcheck = $_POST['form_botcheck'];

			if ( $botcheck == '' ) {
				$sql="UPDATE `students` SET `last_name`='".$nume."', `first_name`='".$prenume."', `address`='".$adresa."', `city`='".$localitate."', `date_of_birth`='".$data_nastere."', `county`='".$judet."', `company`='".$companie."', `job_title`='".$pozitie."', `phone`='".$telefon."' WHERE `id`=".$id;
				if ($query=mysqli_query($link,$sql)) {
					$message = 'Datele tale personale au fost modificate.';
					$status = "true";

				} else {
					$message = 'A apărut o eroare, încearcă mai târziu. Cod Eroare: 10Q';
					$status = "false";
				}

			} else {
				$message = 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
				$status = "false";
			}

		} elseif ( isset($_POST['action']) && ($_POST['action']=="inscriere") ) {

			$id_cursant = trim(mysqli_real_escape_string($link,$_POST['cursant']));
			$id_curs = trim(mysqli_real_escape_string($link,$_POST['cursuri']));
			$botcheck = $_POST['form_botcheck'];

			if ( $botcheck == '' ) {
					$sql="INSERT INTO `class_students` (`student_id`,`class_id`) VALUES (".$id_cursant.",".$id_curs.")";
					
				if ($query=mysqli_query($link,$sql)) {
					$message = 'Te-ai înregistrat la acest curs.';
					$status = "true";

				} else {
					$message = 'A apărut o eroare, încearcă mai târziu. Cod Eroare: 10I';
					$status = "false";
				}

			} else {
				$message = 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
				$status = "false";
			}
			
		} elseif ( isset($_POST['action']) && ($_POST['action']=="preferinte") ) {

			$id_cursant = trim(mysqli_real_escape_string($link,$_POST['cursant']));
			$botcheck = $_POST['form_botcheck'];

			if ( $botcheck == '' ) {
				if (isset($_POST['promotii'])) {$promotii=1;} else {$promotii=0;}
				if (isset($_POST['newsletter'])) {$newsletter=1;} else {$newsletter=0;}
				
					$sql="UPDATE `students` SET `promotions`='".$promotii."', `newsletter`='".$newsletter."' WHERE `id`=".$id_cursant;
					
				if ($query=mysqli_query($link,$sql)) {
					$message = 'Ai schimbat setările notificărilor.';
					$status = "true";

				} else {
					$message = 'A apărut o eroare, încearcă mai târziu. Cod Eroare: 10pref';
					$status = "false";
				}

			} else {
				$message = 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
				$status = "false";
			}

    } elseif ( isset($_POST['action']) && ($_POST['action']=="schimbaparola") && ($_POST['parola']!="")) { 
	
			$id_cursant = trim(mysqli_real_escape_string($link,$_POST['cursant']));
			$botcheck = $_POST['form_botcheck'];

			if ( $botcheck == '' ) {
					$parola = md5(trim(mysqli_real_escape_string($link,$_POST['parola'])));
					$sql="UPDATE `students` SET `password`='".$parola."' WHERE `id`=".$id_cursant;
					
				if ($query=mysqli_query($link,$sql)) {
					$message = 'Parola a fost modificată.';
					$status = "true";

				} else {
					$message = 'A apărut o eroare, încearcă mai târziu. Cod Eroare: 10pref';
					$status = "false";
				}

			} else {
				$message = 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
				$status = "false";
			}
			
	} else {
        $message = 'Te rog să <strong>completezi toate câmpurile</strong> şi să incerci din nou. Cod Eroare: 10P';
        $status = "false";
    }

} else {
    $message = 'A apărut o eroare, încearcă mai târziu. Cod Eroare: 10P';
    $status = "false";
}

$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>