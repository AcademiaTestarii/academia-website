<?php
session_start();
if (isset($_GET['cheie']) AND strlen($_GET['cheie'])==12 AND ctype_alnum($_GET['cheie'])) {
	require_once("__connect.php");
	$cod_confirmare=trim(mysqli_real_escape_string($link,$_GET['cheie']));
	$sql="SELECT * FROM `cursanti` WHERE `cod_resetare`='".$cod_confirmare."' AND `activ`=1 AND `resetare` > NOW() - INTERVAL 15 MINUTE";
	$query=mysqli_query($link,$sql);
	if (mysqli_num_rows($query)==1) {
		// resetam
		$row=mysqli_fetch_assoc($query);
		$sql_update="UPDATE `cursanti` SET `parola`=NULL,`cod_resetare`=NULL,`resetare`=NULL WHERE id=".$row['id'];
		$update=mysqli_query($link,$sql_update);
		$_SESSION['key_admin'] = session_id();
		$_SESSION['id'] = $row['id'];
		header("Location:contul_tau.php");
	} else {
		// deja activat
		echo "Se pare ca timpul de resetare a parolei a expirat.";
		header("Location:index.php");
	}
// no direct access
} else {
	header("Location:index.php");
}
?>