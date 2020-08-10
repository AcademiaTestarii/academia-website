<?php 
include("../__connect.php");
if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['curs']) && is_numeric($_GET['curs'])) {
$id=mysqli_real_escape_string($link,$_GET['id']);
$curs=mysqli_real_escape_string($link,$_GET['curs']);
$sql="
SELECT * FROM `feedback` 
LEFT JOIN `cursanti` ON `feedback`.`id_cursant`=`cursanti`.`id`
LEFT JOIN `cursuri` ON `feedback`.`id_curs`=`cursuri`.`id`
LEFT JOIN `curs_main` ON `cursuri`.`parent`=`curs_main`.`id_curs_main`
WHERE `id_cursant`=".$id." AND `id_curs`=".$curs;
$query=mysqli_query($link,$sql);
if (mysqli_num_rows($query)>0) {
$row=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia testarii CRM | Feedback <?php echo $row['nume'];?> <?php echo $row['prenume'];?></title>

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
<div class="main-content">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<br/>
<br/>
<br/>
<div class="panel panel-success">
<div class="panel-heading  text-center">
<h1>Feedback acordat pentru participarea la cursul <br /><?php echo $row['titlu_main'];?>.</h1>
<h3>Acordat pentru: <?php echo $row['nume'];?> <?php echo $row['prenume'];?></h3>
<h3>Data: <?php echo strftime("%e %B %Y", strtotime($row['acordat']));?></h3>
</div>
<div class="panel-body">

<div class="row m-sm">
<div class="col-md-12 text-center"><h3>Scor general: <?php echo $row['scor'];?></h3></div>
</div>
<hr/>
<div class="row m-sm">
<div class="col-md-12 text-center"><h3>Organizare Jira & Zephyr</h3></div>
<div class="bg-muted">
<div class="col-md-6"><h4>Good points</h4><p><?php echo $row['organizare_jira_zephyr_plus'];?></p></div>
<div class="col-md-6"><h4>To improve</h4><p><?php echo $row['organizare_jira_zephyr_minus'];?></p></div>
</div>
</div>
<hr/>

<div class="row m-sm">
<div class="col-md-12 text-center"><h3>Test cases</h3></div>
<div class="bg-muted">
<div class="col-md-6"><h4>Good points</h4><p><?php echo $row['test_cases_plus'];?></p></div>
<div class="col-md-6"><h4>To improve</h4><p><?php echo $row['test_cases_minus'];?></p></div>
</div>
</div>
<hr/>
<div class="row m-sm">
<div class="col-md-12 text-center"><h3>Defects</h3></div>
<div class="bg-muted">
<div class="col-md-6"><h4>Good points</h4><p><?php echo $row['defects_plus'];?></p></div>
<div class="col-md-6"><h4>To improve</h4><p><?php echo $row['defects_minus'];?></p></div>
</div>
</div>
<hr/>
<div class="row m-sm">
<div class="col-md-12 text-center"><h3>Traceability</h3></div>
<div class="bg-muted">
<div class="col-md-6"><h4>Good points</h4><p><?php echo $row['traceability_plus'];?></p></div>
<div class="col-md-6"><h4>To improve</h4><p><?php echo $row['traceability_minus'];?></p></div>
</div>
</div>

</div>
</div>

</div>
<div class="col-md-3"></div>
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
<?php } } ?>