<?php 
include("../__connect.php");
$page = "cursuri";
$today = date("Y-m-d");
$querystatus="";
// stare 
if (isset($_GET['stare']) AND is_numeric($_GET['stare'])) {
	if ($_GET['value']==1){
	$sql_update_stare=mysqli_query($link,"UPDATE `cursuri` SET `activ`=0 WHERE `id`=".$_GET['id']);
	} else {
	$sql_update_stare=mysqli_query($link,"UPDATE `cursuri` SET `activ`=1 WHERE `id`=".$_GET['id']);	
	}
header ("Location:cursuri.php");
}
// sterge 
if (isset($_GET['sterge']) AND is_numeric($_GET['sterge'])) {
	$sql_sterge=mysqli_query($link,"DELETE FROM `cursuri` WHERE `id`=".$_GET['sterge']);
header ("Location:cursuri.php");
}
// filtru curs
if (isset($_GET['curs']) AND is_numeric($_GET['curs'])) {
	if ($_GET['curs']!="0") { 
		$querycurs=" AND `id_curs_main`=".$_GET['curs'];
	} else {
		$querycurs="";
	}
} else {
		$querycurs="";
}
// filtru data
$querydata="AND `start_inscriere` > '2020-01-01' AND `end_inscriere` < '2020-12-31'";
if (isset($_GET['start']) AND isset($_GET['end'])) {
	$querydata="AND `start_inscriere` > STR_TO_DATE('".$_GET['start']."','%m/%d/%Y') AND `end_inscriere` < STR_TO_DATE('".$_GET['end']."','%m/%d/%Y')";
} else {
	//$querydata="AND `start_inscriere` > '2020-01-01' AND `end_inscriere` < '2020-12-31'";
}

if (isset($_GET['status']) AND isset($_GET['status'])) {
	if ($_GET['status']==1) {
		$querystatus="";
	} elseif ($_GET['status']==2) {
		$querystatus="AND `start_inscriere`>NOW()";		
	} elseif ($_GET['status']==3) {
		$querystatus="AND `start_inscriere`<NOW()";		
	} else {
		$querystatus="";		
	}
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia Testarii CRM | Cursuri <? echo date("Y");?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
	<link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
	<link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
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
        </div>
<?php include ("include.panoucontrol.php")?>
        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Cursuri <? echo date("Y");?></h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Home</a></li>
                        <li class="active"><strong>Cursuri <? echo date("Y");?></strong></li>
                    </ol>
                </div>
                <div class="col-sm-4">
				<div class="title-action">
					<a class="btn btn-primary" href="adauga_curs.php">Adauga curs nou</a>
				</div>
				</div>
            </div>

    <!-- Main content -->
    <section class="content container-fluid">

          <div class="ibox float-e-margins">
			<div class="ibox-content">
				<div class="row">
<form method="GET" action="<?php echo "https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];?>">				
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label" for="curs">Curs</label>
							<select name="curs" id="curs" class="form-control">
							<option value="0">-- Toate --</option>
