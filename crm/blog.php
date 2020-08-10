<?php include("../__connect.php");
$id="";
$row_meniu="";
$pagetitle="Blog";
// stare 
if (isset($_GET['stare']) AND is_numeric($_GET['stare'])) {
	if ($_GET['value']==1){
	$sql_update_stare=mysqli_query($link,"UPDATE `noutati` SET `active`=0 WHERE `id_noutate`=".$_GET['id']);
	} else {
	$sql_update_stare=mysqli_query($link,"UPDATE `noutati` SET `active`=1 WHERE `id_noutate`=".$_GET['id']);	
	}
header ("Location:blog.php");
}
// sterge 
if (isset($_GET['sterge']) AND is_numeric($_GET['sterge'])) {
	$sql_sterge=mysqli_query($link,"DELETE FROM `noutati` WHERE `id_noutate`=".$_GET['sterge']);
header ("Location:blog.php");
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
	<script>
	function confirmDelete(delUrl) {
  		if (confirm("Esti sigur ca vrei sa stergi?")) {
		document.location = delUrl;
		}
	}
	</script>
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
                        <li class="active"><a href="blog.php"><strong><?php echo $pagetitle;?></strong></a></li>
                    </ol>
                </div>
                <div class="col-sm-4">
					<div class="title-action">
						<a class="btn btn-primary" href="adauga_blog.php">Adauga</a>
					</div>
				</div>
            </div>

    <!-- Main content -->
    <section class="content container-fluid">

          <div class="ibox float-e-margins">
				<div class="ibox-content">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titlu</th>
                  <th>Data</th>
                  <th class="text-center">Activ</th>
                  <th class="text-center">Sterge</th>
                </tr>
                </thead>
                <tbody>
				<?php 
					$sql_produse="SELECT * FROM `noutati` ORDER BY `adaugat` DESC";
					$query_produse=mysqli_query($link,$sql_produse);
					while ($row_produse=mysqli_fetch_array($query_produse)) {
				?>
                <tr>
                  <td><a href="modifica_blog.php?id=<?php echo $row_produse['id_noutate'];?>"><?php echo $row_produse['titlu'];?></a></td>
                  <td><?php echo $row_produse['data_articol'];?></td>
                  <td class="text-center">
				  <form action="" method="GET">
					<input type="checkbox" <?php if ($row_produse['active']) {echo "checked";}?> name="activ" onChange="this.form.submit()" />
					<input type="hidden" name="stare" value="<?php echo $row_produse['id_noutate'];?>" />
					<input type="hidden" name="value" value="<?php echo $row_produse['active'];?>" />
					<input type="hidden" name="id" value="<?php echo $row_produse['id_noutate'];?>" />
				  </form>
				  </td>
                  <td class="text-center">
				  <form action="" method="GET">
					<button class="btn btn-danger btn-xs" onClick="confirmDelete()" type="submit" />Sterge</button>
					<input type="hidden" name="sterge" value="<?php echo $row_produse['id_noutate'];?>" />
				  </form>
				  </td>
                </tr>
				<?php } ?>
                
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

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
<!-- DataTables -->
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script>
  $(function () {
		$('#example1').DataTable( {
		"order": [[ 1, "desc" ]]
		} );
  });
</script>

</body>
</html>