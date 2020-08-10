<?php 
include("../__connect.php");
$page = "testimonial";
$today = getdate();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
$id=$_GET['id'];	
$sql=mysqli_query($link,"SELECT * FROM `testimoniale` WHERE `id`=".$id);
	if (mysqli_num_rows($sql)>0) {
		// edit
		$row=mysqli_fetch_array($sql);
		$submit="edit";
		$pagetitle="Modifica";
	} else {
		header ("Location: testimoniale.php");
	}
$new=FALSE;
} else { 
// add
$new=TRUE;
$submit="addnew";
$pagetitle="Addauga";
}

/* Edit */
if (isset($_POST['edit'])) {
mysqli_query($link,"UPDATE `testimoniale` SET 
`nume`='".$_POST['nume']."',
`pozitie`='".$_POST['pozitie']."',
`testimonial`='".trim(mysqli_real_escape_string($link,$_POST['testimonial']))."',
`curs`='".$_POST['curs']."'
WHERE `id`=".$_POST['id2update']);
header ("Location: testimoniale.php");
}

/* Add new */
if (isset($_POST['addnew'])) {
mysqli_query($link,"INSERT INTO `testimoniale` (`nume`,`pozitie`,`testimonial`,`curs`) 
VALUES 
('".$_POST['nume']."','".$_POST['pozitie']."','".trim(mysqli_real_escape_string($link,$_POST['testimonial']))."','".$_POST['curs']."')");
$last_id = mysqli_insert_id($link);
header ("Location: testimoniale.php");
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia Testarii CRM | <?php echo $pagetitle;?> testimonial</title>

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
                    <h2><?php echo $pagetitle;?> testimonial</h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Home</a></li>
                        <li class="active"><a href="testimoniale.php"><strong>Testimonial</strong></a></li>
                    </ol>
                </div>
                <div class="col-sm-4">
					<div class="title-action">
						<a class="btn btn-primary" href="testimonial.php">Adauga testimonial</a>
					</div>
				</div>
            </div>

		<!-- Main content -->
		<section class="wrapper wrapper-content">
		
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5><?php echo $pagetitle;?> testimonial<small></small></h5>
				</div>
				<div class="ibox-content">	
				
				<form id="form" method="post" class="form-horizontal" action="">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nume:<br /></label>
						<div class="col-sm-10">
							<input value="<?php echo $row["nume"];?>" name="nume" type="text" class="form-control" required>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Pozitie:<br /><small>pozitia, titulatura</small></label>
						<div class="col-sm-10">
							<input value="<?php echo $row["pozitie"];?>" name="pozitie" type="text" class="form-control" required>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Testimonial:<br /></label>
						<div class="col-sm-10">
						<textarea id="text1" name="testimonial" class="summernote">
							<?php echo $row["testimonial"];?>
                        </textarea>
						</div>
					</div>
				<div class="hr-line-dashed"></div>
				<div class="form-group">
						<label class="col-sm-2 control-label">Curs:</label>
						<div class="col-sm-10">
						<select class="select2 form-control" name="curs">
							<option>-- Alege --</option>
						<?php 	$sql_curs=mysqli_query($link,"SELECT * FROM `curs_main`");
								while ($row_curs=mysqli_fetch_assoc($sql_curs)) { 
								$sql_exista=mysqli_query($link,"SELECT * FROM `testimoniale` WHERE `curs`=".$row_curs['id_curs_main']." AND `id`=".$id);
								if (mysqli_num_rows($sql_exista)==1){$selected="selected";}
						?>
							<option value="<?php echo $row_curs['id_curs_main'];?>" <?php echo $selected;?>><?php echo $row_curs['titlu_main'];?></option>
						<?php $selected=""; } ?>
						</select>
						</div>
					</div>
				<div class="hr-line-dashed"></div>
				
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
					<input type="hidden" name="id2update" value="<?php echo $row['id'];?>" />
						<button class="btn btn-white" type="reset">Reseteaza</button>
						<button class="btn btn-primary" type="submit" name="<?php echo $submit;?>">Salveaza</button>
					</div>
				</div>
				
				</form>	
			
				</div>
			</div>
<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
?>
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

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>
<!-- CK Editor 4 -->
<script src="js/plugins/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textareas> with a CKEditor instance.
    CKEDITOR.replace('text1'),
    CKEDITOR.replace('text2'),
    CKEDITOR.replace('text3'),
    CKEDITOR.replace('text4')
	})
</script>

</body>

</html>