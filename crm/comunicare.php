<?php 
include("../__connect.php");
$page = "cursuri";
$today = date("Y-m-d");
$emails="";
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
if (isset($_GET['curs_main']) AND is_numeric($_GET['curs_main'])) {

	$filtru=true;
	if ($_GET['curs_main']!="--") { 
		$querycurs="
		SELECT * FROM `cursant_curs`
		LEFT JOIN `cursanti` ON `cursanti`.`id`=`cursant_curs`.`id_cursant` 
		LEFT JOIN `cursuri` ON `cursant_curs`.`id_curs`=`cursuri`.`id` 
		LEFT JOIN `curs_main` ON `cursuri`.`parent`=`curs_main`.`id_curs_main`
		WHERE `curs_main`.`id_curs_main`=".$_GET['curs_main']."
		GROUP BY `cursanti`.`email` ORDER BY `cursanti`.`nume`
		";
	} else {
		$querycurs="WHERE 1=1";
	}
} else {
		$querycurs="WHERE 1=1";
		$filtru=false;
}

// filtru iteratie
if (isset($_GET['curs_main']) AND is_numeric($_GET['curs_main']) AND isset($_GET['curs']) AND is_numeric($_GET['curs'])) {
	$filtru2=true;
	if ($_GET['curs']!="--") { 
		$querycurs2="
		SELECT * FROM `cursant_curs`
		LEFT JOIN `cursanti` ON `cursanti`.`id`=`cursant_curs`.`id_cursant` 
		LEFT JOIN `cursuri` ON `cursant_curs`.`id_curs`=`cursuri`.`id` 
		LEFT JOIN `curs_main` ON `cursuri`.`parent`=`curs_main`.`id_curs_main`
		WHERE `curs_main`.`id_curs_main`=".$_GET['curs_main']."
		AND `cursant_curs`.`id_curs`=".$_GET['curs']." 
		GROUP BY `cursanti`.`email` ORDER BY `cursanti`.`nume`
		";
	} else {
		$querycurs2="";
	}
} else {
		$querycurs2="";
		$filtru2=false;
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia Testarii CRM | Comunicare</title>

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
                    <h2>Comunicare</h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Home</a></li>
                        <li class="active"><strong>Comunicare</strong></li>
                    </ol>
                </div>
                <div class="col-sm-4">
				<div class="title-action">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mesaj">Trimite mesaj</button>
				</div>
				</div>
            </div>

    <!-- Main content -->
    <section class="content container-fluid">

	<div class="ibox">
		<div class="ibox-content">
			<div class="row">
<form method="GET" action="<?php echo "https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];?>">		

					<div class="col-sm-6">
					<div class="form-group">
							<label class="control-label" for="curs">Filtreaza dupa cursuri</label>
						<select id="curs_main" class="form-control" name="curs_main" onchange="this.form.submit()">
							<option value="--">-- Toate --</option>
<?php 	
$sql_cursuri_main="SELECT * FROM `curs_main` WHERE `activ_main`=1 ORDER BY `id_curs_main` ASC";
$query_cursuri_main=mysqli_query($link,$sql_cursuri_main);
while ($row_cursuri_main=mysqli_fetch_assoc($query_cursuri_main)) { 
$activmain="";
if ($row_cursuri_main['id_curs_main']==$_GET['curs_main']) {$activmain="selected";}
?>
							<option <?php echo $activmain;?> value="<?php echo $row_cursuri_main['id_curs_main'];?>"><?php echo str_replace("<br />","",$row_cursuri_main['titlu_main']);?></option>
<?php } ?>
						</select>							
					</div>
					</div>
