<?php 
include("../__connect.php");
$page = "trainer";
$today = getdate();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
$id=$_GET['id'];	
$sql=mysqli_query($link,"SELECT * FROM `trainer` WHERE `id`=".$id);
	if (mysqli_num_rows($sql)>0) {
		// edit
		$row=mysqli_fetch_array($sql);
		$submit="edit";
		$pagetitle="Modifica";
	} else {
		header ("Location: traineri.php");
	}
$new=FALSE;
} else { 
// add
$new=TRUE;
$submit="addnew";
$pagetitle="Addauga";
}

/* Remove image */
if (isset($_GET['removeimage'])) {
$removeimage = $_GET['removeimage'];
$picsql = mysqli_query($link,"SELECT * FROM `trainer` WHERE `id`=".$removeimage);
$pic=mysqli_fetch_array($picsql);
unlink(dirname( __FILE__ )."/../images/traineri/".$pic['image']);
mysqli_query($link,"UPDATE `trainer` SET `poza`=NULL WHERE `id`=".$removeimage);
header ("Location: trainer.php?id=".$pic['id']);
}

/* Edit */
if (isset($_POST['edit'])) {
mysqli_query($link,"UPDATE `trainer` SET 
`nume`='".$_POST['nume']."',
`telefon`='".$_POST['telefon']."',
`email`='".$_POST['email']."',
`linkedin`='".$_POST['linkedin']."',
`titlu`='".$_POST['titlu']."',
`bio`='".trim(mysqli_real_escape_string($link,$_POST['bio']))."'
WHERE `id`=".$_POST['id2update']);

if ($_FILES['image']!="") {
include('class.upload/class.upload.php');
    $handle = new upload($_FILES['image']);
    if ($handle->uploaded) {
        $handle->image_resize			= true;
		$handle->image_x				= 350;
		$handle->image_ratio_y			= true;
		// path
        $handle->process(dirname( __FILE__ )."/../images/traineri/");
        $img_name = $handle->file_dst_name;
        if ($handle->processed) {
		mysqli_query($link,"UPDATE `trainer` SET `poza`='".$img_name."' WHERE `id`=".$_POST['id2update']);
		$handle->clean();
        } else {
			echo "Process Error: Something went wrong: ".$handle->error;
			$handle->clean();
        }
    } else {
		echo "File Error: Something went wrong: ".$handle->error;
		$handle->clean();
    }	
} // end image upload
header ("Location: traineri.php");
}

/* Add new */
if (isset($_POST['addnew'])) {
mysqli_query($link,"INSERT INTO `trainer` (`nume`,`telefon`,`email`,`linkedin`,`titlu`,`bio`) VALUES ('".$_POST['nume']."','".$_POST['telefon']."','".$_POST['email']."','".$_POST['linkedin']."','".$_POST['titlu']."','".trim(mysqli_real_escape_string($link,$_POST['bio']))."')");
$last_id = mysqli_insert_id($link);

if ($_FILES['image']!="") {
include('class.upload/class.upload.php');
    $handle = new upload($_FILES['image']);
    if ($handle->uploaded) {
        $handle->image_resize			= true;
		$handle->image_x				= 350;
		$handle->image_ratio_y			= true;
		// path
        $handle->process(dirname( __FILE__ )."/../images/traineri/");
        $img_name = $handle->file_dst_name;
        if ($handle->processed) {
		mysqli_query($link,"UPDATE `trainer` SET `poza`='".$img_name."' WHERE `id`=".$last_id);
		$handle->clean();
        } else {
			echo "Process Error: Something went wrong: ".$handle->error;
			$handle->clean();
        }
    } else {
		echo "File Error: Something went wrong: ".$handle->error;
		$handle->clean();
    }	
} // end image upload
header ("Location: traineri.php");
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia Testarii CRM | <?php echo $pagetitle;?> Trainer</title>

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
                    <h2><?php echo $pagetitle;?> Trainer</h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Home</a></li>
                        <li class="active"><a href="traineri.php"><strong>Traineri</strong></a></li>
                    </ol>
                </div>
                <div class="col-sm-4">
					<div class="title-action">
						<a class="btn btn-primary" href="trainer.php">Adauga trainer</a>
					</div>
				</div>
            </div>

		<!-- Main content -->
		<section class="wrapper wrapper-content">
		
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5><?php echo $pagetitle;?> trainer<small></small></h5>
				</div>
				<div class="ibox-content">	
				
				<form id="form" method="post" class="form-horizontal" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nume complet:<br /><small>Apare in meniu, in casete, etc</small></label>
						<div class="col-sm-10">
							<input value="<?php echo $row["nume"];?>" name="nume" type="text" class="form-control" required>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Pozitie/Titlu:<br /><small>pozitia, titulatura</small></label>
						<div class="col-sm-10">
							<input value="<?php echo $row["titlu"];?>" name="titlu" type="text" class="form-control" required>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					
					<div class="row">
					<div class="col-md-2"></div>
					<div class="form-group col-md-3">
						<label class="col-sm-2 control-label">Telefon:<br /></label>
						<div class="col-sm-10">
							<input value="<?php echo $row["telefon"];?>" name="telefon" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group col-md-3">
						<label class="col-sm-2 control-label">Email:<br /></label>
						<div class="col-sm-10">
							<input value="<?php echo $row["email"];?>" name="email" type="email" class="form-control">
						</div>
					</div>
					<div class="form-group col-md-3">
						<label class="col-sm-2 control-label">LinkedIN:<br /></label>
						<div class="col-sm-10">
							<input value="<?php echo $row["linkedin"];?>" name="linkedin" type="text" class="form-control">
						</div>
					</div>
					
					</div>
					
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Bio:<br /><small>informatii despre trainer</small></label>
						<div class="col-sm-10">
						<textarea id="text1" name="bio" class="summernote">
							<?php echo $row["bio"];?>
                        </textarea>
						</div>
					</div>
				<div class="hr-line-dashed"></div>
				
				<div class="form-group">
				<label class="col-sm-2 control-label">Poza trainer:</label>
				<div class="col-sm-10">
					<? if ($row["poza"]!="") { ?>
                      <p class="help-block"><img src="../images/traineri/<?php echo $row['poza'];?>" /></p>
						<a class="btn btn-primary btn-sm" href="trainer.php?removeimage=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-trash"></i> &nbsp Sterge poza</a>
					<? } else { ?>
					<label for="poza">Poza <small>(Latime: 350px, Inaltime: 462px)</small></label><br />
						<div class="inputBtnSection">
						<input id="uploadFile" class="disableInputField" placeholder="Selecteaza o imagine" disabled="disabled" />
						<label class="fileUpload">
							<input id="image" name="image" type="file" class="upload" />
						</label>
						</div>
					<? } ?>
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