<?php 
include("../__connect.php");

$sql_cursanti=mysqli_query($link,"SELECT * FROM `cursanti` ORDER BY `nume`");
$cati=mysqli_num_rows($sql_cursanti);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Testarii CRM | Cursanti</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
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
                            <!--ul class="nav nav-tabs">
                                <span class="pull-right small text-muted"><?php echo $cati;?> Inregistrari</span>
                                <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Cursanti</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Companii</a></li>
                            </ul-->
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="full-height-scroll">
                                        <div class="">
                                            <table class="table table-striped table-hover" id="cursanti">
												<thead>
												<tr>
												  <th>Nume / Prenume</th>
												  <th>Companie</th>
												  <th>Localitate</th>
												  <th>Email</th>
												  <th>Telefon</th>
												  <th class="text-center">Activ</th>
												</tr>
												</thead>
                                                <tbody>
<?php while ($cursant=mysqli_fetch_assoc($sql_cursanti)) { ?>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#contact-<?php echo $cursant['id'];?>" class="client-link"><?php echo $cursant['nume']." ".$cursant['prenume'];?></a></td>
                                                    <td> <?php echo $cursant['companie'];?></td>
                                                    <td class="contact-type"><?php echo $cursant['localitate'];?></td>
                                                    <td><i class="fa fa-envelope"> </i> <?php echo $cursant['email'];?></td>
                                                    <td><i class="fa fa-phone"> </i> <?php echo $cursant['telefon'];?></td>
                                                    <td class="text-center">
													<?php if ($cursant['activ']==1) { ?>
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
$sql_cursanti2=mysqli_query($link,"SELECT * FROM `cursanti` ORDER BY `nume`");
$panel="active";
while ($cursant2=mysqli_fetch_assoc($sql_cursanti2)) { ?>
                                <div id="contact-<?php echo $cursant2['id'];?>" class="tab-pane <?php echo $panel;?>">
                                    <div class="row m-b-lg">
                                        <div class="col-lg-6">
                                            <h2><?php echo $cursant2['nume']." ".$cursant2['prenume'];?></h2>
                                        </div>
                                        <!--div class="col-lg-8">
                                            <strong>
                                                Informatii client
                                            </strong>

                                            <p>
                                                <?php echo $cursant2['bio'];?>
                                            </p>
                                            <button type="button" class="btn btn-primary btn-sm btn-block"><i
                                                    class="fa fa-envelope"></i> Trimite mesaj
                                            </button>
                                        </div-->
                                    </div>
                                    <div class="client-detail">
                                    <div class="full-height-scroll">

                                        <strong>Activitate recenta</strong>

                                        <ul class="list-group clear-list">
                                            <!--li class="list-group-item fist-item">
                                                <span class="pull-right"> 10:15 - 12.09.2019 </span>
                                                Inregistrare newsletter
                                            </li-->
                                            <li class="list-group-item">
                                                <span class="pull-right"> <?php if ($cursant2['activitate']!=NULL) {echo strftime("%e %B %Y la ora %H:%M:%S", strtotime($cursant2['activitate']));} else {echo "Niciodata";}?></span>
                                                Ultima logare pe platforma AT+
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right"> <?php echo strftime("%e %B %Y la ora %H:%M:%S", strtotime($cursant2['data_inregistrare']));?> </span>
                                                Inregistrare pe platforma AT+
                                            </li>
                                        </ul>
										
										<hr/>
										<strong>Cursuri</strong>
<?php 	$sql_cursuri=mysqli_query($link,"SELECT * FROM `cursant_curs` LEFT JOIN `cursuri` ON `cursant_curs`.`id_curs`=`cursuri`.`id` LEFT JOIN `curs_main` ON `cursuri`.`parent`=`curs_main`.`id_curs_main` WHERE `cursant_curs`.`id_cursant`=".$cursant2['id']." ORDER BY `cursant_curs`.`data_inscriere` DESC");
		if (mysqli_num_rows($sql_cursuri)>0) {
		while ($cursuri=mysqli_fetch_assoc($sql_cursuri)) {
?>
                                        <p><?php echo $cursuri['titlu_main'];?>: <?php echo $cursuri['titlu'];?></p>
<?php } } else { ?>
										<p>Nu este inregistrat la nici un curs.</p>
<?php } ?>
                                        <hr/>

                                        <strong>Calificative</strong>
<?php 	$sql_calificativ=mysqli_query($link,"SELECT * FROM `feedback` LEFT JOIN `cursuri` ON `feedback`.`id_curs`=`cursuri`.`id` LEFT JOIN `curs_main` ON  `cursuri`.`parent`=`curs_main`.`id_curs_main` WHERE `feedback`.`id_cursant`=".$cursant2['id']." ORDER BY `feedback`.`acordat` DESC");
		if (mysqli_num_rows($sql_calificativ)>0) { ?>
<div class="panel-body">
	<div class="panel-group" id="accordion">
<?			
		while ($calificativ=mysqli_fetch_assoc($sql_calificativ)) {
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h5 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed"><?php echo $calificativ['titlu_main'];?>: <?php echo $calificativ['titlu'];?></a>
		</h5>
	</div>
	<div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
		<div class="panel-body">
			<h4>Nota: <?php echo $calificativ['scor'];?></h4>
			<div class="progress">
				<div style="width: <?php echo number_format(($calificativ['scor']/10*100),0);?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo number_format(($calificativ['scor']/10*100),0);?>" role="progressbar" class="progress-bar progress-bar-warning">
				<span class="sr-only"><?php echo $calificativ['scor'];?></span>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-6"><h4>Organizare - Good points</h4><p><?php echo $calificativ['organizare_jira_zephyr_plus'];?></p></div>
				<div class="col-md-6"><h4>Organizare - To improve</h4><p><?php echo $calificativ['organizare_jira_zephyr_minus'];?></p></div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-6"><h4>Tests - Good points</h4><p><?php echo $calificativ['test_cases_plus'];?></p></div>
				<div class="col-md-6"><h4>Tests - To improve</h4><p><?php echo $calificativ['test_cases_minus'];?></p></div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-6"><h4>Defects - Good points</h4><p><?php echo $calificativ['defects_plus'];?></p></div>
				<div class="col-md-6"><h4>Defects - To improve</h4><p><?php echo $calificativ['defects_minus'];?></p></div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-6"><h4>Traceability - Good points</h4><p><?php echo $calificativ['traceability_plus'];?></p></div>
				<div class="col-md-6"><h4>Traceability - To improve</h4><p><?php echo $calificativ['traceability_minus'];?></p></div>
			</div>
		 
		</div>
	</div>
</div>
<?php } ?> 
	</div>
</div>
<? } else { ?>
										<p>Nu are calificative acordate.</p>
<?php } ?>
                                        <hr/>
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
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- DataTables -->
	<script src="js/plugins/dataTables/datatables.min.js"></script>
	<script>
	  $(function () {
			$('#cursanti').DataTable( {
			//"order": [[ 1, "desc" ]]
			} );
	  });
	</script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

</body>
</html>
