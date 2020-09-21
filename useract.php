<?php 
$sql_userlogat="SELECT * FROM `students` WHERE `id`=".$_SESSION['id'];
$query_userlogat=mysqli_query($link,$sql_userlogat);
$row_userlogat=mysqli_fetch_assoc($query_userlogat);
?>