<?php 
include("__connect.php");
if (isset($_GET['id']) && strlen($_GET['id'])==12 && ctype_alnum($_GET['id'])) {
$id=mysqli_real_escape_string($link,$_GET['id']);
$sql="
SELECT 
cursanti.nume,
cursanti.prenume,
cursuri.start_inscriere,
cursuri.end_inscriere,
curs_main.titlu_main,
trainer.nume as `trainer`,
feedback.scor,
feedback.organizare_jira_zephyr_plus,
feedback.organizare_jira_zephyr_minus,
feedback.test_cases_plus,
feedback.test_cases_minus,
feedback.defects_plus,
feedback.defects_minus,
feedback.traceability_plus,
feedback.traceability_minus,
feedback.acordat
FROM `feedback` 
LEFT JOIN `cursanti` ON `feedback`.`id_cursant`=`cursanti`.`id`
LEFT JOIN `cursuri` ON `feedback`.`id_curs`=`cursuri`.`id`
LEFT JOIN `curs_main` ON `cursuri`.`parent`=`curs_main`.`id_curs_main`
LEFT JOIN `trainer_curs` ON `cursuri`.`id`=`trainer_curs`.`id_curs`
LEFT JOIN `trainer` ON `trainer`.`id`=`trainer_curs`.`id_trainer`
WHERE `feedback`.`link`='".$id."'";
$query=mysqli_query($link,$sql);
if (mysqli_num_rows($query)>0) {
$row=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Feedback participare pentru <?php echo $row['nume'];?> <?php echo $row['prenume'];?></title>
<base href="https://www.academiatestarii.ro">
<!-- Favicons -->
<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/css-plugin-collections.css" rel="stylesheet"/>
<!-- Academia Testarii CSS | Style css -->
<link href="css/style.css" rel="stylesheet" type="text/css"> 
<!-- CSS | Academia Testarii -->
<link href="css/colors/academia-testarii.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Fondamento&display=swap" rel="stylesheet"> 
<script type='application/ld+json'>{"@context":"https://schema.org","@type":"Organization","url":"https://www.academiatestarii.ro/","sameAs":["https://www.facebook.com/academiatestarii/","https://www.linkedin.com/company/18151104/"],"@id":"https://www.academiatestarii.ro/#organization","name":"Academia Testarii","logo":"https://www.academiatestarii.ro/images/logo-academia-testarii.png"}</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '347879355772596'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=347879355772596&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
</head>

<body class="wrapper-feedback">

<br />

<div id="wrapper" class="container">
<div class="main-content">
<div class="row">
<div class="col-md-12">

<div class="panel panel-success">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-4">
				<img src="images/logo-academia-testarii.png" alt="Logo AT" />
			</div>
			<div class="col-md-8 text-center text-feedback">
				<strong>Feedback curs:</strong> <?php echo $row['titlu_main'];?><br />
				<strong>Student:</strong> <?php echo $row['nume'];?> <?php echo $row['prenume'];?><br />
				<strong>Perioada curs:</strong> <?php echo strftime("%e %B %Y", strtotime($row['start_inscriere']));?> - <?php echo strftime("%e %B %Y", strtotime($row['end_inscriere']));?><br />
				<strong>Trainer:</strong> <?php echo $row['trainer'];?><br />
				<strong>Scor general:</strong> <?php echo $row['scor']*10;?>%
			</div>
		</div>
	</div>
	
<div class="parte">
<div class="row m-sm" style="padding:15px;">
	<div class="col-md-12 text-center"><h3>Organizare Jira & Zephyr</h3></div>
	<div class="bg-muted">
		<div class="col-md-6 text-left"><h4>Good points</h4><p><?php echo $row['organizare_jira_zephyr_plus'];?></p></div>
		<div class="col-md-6 text-right"><h4>To improve</h4><p><?php echo $row['organizare_jira_zephyr_minus'];?></p></div>
	</div>
</div>
</div>

<div class="parte">
<div class="row m-sm" style="padding:15px;">
	<div class="col-md-12 text-center"><h3>Test cases</h3></div>
	<div class="bg-muted">
		<div class="col-md-6 text-left"><h4>Good points</h4><p><?php echo $row['test_cases_plus'];?></p></div>
		<div class="col-md-6 text-right"><h4>To improve</h4><p><?php echo $row['test_cases_minus'];?></p></div>
	</div>
</div>
</div>

<div class="parte">
<div class="row m-sm" style="padding:15px;">
	<div class="col-md-12 text-center"><h3>Defects</h3></div>
	<div class="bg-muted">
		<div class="col-md-6 text-left"><h4>Good points</h4><p><?php echo $row['defects_plus'];?></p></div>
		<div class="col-md-6 text-right"><h4>To improve</h4><p><?php echo $row['defects_minus'];?></p></div>
	</div>
</div>
</div>

<div class="parte">
<div class="row m-sm" style="padding:15px;">
	<div class="col-md-12 text-center"><h3>Traceability</h3></div>
	<div class="bg-muted">
		<div class="col-md-6 text-left"><h4>Good points</h4><p><?php echo $row['traceability_plus'];?></p></div>
		<div class="col-md-6 text-right"><h4>To improve</h4><p><?php echo $row['traceability_minus'];?></p></div>
	</div>
</div>
</div>

</div>
</div>

</div>
</div>
</div>
<div id="wrapper" class="container text-center">
<br />
<a class="btn btn-colored btn-block btn-theme-colored2 text-white btn-lg btn-flat" href="certificat.php?id=<?php echo $id;?>">Certificat absolvire</a>
<br /><br />
</div>
<br /><br />
<?php include ("tracking.php");?>
</body>
</html>
<?php } } ?>