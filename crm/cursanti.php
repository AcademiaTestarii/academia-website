<?php 
include("../__connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Testarii CRM | Cursanti</title>
	<link rel="stylesheet" href="js/magnific-popup.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="css/plugins/jQueryUI/jquery-ui.css" rel="stylesheet">
	<link href="css/plugins/iCheck/custom.css" rel="stylesheet">
	<link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
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
                <div class="col-lg-10">
                    <h2>Cursanti</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li class="active">
                            <strong>Cursanti</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-8">
                    <div class="ibox">
                        <div class="ibox-content">
                            <!--span class="text-muted small pull-right">Ultima modificare: <i class="fa fa-clock-o"></i> 14:10 - 15.09.2019</span-->
                            <h2>Cursanti</h2>
                            <p>Lista completa cursanti.</p>
                            <!--div class="input-group">
                                <input type="text" placeholder="cauta client " class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Cauta</button>
                                </span>
                            </div-->
                            <div class="clients-list">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Activi</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Arhiva</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active"><br />
                                    <div class="full-height-scroll">
                                        <div class="">
                                            <table class="table table-striped table-hover" id="cursanti">
												<thead>
												<tr>
												  <th>Nume / Prenume</th>
												  <th>Email</th>
												  <th>Telefon</th>
												  <th>Inregistrat</th>
												  <th class="text-center">Activ</th>
												</tr>
												</thead>
                                                <tbody>
<?php 
$sql_cursanti_activi=mysqli_query($link,"SELECT * FROM `cursanti` WHERE `activitate` IS NOT NULL ORDER BY `nume`");
while ($cursant_activ=mysqli_fetch_assoc($sql_cursanti_activi)) { 
?>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#contact-<?php echo $cursant_activ['id'];?>" class="client-link"><?php echo $cursant_activ['nume']." ".$cursant_activ['prenume'];?></a></td>
                                                    <td><i class="fa fa-envelope"> </i> <?php echo $cursant_activ['email'];?></td>
                                                    <td><?php echo ($cursant_activ['telefon']!="" ? "<i class=\"fa fa-phone\"> </i> ".$cursant_activ['telefon']:"---");?></td>
													<td><?php echo $cursant_activ['data_inregistrare'];?></td>
                                                    <td class="text-center">
													<?php if ($cursant_activ['activitate']=="") { ?>
													<span class="label label-danger">Inactiv</span>
													<?php } else { ?>
													<span class="label label-primary">Activ</span>
													<?php } ?>
													<!--span class="label label-warning">Waiting</span-->
													</td>
                                                </tr>
<?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
								
                                <div id="tab-2" class="tab-pane"><br />
                                    <div class="full-height-scroll">
                                        <div class="">
                                            <table class="table table-striped table-hover" id="cursanti2">
												<thead>
												<tr>
												  <th>Nume / Prenume</th>
												  <th>Email</th>
												  <th>Telefon</th>
												  <th>Inregistrat</th>
												  <th class="text-center">Activ</th>
												</tr>
												</thead>
                                                <tbody>
<?php 
$sql_cursanti_inactivi=mysqli_query($link,"SELECT * FROM `cursanti` WHERE `activitate` IS NULL ORDER BY `nume`");
while ($cursant_inactiv=mysqli_fetch_assoc($sql_cursanti_inactivi)) { 
?>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#contact-<?php echo $cursant_inactiv['id'];?>" class="client-link"><?php echo $cursant_inactiv['nume']." ".$cursant_inactiv['prenume'];?></a></td>
                                                    <td><i class="fa fa-envelope"> </i> <?php echo $cursant_inactiv['email'];?></td>
                                                    <td><?php echo ($cursant_inactiv['telefon']?"<i class=\"fa fa-phone\"> </i> ".$cursant_inactiv['telefon']:"---");?></td>
													<td><?php echo $cursant_inactiv['data_inregistrare'];?></td>
                                                    <td class="text-center">
													<?php if ($cursant_inactiv['activitate']!="") { ?>
													<span class="label label-primary">Activ</span>
													<?php } else { ?>
													<span class="label label-danger">Inactiv</span>
													<?php } ?>
													<!--span class="label label-warning">Waiting</span-->
													</td>
                                                </tr>
<?php } ?>
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
                <div class="col-sm-4">
                    <div class="ibox ">

                        <div class="ibox-content">
                            <div class="tab-content">
<?php 
$sql_cursanti2=mysqli_query($link,"SELECT * FROM `cursanti` ORDER BY `activ` DESC, `nume` ASC");
$panel="active";
while ($cursant2=mysqli_fetch_assoc($sql_cursanti2)) { ?>
                                <div id="contact-<?php echo $cursant2['id'];?>" class="tab-pane <?php echo $panel;?>">
                                    <div class="row m-b-lg">
                                        <div class="col-lg-12">
                                            <h2><?php echo $cursant2['nume']." ".$cursant2['prenume'];?></h2>
                                        </div>
                                    </div>
                                    <div class="client-detail">
                                    <div class="full-height-scroll">

                                        <strong>Activitate recenta</strong>

                                        <ul class="list-group clear-list">
											<li class="list-group-item">
                                                <span class="pull-right"> <?php echo strftime("%e %B %Y la ora %H:%M:%S", strtotime($cursant2['data_inregistrare']));?> </span>
                                                Inregistrare pe platforma AT+
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right"> <?php if ($cursant2['activitate']!=NULL) {echo strftime("%e %B %Y la ora %H:%M:%S", strtotime($cursant2['activitate']));} else {echo "Niciodata";}?></span>
                                                Ultima logare pe platforma AT+
                                            </li>
                                        </ul>
										
										<div class="well well-sm">
											<h3>Date personale</h3>
											<div class="row">
												<div class="col-md-6"><strong>Adresa:</strong> <?php echo $cursant2['adresa'];?></div>
												<div class="col-md-6"><strong>Localitate:</strong> <?php echo $cursant2['localitate'];?></div>
												<div class="col-md-6"><strong>Judet:</strong> <?php echo $cursant2['judet'];?></div>
												<div class="col-md-6"><strong>Profesie:</strong> <?php echo $cursant2['pozitie'];?></div>
												<div class="col-md-12"><strong>Data nastere:</strong> <?php echo $cursant2['data_nastere'];?></div>
												<div class="col-md-12"><hr /></div>
												<div class="col-md-4"><strong>Educatie:</strong> <?php echo $cursant2['educatie'];?></div>
												<div class="col-md-4"><strong>Engleza:</strong> <?php echo $cursant2['engleza'];?></div>
												<div class="col-md-4"><strong>Alta limba:</strong> <?php echo $cursant2['alta_limba'];?></div>
												<div class="col-md-4"><strong>MS Office:</strong> <?php echo $cursant2['ms_office'];?></div>
												<div class="col-md-4"><strong>Web:</strong> <?php echo $cursant2['web'];?></div>
											</div>
										</div>
										
										<div class="well well-sm">
											<h3>Cursuri</h3>
<?php 	$sql_cursuri=mysqli_query($link,"SELECT * FROM `cursant_curs` LEFT JOIN `cursuri` ON `cursant_curs`.`id_curs`=`cursuri`.`id` LEFT JOIN `curs_main` ON `cursuri`.`parent`=`curs_main`.`id_curs_main` WHERE `cursant_curs`.`id_cursant`=".$cursant2['id']." ORDER BY `cursant_curs`.`data_inscriere` DESC");
		if (mysqli_num_rows($sql_cursuri)>0) {
		while ($cursuri=mysqli_fetch_assoc($sql_cursuri)) {
?>
                                        <p><i class="fa fa-angle-double-right"></i> <a href="vizualizare_curs.php?id=<?php echo $cursuri['id'];?>"><strong><?php echo $cursuri['titlu_main'];?>: <?php echo $cursuri['titlu'];?></strong></a></p>
<?php } } else { ?>
										<p>Nu este inregistrat la nici un curs.</p>
<?php } ?>
                                        </div>

										<div class="well well-sm">
                                        <h3>Calificative</h4>
<?php 	$sql_calificativ=mysqli_query($link,"SELECT * FROM `feedback` LEFT JOIN `cursuri` ON `feedback`.`id_curs`=`cursuri`.`id` LEFT JOIN `curs_main` ON  `cursuri`.`parent`=`curs_main`.`id_curs_main` WHERE `feedback`.`id_cursant`=".$cursant2['id']." ORDER BY `feedback`.`acordat` DESC");
		if (mysqli_num_rows($sql_calificativ)>0) { ?>
<?			
		while ($calificativ=mysqli_fetch_assoc($sql_calificativ)) {
?>
										<p><i class="fa fa-angle-double-right"></i> <a href="../feedback.php?id=<?php echo $calificativ['link'];?>" target="_blank"><?php echo $calificativ['titlu_main'];?>: <?php echo $calificativ['titlu'];?>  <i class="fa fa-arrow-circle-right"></i></a></p>
<?php } ?> 

<? } else { ?>
										<p>Nu are calificative acordate.</p>
<?php } ?>
                                        </div>
										<div class="well well-sm">
                                        <h3>Notite</h4>
<?php 	$sql_notita=mysqli_query($link,"SELECT * FROM `cursant_curs` LEFT JOIN `cursuri` ON `cursant_curs`.`id_curs`=`cursuri`.`id` LEFT JOIN `curs_main` ON `cursuri`.`parent`=`curs_main`.`id_curs_main` WHERE `cursant_curs`.`id_cursant`=".$cursant2['id']." AND `cursant_curs`.`notita`!=''");
		if (mysqli_num_rows($sql_notita)>0) { ?>
<?			
		while ($notita=mysqli_fetch_assoc($sql_notita)) {
?>
										<strong><?php echo $notita['titlu_main'];?>: <?php echo $notita['titlu'];?></strong>
										<p><i class="fa fa-angle-double-right"></i> <?php echo $notita['notita'];?></p><br />
<?php } ?> 

<? } else { ?>
										<p>Nu are notite.</p>
										<button href="inline.notita.php?cursant=<?php echo $row_cursanti['id_cursant'];?>&curs=<?php echo $id;?>" class="btn btn-info btn-xs ajax-popup-link">Adauga/Modifica</button>
<?php } ?>
                                        </div>										
										
									</div>
                                    </div>
                                </div>
<?php $panel="";} ?>
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

    <!-- Main scripts -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- DataTables -->
	<script src="js/plugins/dataTables/datatables.min.js"></script>
	<script>
	  $(function () {
			$('#cursanti').DataTable( {
			"order": [[ 3, "desc" ]]
			} );
			$('#cursanti2').DataTable( {
			"order": [[ 3, "desc" ]]
			} );
	  });
	</script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
	<!-- Magnific Popup core JS file -->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
	$('.ajax-popup-link').magnificPopup({
	  type: 'ajax'
	});
	</script>
</body>
</html>