<? if ($filtru) { ?>		
					<div class="col-sm-6">
					<div class="form-group">
							<label class="control-label" for="curs">Filtreaza dupa iteratie curs</label>
						<select id="curs" class="form-control" name="curs" onchange="this.form.submit()">
							<option value="--">-- Toate --</option>
<?php 	
$sql_cursuri2="SELECT * FROM `cursuri` WHERE `parent`=".$_GET['curs_main']." ORDER BY `start_inscriere` DESC";
$query_cursuri2=mysqli_query($link,$sql_cursuri2);
while ($row_cursuri2=mysqli_fetch_assoc($query_cursuri2)) { 
$activ="";
if ($row_cursuri2['id']==$_GET['curs']) {$activ="selected";}
?>
								<option <?php echo $activ;?> value="<?php echo $row_cursuri2['id'];?>"><?php if ($row_cursuri2['start_inscriere']!="0000-00-00") { echo strftime("%e %B %Y", strtotime($row_cursuri2['start_inscriere']))." - ".strftime("%e %B %Y", strtotime($row_cursuri2['end_inscriere']));} else {echo "TBA";}?> </option>
<?php } ?>
						</select>							
					</div>
					</div>
<?php } ?>
</form>
			</div>
<hr />
			<div class="">
              <table class="table table-striped table-hover" id="cursanti">
				<thead>
				<tr>
				  <!--th></th-->
				  <th>ID</th>
				  <th>Nume Prenume</th>
				  <th>Email</th>
				  <th>Telefon</th>
				  <th>Localitate</th>
				  <th>Inregistrat</th>
				  <th>Activ</th>
				</tr>
			  </thead>
			  <tbody>
<?php 
if ($filtru) {$sql_cursanti=$querycurs;} else {$sql_cursanti="SELECT * FROM `cursanti`";}
if ($filtru2) {$sql_cursanti=$querycurs2;} else {$sql_cursanti="SELECT * FROM `cursanti`";}

$query_cursanti=mysqli_query($link,$sql_cursanti);
$i=0;
while ($cursant=mysqli_fetch_assoc($query_cursanti)) { 
$emails.=$cursant['email']."; ";
?>
				<tr>
				  <!--td id="<?php echo $i;?>" class="a-center ">
					<input id="<?php echo $cursant['id'];?>" type="checkbox" name="cursant[]" value="<?php echo $cursant['id'];?>">
				  </td-->
				  <td><?php echo $cursant['id'];?></td>
				  <td><?php echo $cursant['nume']." ".$cursant['prenume'];?></td>
				  <td><?php echo $cursant['email'];?></td>
				  <td><?php echo $cursant['telefon'];?></td>					  
				  <td><?php echo $cursant['localitate'];?></td>
				  <td><?php echo $cursant['data_inregistrare'];?></td>				  
				  <td>
					<?php if ($cursant['activitate']=="") { ?>
					<span class="label label-danger">Inactiv</span>
					<?php } else { ?>
					<span class="label label-primary">Activ</span>
					<?php } ?>
				  </td>
				</tr>
<?php $i++; } ?>
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

<div class="modal inmodal" id="mesaj" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog mesaj">
		<div class="modal-content animated fadeIn">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Inchide</span></button>
				<i class="fa fa-envelope-o modal-icon"></i>
				<h4 class="modal-title">Trimite mesaj</h4>
			</div>
			<div class="modal-body">
			
			<div class="ibox-content">
			<label class="control-label">Catre</label><br />
			<?php echo $emails; ?>
			</div>
			
			<div class="ibox-content">
				<div class="form-group">
					<label class="col-sm-2 control-label">Titlu mesaj</label>
					<div class="col-sm-10"><input value="" name="titlu" type="text" class="form-control" required></div>
				</div>
				<div class="hr-line-dashed"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Mesaj:</label>
					<div class="col-sm-10">
					<textarea id="text" name="mesaj">
						
					</textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-primary" type="submit">Trimite</button>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>

    <!-- Main scripts -->
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
	<!-- DataTables -->
	<script src="js/plugins/dataTables/datatables.min.js"></script>		
    <script src="js/plugins/iCheck/icheck.min.js"></script>
	<script src="js/plugins/ckeditor/ckeditor.js"></script>	
	<script>
	  $(function () {
		// Replace the <textareas> with a CKEditor instance.
		CKEDITOR.replace('text')
		})
	</script>	
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

	  $(function () {
			$('#cursanti').DataTable( {
			"order": [[ 6, "desc" ]]
			} );
	  });
	  

	});
	</script>
</body>

</html>