<?php 
$sql_main_select="SELECT * FROM `curs_main` ORDER BY `order` ASC";
$query_main_select=mysqli_query($link,$sql_main_select);
while ($row_main_select=mysqli_fetch_assoc($query_main_select)) { ?>
								<option value="<?php echo $row_main_select['id_curs_main'];?>" <?php echo (isset($_GET['curs']) && $_GET['curs']==$row_main_select['id_curs_main']?"selected=\"\"":""); ?>><?php echo $row_main_select['titlu_main'];?></option>
<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group" id="data_5">
							<label class="control-label">Data</label>
							<div class="input-daterange input-group" id="datepicker">
								<input type="text" class="input-sm form-control" name="start" value="<?php echo (isset($_GET['start']) ? $_GET['start'] : "01/01/2020");?>">
								<span class="input-group-addon">pana la</span>
								<input type="text" class="input-sm form-control" name="end" value="<?php echo (isset($_GET['end']) ? $_GET['end'] : "12/31/2020");?>">
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label" for="status">Status</label>
							<select name="status" id="status" class="form-control">
								<option value="1" <?php echo (isset($_GET['status']) && $_GET['status']==1?"selected=\"\"":""); ?>>-- Toate --</option>
								<option value="2"<?php echo (isset($_GET['status']) && $_GET['status']==2?"selected=\"\"":""); ?>>Active</option>
								<option value="3"<?php echo (isset($_GET['status']) && $_GET['status']==3?"selected=\"\"":""); ?>>Finalizate</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label" for="filtreaza">&nbsp;</label>
							<button class="form-control btn btn-primary" type="submit" name="filtreaza">Filtreaza</button>
						</div>
					</div>	
</form>					
					</div>					

			
			<div class="table-responsive">
              <table id="cursuri" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Titlu</th>
                  <th>Start</th>
                  <th>End</th>
                  <th class="text-center">Cursanti/locuri</th>
                  <th class="text-center">Desfasurare</th>
                  <th class="text-center"></th>
                  <th class="text-center"></th>
                  <th class="text-center"></th>
                  <th class="text-center"></th>
                </tr>
                </thead>
                <tbody>
<?php 
$sql_main="SELECT * FROM `curs_main` WHERE 1=1 ".$querycurs." ORDER BY `order` ASC";
$query_main=mysqli_query($link,$sql_main);
while ($row_main=mysqli_fetch_assoc($query_main)) { ?>

<tr class="group"><td colspan="10"><strong><?php echo $row_main['titlu_main'];?></strong></td></tr>

<?php 
$sql="SELECT * FROM `cursuri` LEFT JOIN `curs_main` ON `cursuri`.`parent`=`curs_main`.id_curs_main WHERE `cursuri`.`parent`=".$row_main['id_curs_main']." ".$querydata." ".$querystatus." ORDER BY `cursuri`.`start_inscriere` ASC";
$query=mysqli_query($link,$sql);

while ($row=mysqli_fetch_assoc($query)) {
	if ($row['start_inscriere']!="0000-00-00" && $row['start_inscriere'] < $today) {$class="class=\"warning\"";$vechi=true;} else {$class="";$vechi=false;}
	$sql_cursanti=mysqli_query($link,"SELECT COUNT(`id`) AS `cursanti` FROM `cursant_curs` WHERE `id_curs`=".$row['id']);
	$inscrisi=mysqli_fetch_assoc($sql_cursanti);
	$datesSql=mysqli_query($link,"SELECT MIN(`data`) AS `start`, MAX(`data`) AS `end` FROM `date_cursuri` WHERE `id_curs`=".$row['id']);
	$datesRow=mysqli_fetch_assoc($datesSql);
	
?>
                <tr <?php echo $class;?>>
                  <td><?php echo $row['id'];?></td>
                  <td><strong><?php echo $row['titlu'];?> <?php echo $row['weekend']==1 ? "(Weekend)" : "";?></strong></td>
                  <td><?php if ($datesRow['start']=="0000-00-00" OR $datesRow['start']==NULL) {echo "TBA";} else {echo strftime("%e %B, %Y", strtotime($datesRow['start']));}?></td>
                  <td><?php if ($datesRow['end']=="0000-00-00" OR $datesRow['end']==NULL) {echo "TBA";} else {echo strftime("%e %B, %Y", strtotime($datesRow['end']));}?></td>
                  <td class="text-center"><?php echo $inscrisi['cursanti'];?> / <?php echo $row['cursanti'];?></td>
                  <td class="text-center"><?php echo $row['bucuresti']==1 ? "On-line" : "Bucuresti";?></td>
                  <td class="text-center">
					<a class="btn btn-primary btn-xs" href="vizualizare_curs.php?id=<?php echo $row['id'];?>">Cursanti</a>
				  </td>
                  <td class="text-center">

					<a class="btn btn-info btn-xs" href="curs.php?id=<?php echo $row['id'];?>&id_main=<?php echo $row['id_curs_main'];?>">Editare</a>

				  </td>
                  <td class="text-center">
					<a class="btn btn-success btn-xs" href="curs.php?id=<?php echo $row['id'];?>&duplicat=1&id_main=<?php echo $row['id_curs_main'];?>">Duplicat</a>
				  </td>
                  <td class="text-center">

				  <form action="" method="GET">
					<button class="btn btn-danger btn-xs" onClick="confirmDelete()" type="submit" />Sterge</button>
					<input type="hidden" name="sterge" value="<?php echo $row['id'];?>" />
				  </form>

				  </td>
                </tr>
<?php } }?>
                
                </tbody>
              </table>
			</div>  
            </div><!-- /.box-body -->
          </div><!-- /.box -->

    </section>
    <!-- /.content -->

        <div class="footer">
<?php include("include.footer.php");?>
        </div>

        </div>
        </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Data picker -->
	<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>	
    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="js/plugins/fullcalendar/moment.min.js"></script>
    <!-- Date range picker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script>
	$(document).ready(function(){	
		$('#data_5 .input-daterange').datepicker({
			keyboardNavigation: false,
			forceParse: false,
			autoclose: true
		});
	});
	</script>
</body>

</html>