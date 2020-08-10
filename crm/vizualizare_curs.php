<?php 
include("../__connect.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$id=$_GET['id'];
	$sql=mysqli_query($link,"SELECT * FROM `cursuri` LEFT JOIN `curs_main` ON `cursuri`.`parent`=`curs_main`.`id_curs_main` WHERE `cursuri`.`id`=".$id);
	if (mysqli_num_rows($sql)>0) {	
		$row=mysqli_fetch_assoc($sql);
	} else {
		header ("Location:cursuri.php");
	}	
} else {
header ("Location:cursuri.php");	
}

// notita
if (isset($_POST['curs']) && isset($_POST['cursant']) && isset($_POST['notita'])) {
	$notita=trim(mysqli_real_escape_string($link,$_POST['notita']));
	$sql_update_notita="UPDATE `cursant_curs` SET `notita` ='".$notita."' WHERE `id_cursant`=".$_POST['cursant']." AND `id_curs`=".$_POST['curs'];
	mysqli_query($link,$sql_update_notita);
} 

// mutare cursant
if (isset($_POST['curs']) && isset($_POST['cursant']) && isset($_POST['cursnou'])) {
	$cursnou=trim(mysqli_real_escape_string($link,$_POST['cursnou']));
	if ($cursnou!="--") {
	$sql_update_cursnou="UPDATE `cursant_curs` SET `id_curs` ='".$cursnou."' WHERE `id_cursant`=".$_POST['cursant']." AND `id_curs`=".$_POST['curs'];
	mysqli_query($link,$sql_update_cursnou);
	}
}

// sterge 
if (isset($_GET['sterge']) AND is_numeric($_GET['sterge'])) {
	$sql_sterge=mysqli_query($link,"DELETE FROM `cursant_curs` WHERE `id_cursant`=".$_GET['sterge']." AND `id_curs`=".$_GET['curs']);
header ("Location:vizualizare_curs.php?id=".$_GET['curs']);
}

$sql_inscrisi=mysqli_query($link,"SELECT * FROM `cursant_curs` LEFT JOIN `cursanti` ON `cursant_curs`.`id_cursant`=`cursanti`.`id` WHERE `cursant_curs`.`id_curs`=".$row['id']);
$cati=mysqli_num_rows($sql_inscrisi);
if ($cati > 0) {$sunt_studenti=true;} else {$sunt_studenti=false;}

// mesaj studenti
if (isset($_POST['trimite_mesaj']) && $sunt_studenti && $_POST['subiect_mesaj']!="" && $_POST['mesaj']!="") {
	
	require_once('../includes/phpmailer/class.phpmailer.php');
	$mail->CharSet = 'UTF-8';
	$mail->Encoding = 'base64';
	$mail = new PHPMailer();

	$mail->SetFrom( "office@academiatestarii.ro" ,"Academia Testării" );
	$mail->AddReplyTo( "contact@academiatestarii.ro" ,"Academia Testării" );
	
	while ($row_emails=mysqli_fetch_array($sql_inscrisi)) {
	
		$mail->AddAddress( $row_emails['email'] , $row_emails['nume']." ".$row_emails['prenume'] );
		$mail->Subject = $_POST['subiect_mesaj'];
		$message = $_POST['mesaj'];
		$body = $message;
		$mail->MsgHTML( $body );
		$sendEmail = $mail->Send();	
		$mail->clearAddresses();
	}
header ("Location:vizualizare_curs.php?id=".$id);	
}

