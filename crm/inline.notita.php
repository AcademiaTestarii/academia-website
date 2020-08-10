<?php include_once("../__connect.php");?>
<div class="white-popup animated fadeIn">
<?php
if (isset($_GET['cursant']) && isset($_GET['curs'])) {
	$cursant=trim(mysqli_real_escape_string($link,$_GET['cursant']));
	$curs=trim(mysqli_real_escape_string($link,$_GET['curs']));
	$sql_notita="SELECT `notita` FROM `cursant_curs` WHERE `id_cursant`=".$cursant." AND id_curs=".$curs;
	$rownotita=mysqli_fetch_array(mysqli_query($link,$sql_notita));
?>
	<form class="form row" action="vizualizare_curs.php?id=<?php echo $curs;?>" method="POST">
	<div class="col-md-12">
		<h1>Notite</h1>
	</div>
	<div class="col-md-12 form-group">
		<textarea id="notita" style="width:100%" name="notita"><?php echo $rownotita['notita'];?></textarea>
	</div>
	<div class="col-md-12 form-group">
		<button class="btn btn-primary" type="submit">Adauga</button>
		<input type="hidden" name="cursant" value="<?php echo $cursant;?>" />
		<input type="hidden" name="curs" value="<?php echo $curs;?>" />
	</div>
	</form>
<?php } else { echo "Trebuie sa selectezi ceva!";} ?>
</div>