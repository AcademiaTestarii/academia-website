<?php include_once("../__connect.php");?>

<div class="white-popup animated fadeIn">
<?php
if (isset($_GET['cursant']) && isset($_GET['curs'])) {
	$cursant=trim(mysqli_real_escape_string($link,$_GET['cursant']));
	$curs=trim(mysqli_real_escape_string($link,$_GET['curs']));
?>
<form class="form row" action="vizualizare_curs.php?id=<?php echo $curs;?>" method="POST">
					<div class="form-group">
						<div class="col-md-12 form-group">
						<h1>Muta cursantul la un alt curs</h1>
						<select class="form-control" name="cursnou">
							<option value="--">-- alege curs --</option>
<?php 	
$sql_cursuri="SELECT * FROM `curs_main` WHERE `activ_main`=1 ORDER BY `order` ASC";
$query_cursuri=mysqli_query($link,$sql_cursuri);
$disabled="";
while ($row_cursuri=mysqli_fetch_assoc($query_cursuri)) { ?>
							<optgroup label="<?php echo str_replace("<br />","",$row_cursuri['titlu_main']);?>">
<?php 	
$sql_cursuri2="SELECT * FROM `cursuri` WHERE `parent`=".$row_cursuri['id_curs_main']." AND `start_inscriere`>NOW() ORDER BY `start_inscriere` ASC LIMIT 2";
$query_cursuri2=mysqli_query($link,$sql_cursuri2);
while ($row_cursuri2=mysqli_fetch_assoc($query_cursuri2)) { 
$disabled="";
if ($membru) {
$cursuriSql=mysqli_query($link,"SELECT * FROM `cursant_curs` WHERE `id_cursant`=".$row_userlogat['id']." AND `id_curs`=".$row_cursuri2['id']);
if (mysqli_num_rows($cursuriSql)>0) {$inscris=true;$disabled="disabled";} else {$inscris=false;$disabled="";}
}
$activ="";
if ($row_cursuri2['id']==$cursactiv['id']) {$activ="selected";}
echo $row_cursuri2['id']."--".$cursactiv['id'];
?>
								<option <?php echo $activ;?> <?php echo $disabled;?> value="<?php echo $row_cursuri2['id'];?>"><?php if ($row_cursuri2['start_inscriere']!="0000-00-00") { echo strftime("%e %B %Y", strtotime($row_cursuri2['start_inscriere']))." - ".strftime("%e %B %Y", strtotime($row_cursuri2['end_inscriere']));} else {echo "TBA";}?> <?php if ($inscris) {echo " -- Esti înscris la acest curs.";};?></option>
<?php } ?>
							</optgroup>
<?php } ?>
						</select>
						</div>

	<div class="col-md-12 form-group">
		<button class="btn btn-primary" type="submit">Muta</button>
		<input type="hidden" name="cursant" value="<?php echo $cursant;?>" />
		<input type="hidden" name="curs" value="<?php echo $curs;?>" />
	</div>
					</div>
</form>
<?php } else { echo "Trebuie sa selectezi ceva!";} ?>
</div>
