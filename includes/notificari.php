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
			$companie = trim(mysqli_real_escape_string($link,$_POST['companie']));
			$pozitie = trim(mysqli_real_escape_string($link,$_POST['pozitie']));
			$telefon = trim(mysqli_real_escape_string($link,$_POST['telefon']));
			if ($_POST['parola']!="") { 
				$parola = md5(trim(mysqli_real_escape_string($link,$_POST['parola'])));
			}
			$botcheck = $_POST['form_botcheck'];

			if ( $botcheck == '' ) {
				if ($_POST['parola']!="") { 
					$sql="UPDATE `students` SET `last_name`='".$nume."', `first_name`='".$prenume."', `address`='".$adresa."', `city`='".$localitate."', `company`='".$companie."', `job_title`='".$pozitie."', `phone`='".$telefon."', `password`='".$parola."' WHERE `id`=".$id;
				} else {
					$sql="UPDATE `students` SET `last_name`='".$nume."', `first_name`='".$prenume."', `address`='".$adresa."', `city`='".$localitate."', `company`='".$companie."', `job_title`='".$pozitie."', `phone`='".$telefon."' WHERE `id`=".$id;
				}
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

    } else {
        $message = 'Te rog să <strong>completezi toate câmpurile</strong> şi să incerci din nou. Cod Eroare: 10A';
        $status = "false";
    }

} else {
    $message = 'A apărut o eroare, încearcă mai târziu. Cod Eroare: 10P';
    $status = "false";
}

$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>