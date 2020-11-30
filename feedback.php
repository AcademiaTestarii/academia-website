<?php
include("__connect.php");
if (isset($_GET['id']) && strlen($_GET['id'])==12 && ctype_alnum($_GET['id'])) {
$id=mysqli_real_escape_string($link,$_GET['id']);
$sql="
SELECT
students.first_name,
students.last_name,
classes.registration_start_date,
classes.registration_end_date,
main_classes.title,
trainer.name as `trainer`,
feedback.grade,
feedback.organizare_jira_zephyr_plus,
feedback.organizare_jira_zephyr_minus,
feedback.test_cases_plus,
feedback.test_cases_minus,
feedback.defects_plus,
feedback.defects_minus,
feedback.traceability_plus,
feedback.traceability_minus,
feedback.granted_on
FROM `feedback`
LEFT JOIN `students` ON `feedback`.`student_id`=`students`.`id`
LEFT JOIN `classes` ON `feedback`.`class_id`=`classes`.`id`
LEFT JOIN `main_classes` ON `classes`.`main_class_id`=`main_classes`.`id`
LEFT JOIN `class_trainers` ON `classes`.`id`=`class_trainers`.`class_id`
LEFT JOIN `trainer` ON `trainer`.`id`=`class_trainers`.`trainer_id`
WHERE `feedback`.`link`='".$id."' and trainer.deleted_at is null AND main_classes.trainer_provider_id = $academiaTestariiTrainerProvider";
$query=mysqli_query($link,$sql);
if (mysqli_num_rows($query)>0) {
$row=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Feedback participare pentru <?php echo $row['last_name'];?> <?php echo $row['first_name'];?></title>
<base href="<?php echo $_SERVER['SERVER_NAME'];?>>">
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
<script type='application/ld+json'>{"@context":"https://schema.org","@type":"Organization","url":"/","sameAs":["https://www.facebook.com/academiatestarii/","https://www.linkedin.com/company/18151104/"],"@id":"/#organization","name":"Academia Testarii","logo":"/images/logo-academia-testarii.png"}</script>

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
				<strong>Feedback curs:</strong> <?php echo $row['main_classes.title'];?><br />
				<strong>Student:</strong> <?php echo $row['last_name'];?> <?php echo $row['first_name'];?><br />
				<strong>Perioada curs:</strong> <?php echo strftime("%e %B %Y", strtotime($row['registration_start_date']));?> - <?php echo strftime("%e %B %Y", strtotime($row['registration_end_date']));?><br />
				<strong>Trainer:</strong> <?php echo $row['trainer'];?><br />
				<strong>Scor general:</strong> <?php echo $row['score']*10;?>%
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