// calificativ
if (isset($_POST['acorda_calificativ'])) {
$linkfeedback=generatePassword();	
	$sql_insert=(mysqli_query($link,"
	INSERT INTO `feedback` (`id_cursant`,`id_curs`,`scor`,`organizare_jira_zephyr_plus`,`organizare_jira_zephyr_minus`,`test_cases_plus`,`test_cases_minus`,`defects_plus`,`defects_minus`,`traceability_plus`,`traceability_minus`,`link`) 
	VALUES 
	(".$_POST['cursant'].",
	".$_POST['curs'].",
	".$_POST['nota'].",
	'".trim(mysqli_real_escape_string($link,$_POST['good_organizare']))."',
	'".trim(mysqli_real_escape_string($link,$_POST['bad_organizare']))."',
	'".trim(mysqli_real_escape_string($link,$_POST['good_cases']))."',
	'".trim(mysqli_real_escape_string($link,$_POST['bad_cases']))."',
	'".trim(mysqli_real_escape_string($link,$_POST['good_defects']))."',
	'".trim(mysqli_real_escape_string($link,$_POST['bad_defects']))."',
	'".trim(mysqli_real_escape_string($link,$_POST['good_trace']))."',
	'".trim(mysqli_real_escape_string($link,$_POST['bad_trace']))."',
	'".$linkfeedback."')
	"));
header ("Location:vizualizare_curs.php?id=".$_POST['curs']);	
} 
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia Testarii CRM | Vizualizare curs: <?php echo $row['titlu_main'];?> <?php echo $row['titlu'];?></title>

	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="js/magnific-popup.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
	<link href="css/plugins/jQueryUI/jquery-ui.css" rel="stylesheet">
    <link href="js/plugins/Multiple-Dates-Picker-for-jQuery-UI-latest/jquery-ui.multidatespicker.css" rel="stylesheet">
	<link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
	<link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/plugins/iCheck/custom.css" rel="stylesheet">
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
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
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
                <div class="col-sm-12">
                    <h2><?php echo $row['titlu_main'];?>: <?php echo $row['titlu'];?> din <?php echo strftime("%e %B, %Y", strtotime($row['start_inscriere']));?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Home</a>
                        </li>
						 <li>
                            <a href="cursuri.php">Cursuri</a>
                        </li>
                        <li class="active">
                            <strong><?php echo $row['titlu_main'];?>: <?php echo $row['titlu'];?> din <?php echo strftime("%e %B, %Y", strtotime($row['start_inscriere']));?></strong>
                        </li>
                    </ol>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
								<?php if ($sunt_studenti) { ?>
                                    <div class="m-b-md">
										<button type="button" class="btn btn-warning btn-xs pull-right" data-toggle="modal" data-target="#mesaj">Adrese email cursanti</button>
                                    </div>
								<?php } ?>	
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label label-primary">Activ</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Obiectiv:</dt> 
											<dd>  <?php echo $row['cursanti'];?></dd>
                                        <dt>Cursanti inscrisi:</dt> 
<?php if ($sunt_studenti) { ?>
											<dd> <?php echo $cati;?></dd>
<?php } else { ?>
											<dd> 0 </dd>
<?php } ?>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >
                                        <dt>Obiectiv buget:</dt> 
											<dd><?php echo number_format($row['cursanti']*$row['pret']);?></dd>
                                        <dt>Realizat:</dt> 
											<dd><?php echo number_format($cati*$row['pret']);?></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Rata ocupare:</dt>
                                        <dd>
                                            <div class="progress progress-striped active m-b-sm">
                                                <div style="width: <?php echo number_format($cati/$row['cursanti']*100,0);?>%" class="progress-bar"></div>
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
										
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
									<div class="ibox ">
										<div class="ibox-title">
											<h3>Lista cursanti</h3>
										</div>
										<div class="ibox-content">
										  <table id="example1" class="table table-bordered table-striped">
											<thead>
											<tr>
											  <th>Nume</th>
											  <th>Data inscriere</th>
											  <th>Email</th>
											  <th>Telefon</th>
											  <th>Status</th>
											  <th class="text-center"></th>
											  <th class="text-center"></th>
											  <th class="text-center"></th>
											  <th class="text-center"></th>
											</tr>
											</thead>
											<tbody>
<?php 
	if ($sunt_studenti) {
	while ($row_cursanti=mysqli_fetch_array($sql_inscrisi)) {
	$sql_feeback=mysqli_query($link,"SELECT * FROM `feedback` WHERE `id_cursant`=".$row_cursanti['id']." AND `id_curs`=".$id);
	if (mysqli_num_rows($sql_feeback)>0) {$arefeed=true;$feed=mysqli_fetch_assoc($sql_feeback);} else {$arefeed=false;}
	
	if ($row_cursanti['rata1']==0 && $row_cursanti['rata2']==0 && $row_cursanti['integral']==0) {$plata="Plata in asteptare";$class="class=\"warning\"";}
	elseif ($row_cursanti['rata1']==1 && $row_cursanti['rata2']==0 && $row_cursanti['integral']==0) {$plata="Rata 1 platita";$class="";}										  
	elseif ($row_cursanti['rata1']==1 && $row_cursanti['rata2']==1 && $row_cursanti['integral']==1) {$plata="Achitat integral";$class="";}
	else {$plata="";$class="";}	
?>
											<tr <?php echo $class;?>>
											  <td><?php echo $row_cursanti['nume'];?> <?php echo $row_cursanti['prenume'];?></td>
											  <td><?php echo $row_cursanti['data_inscriere'];?></td>
											  <td><?php echo $row_cursanti['email'];?></td>
											  <td><?php echo $row_cursanti['telefon'];?></td>
											  <td><?php echo $plata;?></td>
											  <td class="text-center">
											  <button href="inline.mutacursant.php?cursant=<?php echo $row_cursanti['id_cursant'];?>&curs=<?php echo $id;?>" class="btn btn-warning btn-xs ajax-popup-link">Muta</button>
												<!--a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#facturi">Facturi</a-->
											  </td>
											  <td class="text-center">
<?php if (!$arefeed) { ?>
												<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#calificativ<?php echo $row_cursanti['id'];?>">Calificativ</button>
<div class="modal inmodal" id="calificativ<?php echo $row_cursanti['id'];?>" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated fadeIn">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Inchide</span></button>
				<i class="fa fa-star-half-o modal-icon"></i>
				<h4 class="modal-title">Acordă calificativ pentru <br /><?php echo $row_cursanti['nume'];?> <?php echo $row_cursanti['prenume'];?></h4>
				<small> </small>
			</div>
			<div class="modal-body">
				<form method="POST" class="calificativ" action="">
					<div class="form-group">
						<div class="col-md-12 form-horizontal">
							<fieldset>
								<h4>Notă</h4>
								<div class="radio radio-inline">
									<input type="radio" id="inlineRadio1" value="1" name="nota">
									<label for="inlineRadio1"> 1 </label>
								</div>
								<div class="radio radio-inline">
									<input type="radio" id="inlineRadio2" value="2" name="nota">
									<label for="inlineRadio2"> 2 </label>
								</div>
								<div class="radio radio-inline">
									<input type="radio" id="inlineRadio3" value="3" name="nota">
									<label for="inlineRadio3"> 3 </label>
								</div>
								<div class="radio radio-inline">
									<input type="radio" id="inlineRadio4" value="4" name="nota">
									<label for="inlineRadio4"> 4 </label>
								</div>
								<div class="radio radio-inline">
									<input type="radio" id="inlineRadio5" value="5" name="nota">
									<label for="inlineRadio5"> 5 </label>
								</div>
								<div class="radio radio-inline">
									<input type="radio" id="inlineRadio6" value="6" name="nota">
									<label for="inlineRadio6"> 6 </label>
								</div>
								<div class="radio radio-inline">
									<input type="radio" id="inlineRadio7" value="7" name="nota">
									<label for="inlineRadio7"> 7 </label>
								</div>
								<div class="radio radio-inline">
									<input type="radio" id="inlineRadio8" value="8" name="nota">
									<label for="inlineRadio8"> 8 </label>
								</div>
								<div class="radio radio-inline">
									<input type="radio" id="inlineRadio9" value="9" name="nota">
									<label for="inlineRadio9"> 9 </label>
								</div>
								<div class="radio radio-inline">
									<input type="radio" id="inlineRadio10" value="10" name="nota">
									<label for="inlineRadio10"> 10 </label>
								</div>
							</fieldset>
						</div>
					</div>
<div class="form-group">
						<div class="col-md-12"><h4>Organizare JIRA & Zephyr</h4></div>
						<div class="col-md-6">Good points <textarea name="good_organizare"></textarea></div>
						<div class="col-md-6">To improve <textarea name="bad_organizare"></textarea></div>
</div>	
<div class="form-group">
						<div class="col-md-12"><h4>Test Cases</h4></div>
						<div class="col-md-6">Good points<textarea name="good_cases"></textarea></div>
						<div class="col-md-6">To improve<textarea name="bad_cases"></textarea></div>
</div>
<div class="form-group">
						<div class="col-md-12"><h4>Defects</h4></div>
						<div class="col-md-6">Good points<textarea name="good_defects"></textarea></div>
						<div class="col-md-6">To improve<textarea name="bad_defects"></textarea></div>
</div>
<div class="form-group">
						<div class="col-md-12"><h4>Traceability</h4></div>
						<div class="col-md-6">Good points<textarea name="good_trace"></textarea></div>
						<div class="col-md-6">To improve<textarea name="bad_trace"></textarea></div>
</div>
<div class="form-group">
						<div class="col-md-12 mt-20 text-center"><button class="btn btn-info btn-sm" type="submit" name="acorda_calificativ" />Salvează calificativ</button></div>
</div>
					<input type="hidden" name="cursant" value="<?php echo $row_cursanti['id'];?>" />
					<input type="hidden" name="curs" value="<?php echo $id;?>" />
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">Inchide</button>
			</div>
		</div>
	</div>
</div>												
												
<?php } else { ?>
												<a href="../feedback.php?id=<?php echo $feed['link'];?>" class="btn btn-warning btn-xs" target="_blank">Calificativ</a>
<?php } ?>
											  </td>
											  <td class="text-center">
<?php
$sql_notita=mysqli_query($link,"SELECT `notita` FROM `cursant_curs` WHERE `id_cursant`=".$row_cursanti['id_cursant']." AND `id_curs`=".$id." AND `notita`!=''");
if (mysqli_num_rows($sql_notita)>0) {	
	$butonnotita="btn-primary";
} else {
	$butonnotita="btn-info";
}
?>
												<button href="inline.notita.php?cursant=<?php echo $row_cursanti['id_cursant'];?>&curs=<?php echo $id;?>" class="btn <?php echo $butonnotita;?> btn-xs ajax-popup-link">Notita</button>
											  </td>
											  <td class="text-center">
											  <form action="" method="GET">
												<button class="btn btn-danger btn-xs" onClick="confirmDelete()" type="submit" />Sterge</button>
												<input type="hidden" name="sterge" value="<?php echo $row_cursanti['id_cursant'];?>" />
												<input type="hidden" name="curs" value="<?php echo $id;?>" />
											  </form>
											  </td>
											</tr>
<?php $arefeed=false;} } ?>
											</tbody>
										  </table>

										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
<?php include("include.footer.php");?>
        </div>

        </div>
        </div>
 
<!-- Modals -->
<?php if ($sunt_studenti) { ?>
<div class="modal inmodal" id="mesaj" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated fadeIn">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Inchide</span></button>
				<i class="fa fa-envelope-o modal-icon"></i>
				<h4 class="modal-title">Lista email-uri cursanti</h4>
			</div>
			<div class="modal-body">
			<div class="ibox-content">
<?php 
$emails="";
$sql_cursanti="SELECT * FROM `cursant_curs` LEFT JOIN `cursanti` ON `cursant_curs`.`id_cursant`=`cursanti`.`id` WHERE `cursant_curs`.`id_curs`=".$id;
$query_cursanti=mysqli_query($link,$sql_cursanti);
while ($row_cursanti=mysqli_fetch_assoc($query_cursanti)) {
	$emails.=$row_cursanti['email']."; ";
}
echo $emails;
?>
			</div>
			</div>
		</div>
	</div>
</div>

<div class="modal inmodal" id="facturi" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated fadeIn">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Inchide</span></button>
				<i class="fa fa-credit-card modal-icon"></i>
				<h4 class="modal-title">Trimite facturi</h4>
				<small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
			</div>
			<div class="modal-body">
				<p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">Inchide</button>
			</div>
		</div>
	</div>
</div>

<?php } ?>
<!-- /Modals -->

<div id="test-popup" class="white-popup mfp-hide">

</div>
    <!-- Mainly scripts -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="js/plugins/fullcalendar/moment.min.js"></script>
    <!-- Date range picker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>

	<!-- Multiple-dates -->
    <script src="js/plugins/Multiple-Dates-Picker-for-jQuery-UI-latest/jquery-ui.multidatespicker.js"></script>
    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>

	<!-- Magnific Popup core JS file -->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
	$('.ajax-popup-link').magnificPopup({
	  type: 'ajax'
	});
	</script>
	
</body>

</html>
