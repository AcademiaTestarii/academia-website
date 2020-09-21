<?php
session_start();
if (isset($_GET['cheie']) AND strlen($_GET['cheie'])==12 AND ctype_alnum($_GET['cheie'])) {
	require_once("__connect.php");
	$cod_confirmare=mysqli_real_escape_string($link,$_GET['cheie']);
	$sql="SELECT * FROM `students` WHERE `confirmation_code`='".$cod_confirmare."' AND `is_active`=0";
	$query=mysqli_query($link,$sql);
	if (mysqli_num_rows($query)==1) {
		// activam
		$today=date("Y-m-d H:i:s");
		$row=mysqli_fetch_assoc($query);
		$sql_update="UPDATE `students` SET `is_active`=1,`confirmation_code`=NULL,`activitate`='".$today."' WHERE id=".$row['id'];
		$update=mysqli_query($link,$sql_update);
		$_SESSION['key_admin'] = session_id();
		$_SESSION['id'] = $row['id'];
		header("Location:contul_tau.php#sectiuneaCursuri");
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