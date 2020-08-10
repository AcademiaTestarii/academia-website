<?php 
include("../__connect.php");
$today = getdate();
$page = "home-page";

$id=1;
$sql=mysqli_query($link,"SELECT * FROM `continut` WHERE `id`=".$id);
	if (mysqli_num_rows($sql)>0) {
		// edit
		$row=mysqli_fetch_array($sql);
		$submit="edit";
		$pagetitle="Modificare continut ".$row['nume'];
	} else {
		header ("Location: dashboard.php");
	}
$new=FALSE;

// stare bannere
if (isset($_GET['stare']) AND is_numeric($_GET['stare'])) {
	if ($_GET['value']==1){
	$sql_update_stare=mysqli_query($link,"UPDATE `slider` SET `active`=0 WHERE `id`=".$_GET['id']);
	} else {
	$sql_update_stare=mysqli_query($link,"UPDATE `slider` SET `active`=1 WHERE `id`=".$_GET['id']);	
	}
header ("Location:home-page.php");
}

// sterge 
if (isset($_GET['sterge']) AND is_numeric($_GET['sterge'])) {
	$sql_sterge=mysqli_query($link,"DELETE FROM `slider` WHERE `id`=".$_GET['sterge']);
header ("Location:home-page.php");
}

// testimonial
if (isset($_GET['staret']) AND is_numeric($_GET['staret'])) {
	if ($_GET['valuet']==1){
	$sql_update_stare=mysqli_query($link,"UPDATE `testimoniale` SET `active`=0 WHERE `id`=".$_GET['idt']);
	} else {
	$sql_update_stare=mysqli_query($link,"UPDATE `testimoniale` SET `active`=1 WHERE `id`=".$_GET['idt']);	
	}
header ("Location:home-page.php");
}

// sterge 
if (isset($_GET['sterget']) AND is_numeric($_GET['sterget'])) {
	$sql_sterge=mysqli_query($link,"DELETE FROM `testimoniale` WHERE `id`=".$_GET['sterget']);
header ("Location:home-page.php");
}

