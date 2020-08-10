<?php 
include("../__connect.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
$id=$_GET['id'];	
$sql=mysqli_query($link,"SELECT * FROM `slider` WHERE `id`=".$id);
	if (mysqli_num_rows($sql)>0) {
		// edit
		$row=mysqli_fetch_array($sql);
		$submit="edit";
		$pagetitle="Editeaza banner";
	} else {
		header ("Location: home-page.php");
	}
$new=FALSE;
} else { 
// add
$new=TRUE;
$submit="addnew";
$pagetitle="Addauga banner";
}

/* Remove image */
if (isset($_GET['removeimage'])) {
$removeimage = $_GET['removeimage'];
$picsql = mysqli_query($link,"SELECT * FROM `slider` WHERE `id`=".$removeimage);
$pic=mysqli_fetch_array($picsql);
unlink(dirname( __FILE__ )."/../images/slider/".$pic['image']);
mysqli_query($link,"UPDATE `slider` SET `image`=NULL WHERE `id`=".$removeimage);
header ("Location: modifica_slider.php?id=".$pic['id']);
}

/* Edit */
if (isset($_POST['edit'])) {
if (isset($_POST['active'])) { $active=1;} else {$active=0;}
mysqli_query($link,"UPDATE `slider` SET 
`active`=".$active.",
`title`='".$_POST['title']."',
`description1`='".$_POST['description1']."',
`description2`='".$_POST['description2']."',
`link`='".$_POST['link']."',
`buton`='".$_POST['buton']."'
WHERE `id`=".$_POST['id2update']);

if ($_FILES['image']!="") {
include('class.upload/class.upload.php');
    $handle = new upload($_FILES['image']);
    if ($handle->uploaded) {
        $handle->image_resize			= true;
		$handle->image_x				= 1920;
		$handle->image_ratio_y			= true;
		// path
        $handle->process(dirname( __FILE__ )."/../images/slider/");
        $img_name = $handle->file_dst_name;
        if ($handle->processed) {
		mysqli_query($link,"UPDATE `slider` SET `image`='".$img_name."' WHERE `id`=".$_POST['id2update']);
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
header ("Location: modifica_slider.php?id=".$_POST['id2update']);
}

/* Add new */
if (isset($_POST['addnew'])) {
if (isset($_POST['active'])) { $active=1;} else {$active=0;}
mysqli_query($link,"INSERT INTO `slider` 
(`active`,`title`,`description1`,`description2`,`link`,`buton`)
VALUES
(".$active.",'".$_POST['title']."','".$_POST['description1']."','".$_POST['description2']."','".$_POST['link']."','".$_POST['buton']."')
");
$last_id = mysqli_insert_id($link);

if ($_FILES['image']!="") {
include('class.upload/class.upload.php');
    $handle = new upload($_FILES['image']);
    if ($handle->uploaded) {
        $handle->image_resize			= true;
		$handle->image_x				= 1920;
		$handle->image_ratio_y			= true;
		// path
        $handle->process(dirname( __FILE__ )."/../images/slider/");
        $img_name = $handle->file_dst_name;
        if ($handle->processed) {
		mysqli_query($link,"UPDATE `slider` SET `image`='".$img_name."' WHERE `id`=".$last_id);
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
header ("Location: home-page.php");
}
$page = "slider";
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia testarii CRM | Bannere</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

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
    <div class="col-lg-6">
        <h2>Bannere</h2>
        <ol class="breadcrumb">
            <li>
                <a href="dashboard.php">Home</a>
            </li>
            <li class="active">
                <a href="slider.php"><strong>Bannere</strong></a>
            </li>
        </ol>
    </div>
	<div class="col-sm-6">
		<div class="title-action">
			<a class="btn btn-primary" href="modifica_slider.php">Adauga banner nou</a>
		</div>
    </div>
</div>

    <!-- Main content -->
    <section class="wrapper wrapper-content">
	
	
	<div class="ibox">
		<div class="ibox-title">
				<h5>Adaugare banner prima pagina <small></small></h5>
		</div>
		<div class="ibox-content">
		
		<form role="form" action="" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
              <!-- general form elements -->
              <div class="box">
                  <div class="box-body">
				    <div class="checkbox">
                      <label>
                        <input name="active" type="checkbox" <? if (($row["active"])==1) {echo"checked";}?> /> Activ
                      </label>
                    </div>
					<div class="form-group">
                      <label>Prima linie</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $row["title"];?>" placeholder="Titlu" />
                    </div>
					<div class="form-group">
                      <label>A doua linie</label>
                      <input type="text" class="form-control" name="description1" value="<?php echo $row["description1"];?>" placeholder="Descriere principala" />
                    </div>
					<div class="form-group">
                      <label>Descriere secundara lunga</label>
                      <input type="text" class="form-control" name="description2" value="<?php echo $row["description2"];?>" placeholder="Descriere secundara" />
                    </div>	
					<div class="form-group">
                      <label>Text buton</label>
                      <input type="text" class="form-control" name="buton" value="<?php echo $row["buton"];?>" placeholder="Enter ..." />
                    </div>	
					<div class="form-group">
                      <label>Link <small>(copiaza link din browser, trebuie sa aiba "http://" in fata)</small></label>
                      <input type="text" class="form-control" name="link" value="<?php echo $row["link"];?>" placeholder="Enter ..." />
                    </div>
					<div class="form-group">
					<? if ($row["image"]!="") { ?>
                      <p class="help-block"><img style="width:50%;" src="../images/slider/<?php echo $row['image'];?>" /></p>
						<a class="btn btn-primary btn-sm" href="modifica_slider.php?removeimage=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-trash"></i> &nbsp Sterge imagine</a>
					<? } else {?>
					<label for="image">Imagine <small>(va fi redimensionata automat, latimea minima: 1920px)</small></label><br />
						<div class="inputBtnSection">
						<input id="uploadFile" class="disableInputField" placeholder="Selecteaza o imagine" disabled="disabled" />
						<label class="fileUpload">
							<input id="image" name="image" type="file" class="upload" />
						</label>
						</div>
						
					<? } ?>
                    </div>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->	
			</div>
			<div class="col-md-12">
			<div class="box-footer">
				<input type="hidden" name="id2update" value="<?php echo $row['id'];?>" />
				<button type="submit" name="<?php echo $submit;?>" class="btn btn-block btn-primary"><i class="fa fa-save"></i> Salveaza</button>
			</div>
			</div>
			</div>
		</form>
		
		</div>
	</div>
      
    </section><!-- /.container-frluid -->

<div class="footer">
<?php include("include.footer.php");?>
</div>

</div>
</div>

<!-- Mainly scripts -->
<script src="js/plugins/fullcalendar/moment.min.js"></script>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI custom -->
<script src="js/jquery-ui.custom.min.js"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>

</body>

</html>
