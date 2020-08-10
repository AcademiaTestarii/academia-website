<?php 
include("../__connect.php");

/* genereaza parola ptr cursantii vechi */

/*
$sql="SELECT * FROM cursanti WHERE ISNULL(`parola`)";
$query=mysqli_query($link,$sql);
while ($row=mysqli_fetch_assoc($query)) {
$parole=explode("@",$row['email']);
echo $parole[0]."<br>";
$parola=md5($parole[0]);
$sqlUpdate="UPDATE `cursanti` SET `parola`='".$parola."' WHERE `id`=".$row['id'];
$queryUpdate=mysqli_query($link,$sqlUpdate);
if ($queryUpdate) {echo "Done --";} else {echo mysqli_error($link);} 
}
*/

/* compara cursanti vechi cu cei noi */
/*
$vechi=mysqli_query($link,"SELECT DISTINCT(`email`) FROM `wp_posts` WHERE `email` NOT IN (SELECT `email` FROM `cursanti`) ORDER BY `email`");
$i=1;
while ($row_vechi=mysqli_fetch_array($vechi)) {
	$nou=mysqli_query($link,"SELECT * FROM `wp_posts` WHERE `email`='".$row_vechi['email']."' LIMIT 1");
	$row_now=mysqli_fetch_array($nou);
	mysqli_query($link,"INSERT INTO `cursanti` (`nume`,`prenume`,`email`,`telefon`) VALUES ('".$row_now['nume']."','".$row_now['prenume']."','".$row_now['email']."','".$row_now['telefon']."')");
		echo $i." - ".$row_vechi['email']." DONE <br>";
		$i++;
	}
*/	
?>