// salvare
if (isset($_POST['salveaza_homepage'])) {
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

mysqli_query($link,"UPDATE `continut` SET `titlu`='".mysqli_real_escape_string($link,trim($_POST['titlu_1']))."', `text`='".mysqli_real_escape_string($link,trim($_POST['text_1']))."' WHERE `id`=1");
mysqli_query($link,"UPDATE `activitate` SET `folowers`=".$_POST['followers'].", `cursuri`=".$_POST['cursuri'].", `absolventi`=".$_POST['absolventi'].", `recomandari`=".$_POST['recomandari']." WHERE `id`=1");

mysqli_query($link,"UPDATE `continut` SET `titlu`='".mysqli_real_escape_string($link,trim($_POST['titlu_3']))."', `text`='".mysqli_real_escape_string($link,trim($_POST['text_3']))."' WHERE `id`=3");
$sub=mysqli_query($link,"SELECT `id` FROM `subcontinut` WHERE `id_continut`=3");
while ($row_sub=mysqli_fetch_assoc($sub)) {
	$idsub=$row_sub['id'];
	$titlu=$_POST['titlu_sub_'.$idsub];
	$text=$_POST['text_sub_'.$idsub];
	mysqli_query($link,"UPDATE `subcontinut` SET `titlu`='".mysqli_real_escape_string($link,trim($titlu))."', `text`='".mysqli_real_escape_string($link,trim($text))."' WHERE `id`=".$idsub);
}
unset($idsub);

mysqli_query($link,"UPDATE `continut` SET `titlu`='".mysqli_real_escape_string($link,trim($_POST['titlu_4']))."', `text`='".mysqli_real_escape_string($link,trim($_POST['text_4']))."' WHERE `id`=4");
$sub=mysqli_query($link,"SELECT `id` FROM `subcontinut` WHERE `id_continut`=4");
while ($row_sub=mysqli_fetch_assoc($sub)) {
	$idsub=$row_sub['id'];
	$titlu=$_POST['titlu_sub_'.$idsub];
	$text=$_POST['text_sub_'.$idsub];
	mysqli_query($link,"UPDATE `subcontinut` SET `titlu`='".mysqli_real_escape_string($link,trim($titlu))."', `text`='".mysqli_real_escape_string($link,trim($text))."' WHERE `id`=".$idsub);
}

//header ("Location:home-page.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Testarii CRM | <?php echo $pagetitle;?> </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
	<link href="css/plugins/jQueryUI/jquery-ui.css" rel="stylesheet">
    <link href="js/plugins/Multiple-Dates-Picker-for-jQuery-UI-latest/jquery-ui.multidatespicker.css" rel="stylesheet">
	<link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
<?php include("include.user.php");?>
                    <div class="logo-element">
                        AT+
                    </div>
                </li>
<?php include("include.mainmenu2.php");?>
            </ul>
        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <!--form role="search" class="navbar-form-custom" action="search_results.php">
                <div class="form-group">
                    <input type="text" placeholder="Cautare ..." class="form-control" name="top-search" id="top-search">
                </div>
            </form-->
        </div>
<?php include ("include.panoucontrol.php")?>
        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2><?php echo $pagetitle;?></h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Home</a></li>
                        <li class="active"><strong><?php echo $row["nume"];?></strong></li>
                    </ol>
                </div>
            </div>
<!-- Main content -->
<section class="wrapper wrapper-content">

	<div class="ibox">
		<div class="ibox-title">
			<h5>Sectiunea "Banere prima pagina"<small></small></h5>
			<a class="btn btn-warning pull-right buton" href="modifica_slider.php">Adauga banner nou</a>
		</div>
		<div class="ibox-content">	
			<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
			<th>ID</th>
			<th>Data</th>
			<th>Titlu</th>
			<th>Imagine</th>
			<th class="text-center">Activ</th>
			<th class="text-center">Sterge</th>
			</tr>
			</thead>
			<tbody>
			<? $list=mysqli_query($link,"SELECT * FROM `slider` ORDER BY `created` DESC");
			while ($r_list = mysqli_fetch_array($list)) { ?>
			<tr>
			<td><?php echo $r_list['id'];?></td>
			<td><?php echo date("F d, Y",strtotime($r_list["created"]));?></td>
			<td><a href="modifica_slider.php?id=<?php echo $r_list['id'];?>"><?php echo $r_list['title'];?></a></td>
			<td>
			<? if ($r_list['image']=="") {?> <img src="../images/nopicture.gif" width="200px" /> 
			<?} else {?>
			<img src="../images/slider/<?php echo $r_list['image'];?>" width="200px" /> 
			<? } ?></td>
			<td class="text-center">
			<form action="" method="GET">
			<input type="checkbox" <?php if ($r_list['active']) {echo "checked";}?> name="activ" onChange="this.form.submit()" />
			<input type="hidden" name="stare" value="<?php echo $r_list['id'];?>" />
			<input type="hidden" name="value" value="<?php echo $r_list['active'];?>" />
			<input type="hidden" name="id" value="<?php echo $r_list['id'];?>" />
			</form>
			</td>
			<td class="text-center">
			<form action="" method="GET">
			<button class="btn btn-danger btn-xs" onClick="confirmDelete()" type="submit" />Sterge</button>
			<input type="hidden" name="sterge" value="<?php echo $r_list['id'];?>" />
			</form>
			</td>
			</tr>
			<? } ?>
			</tbody>
			</table>
		</div>
	</div>

<form id="form" method="post" class="form-horizontal" action="" enctype="multipart/form-data">	
	<div class="ibox">
		<div class="ibox-title">
			<h5>Sectiunea "<?php echo $row["titlu"];?>"<small></small></h5>
		</div>
		<div class="ibox-content">	
			<div class="form-group">
				<label class="col-sm-2 control-label">Titlu:<br /><small>Apare ca titul H1</small></label>
				<div class="col-sm-10">
					<input value="<?php echo $row["titlu"];?>" name="titlu_1" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Continut:<br /><small>poate fi formatat</small></label>
				<div class="col-sm-10">
				<textarea id="text1" name="text_1" class="summernote">
					<?php echo $row["text"];?>
				</textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="ibox">
		<div class="ibox-title">
			<h5>Sectiunea "Activitatea noastra in cifre" <small></small></h5>
		</div>
<?php 
$sql_activitate=mysqli_query($link,"SELECT * FROM `activitate` WHERE `id`=1");
$row_activitate=mysqli_fetch_assoc($sql_activitate);
?>		
		<div class="ibox-content">
			<div class="form-group">
				<div class="col-sm-3">
					<label class="control-label">Numar Followers:</label>
					<input value="<?php echo $row_activitate['folowers'];?>" name="followers" type="number" class="form-control" required>
				</div>
				<div class="col-sm-3">
				<label class="control-label">Numar Cursuri:</label>
					<input value="<?php echo $row_activitate['cursuri'];?>" name="cursuri" type="number" class="form-control" required>
				</div>
				<div class="col-sm-3">
				<label class="control-label">Numar Absolventi:</label>
					<input value="<?php echo $row_activitate['absolventi'];?>" name="absolventi" type="number" class="form-control" required>
				</div>
				<div class="col-sm-3">
				<label class="control-label">Numar Recomandari:</label>
					<input value="<?php echo $row_activitate['recomandari'];?>" name="recomandari" type="number" class="form-control" required>
				</div>
			</div>
		</div>
	</div>
	<div class="ibox">
		<?php 
			$sql3=mysqli_query($link,"SELECT * FROM `continut` WHERE `id`=3");
			$row3=mysqli_fetch_array($sql3);
		?>		
		<div class="ibox-title">
			<h5>Sectiunea "<?php echo $row3["titlu"];?>" <small></small></h5>
		</div>
		<div class="ibox-content">	
			<div class="form-group">
				<label class="col-sm-2 control-label">Titlu:<br /><small>Apare ca titul H2</small></label>
				<div class="col-sm-10">
					<input value="<?php echo $row3["titlu"];?>" name="titlu_3" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Continut:<br /><small>poate fi formatat</small></label>
				<div class="col-sm-10">
				<textarea id="text2" name="text_3" class="summernote">
					<?php echo $row3["text"];?>
				</textarea>
				</div>
			</div>
		<?php 	$sql_sub="SELECT * FROM `subcontinut` WHERE `id_continut`=3";
				$query_sub=mysqli_query($link,$sql_sub);
				if (mysqli_num_rows($query_sub)>0) {
				echo '<div class="ibox-title"><h5>Sub-continut "'.$row3["titlu"].'" <small>Componente casete homepage</small></h5></div><div class="row"><br />';	
				$i=3;
				while ($row_sub=mysqli_fetch_assoc($query_sub)) {
		?>
		<div class="col-md-4">
			<div class="form-group">
				<label class="col-sm-2 control-label">Titlu:<br /><small>Apare ca titul H2</small></label>
				<div class="col-sm-10">
					<input value="<?php echo $row_sub["titlu"];?>" name="titlu_sub_<?php echo $row_sub["id"];?>" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Continut:<br /><small>poate fi formatat</small></label>
				<div class="col-sm-10">
				<textarea id="text<?php echo $i;?>" name="text_sub_<?php echo $row_sub["id"];?>" class="summernote">
					<?php echo $row_sub["text"];?>
				</textarea>
				</div>
			</div>
		</div>
		<?php $i++;} } ?>	
		</div>
		</div>
	</div>
	<div class="ibox">
		<div class="ibox-title">
			<h5>Sectiunea "Ce spun absolventii"<small></small></h5>
			<a class="btn btn-warning pull-right buton" href="testimonial.php">Adauga testimonial</a>
		</div>
		<div class="ibox-content">	
			<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
			<th>ID</th>
			<th>Data</th>
			<th>Nume</th>
			<th>Testimonial</th>
			<th class="text-center">Activ</th>
			<th class="text-center">Sterge</th>
			</tr>
			</thead>
			<tbody>
			<? $list=mysqli_query($link,"SELECT * FROM `testimoniale` ORDER BY `created` DESC");
			while ($r_list = mysqli_fetch_array($list)) { ?>
			<tr>
			<td><?php echo $r_list['id'];?></td>
			<td><?php echo date("F d, Y",strtotime($r_list["created"]));?></td>
			<td><a href="testimonial.php?id=<?php echo $r_list['id'];?>"><?php echo $r_list['nume'];?></a></td>
			<td><?php echo $r_list['testimonial'];?></td>
			<td class="text-center">
			<form action="" method="GET">
			<input type="checkbox" <?php if ($r_list['active']) {echo "checked";}?> name="activ" onChange="this.form.submit()" />
			<input type="hidden" name="staret" value="<?php echo $r_list['id'];?>" />
			<input type="hidden" name="valuet" value="<?php echo $r_list['active'];?>" />
			<input type="hidden" name="idt" value="<?php echo $r_list['id'];?>" />
			</form>
			</td>
			<td class="text-center">
			<form action="" method="GET">
			<button class="btn btn-danger btn-xs" onClick="confirmDelete()" type="submit" />Sterge</button>
			<input type="hidden" name="sterget" value="<?php echo $r_list['id'];?>" />
			</form>
			</td>
			</tr>
			<? } ?>
			</tbody>
			</table>
		</div>
	</div>
	<div class="ibox">
		<?php 
			$sql3=mysqli_query($link,"SELECT * FROM `continut` WHERE `id`=4");
			$row3=mysqli_fetch_array($sql3);
		?>		
		<div class="ibox-title">
			<h5>Sectiunea "<?php echo $row3["titlu"];?>" <small></small></h5>
		</div>
		<div class="ibox-content">	
			<div class="form-group">
				<label class="col-sm-2 control-label">Titlu:<br /><small>Apare ca titul H1</small></label>
				<div class="col-sm-10">
					<input value="<?php echo $row3["titlu"];?>" name="titlu_4" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Continut:<br /><small>poate fi formatat</small></label>
				<div class="col-sm-10">
				<textarea id="text6" name="text_4" class="summernote">
					<?php echo $row3["text"];?>
				</textarea>
				</div>
			</div>
		<?php 	$sql_sub="SELECT * FROM `subcontinut` WHERE `id_continut`=4";
				$query_sub=mysqli_query($link,$sql_sub);
				if (mysqli_num_rows($query_sub)>0) {
				echo '<div class="ibox-title"><h5>Sub-continut "'.$row3["titlu"].'" <small>Componente casete homepage</small></h5></div><div class="row"><br />';	
				$i=7;
				while ($row_sub=mysqli_fetch_assoc($query_sub)) {
		?>
		<div class="col-md-4">
			<div class="form-group">
				<label class="col-sm-2 control-label">Titlu:<br /><small>Apare ca titul H1</small></label>
				<div class="col-sm-10">
					<input value="<?php echo $row_sub["titlu"];?>" name="titlu_sub_<?php echo $row_sub["id"];?>" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Continut:<br /><small>poate fi formatat</small></label>
				<div class="col-sm-10">
				<textarea id="text<?php echo $i;?>" name="text_sub_<?php echo $row_sub["id"];?>" class="summernote">
					<?php echo $row_sub["text"];?>
				</textarea>
				</div>
			</div>
		</div>
		<?php $i++;} } ?>	
	
		</div>
		</div>
	</div>
	<div class="ibox">
		<div class="ibox-content">
		<div class="form-group">
			<div class="col-sm-12">
			<center><button class="btn btn-warning" type="submit" name="salveaza_homepage">Salveaza</button></center>
			</div>
		</div>
		</div>
	</div>
</form>
<br /><br /><br />
</section>
<!-- /.content -->
<div class="footer">
<?php include("include.footer.php");?>
</div>
</div>
</div>
    <!-- Main scripts -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
	<!-- CK Editor 4 -->
	<script src="js/plugins/ckeditor/ckeditor.js"></script>
	<script>
	  $(function () {
		// Replace the <textareas> with a CKEditor instance.
		CKEDITOR.replace('text1'),
		CKEDITOR.replace('text2'),
		CKEDITOR.replace('text3'),
		CKEDITOR.replace('text4'),
		CKEDITOR.replace('text5'),
		CKEDITOR.replace('text6'),
		CKEDITOR.replace('text7'),
		CKEDITOR.replace('text8'),
		CKEDITOR.replace('text9'),
		CKEDITOR.replace('text10'),
		CKEDITOR.replace('text11'),
		CKEDITOR.replace('text12'),
		CKEDITOR.replace('text13')
		})
	</script>
    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>
</body>
</html>