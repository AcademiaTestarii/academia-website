<?php 
include("../__connect.php");
$today = getdate();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
$id=$_GET['id'];	
$sql=mysqli_query($link,"SELECT * FROM `continut` WHERE `id`=".$id);
	if (mysqli_num_rows($sql)>0) {
		// edit
		$row=mysqli_fetch_array($sql);
		$submit="edit";
		$pagetitle="Modificare continut: ";
	} else {
		header ("Location: dashboard.php");
	}
$new=FALSE;
} else { 
header ("Location: dashboard.php");
}

/* Edit */
if (isset($_POST['edit'])) {
mysqli_query($link,"UPDATE `continut` SET 
`titlu`='".$_POST['titlu']."',
`text`='".trim(mysqli_real_escape_string($link,$_POST['text']))."'
WHERE `id`=".$_POST['id2update']);

foreach ($_POST as $key=>$value) {
	if (substr($key, 0, 10)=="titlu_sub_") {
		$id_sub=substr($key, 10, 15);
		mysqli_query($link,"UPDATE `subcontinut` SET 
		`titlu`='".trim($value)."'
		WHERE `id`=".$id_sub);
	}
	
	if (substr($key, 0, 9)=="text_sub_") {
		$id_sub2=substr($key, 9, 15);
		mysqli_query($link,"UPDATE `subcontinut` SET 
		`text`='".trim(mysqli_real_escape_string($link,$value))."'
		WHERE `id`=".$id_sub2);		
	}
	
}

header ("Location: continut.php?id=".$id);
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
            <form role="search" class="navbar-form-custom" action="search_results.php">
                <div class="form-group">
                    <input type="text" placeholder="Cautare ..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
<?php include ("include.panoucontrol.php")?>
        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2><?php echo $pagetitle;?> "<?php echo $row["nume"];?>"</h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Home</a></li>
                        <li class="active"><a href="adauga.php"><strong><?php echo $row["nume"];?></strong></a></li>
                    </ol>
                </div>
                <!--div class="col-sm-4">
					<div class="title-action">
						<a class="btn btn-primary" href="adauga.php">Adauga</a>
					</div>
				</div-->
            </div>

		<!-- Main content -->
		<section class="wrapper wrapper-content">
		
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5><?php echo $pagetitle;?> "<?php echo $row["nume"];?>"<small></small></h5>
				</div>
				<div class="ibox-content">	
				
				<form id="form" method="post" class="form-horizontal" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Titlu:<br /><small>Apare ca titul H1</small></label>
						<div class="col-sm-10">
							<input value="<?php echo $row["titlu"];?>" name="titlu" type="text" class="form-control" required>
						</div>
					</div>
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Continut:<br /><small>poate fi formatat</small></label>
						<div class="col-sm-10">
						<textarea id="text1" name="text" class="summernote">
							<?php echo $row["text"];?>
                        </textarea>
						</div>
					</div>
				<div class="hr-line-dashed"></div>
				
				<?php 	$sql_sub="SELECT * FROM `subcontinut` WHERE `id_continut`=".$id;
						$query_sub=mysqli_query($link,$sql_sub);
						if (mysqli_num_rows($query_sub)>0) {
						echo '<div class="ibox-title"><h5>Sub-continut <small>Componente casete homepage</small></h5></div>';	
						$i=2;
						while ($row_sub=mysqli_fetch_assoc($query_sub)) {
				?>
				
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
				<div class="hr-line-dashed"></div>
				
				<?php $i++;} } ?>
				
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
    CKEDITOR.replace('text4')
	})
</script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>



</body>
</html>