<?php
session_start();
include("__connect.php");
if(isset($_SESSION['key_admin']) && $_SESSION['key_admin']==session_id()) {$membru=true;include("useract.php");} else {$membru=false;}
$page="inscriere-curs";
if (isset($_GET['curs']) && is_numeric($_GET['curs'])) {
	$curs=trim(mysqli_real_escape_string($link,$_GET['curs']));
$sql="SELECT * FROM `classes`
LEFT JOIN `main_classes` ON `classes`.`main_class_id`=`main_classes`.`id`
WHERE `classes.id`=".$curs;
$query=mysqli_query($link,$sql);
$cursactiv=mysqli_fetch_assoc($query);
$set=true;
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="ro">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Academia Testarii:: Formular inscriere curs" />
<meta name="keywords" content="" />

<!-- Page Title -->
<title>Academia Testarii:: Formular inscriere curs <?php echo $cursactiv['main_classes.title'];?></title>
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

<!-- Open Graph data -->
<meta property="og:title" content="Academia Testării: Formular inscriere curs" />
<meta property="og:author" content="@academiatestarii" />
<meta property="og:type" content="website" />
<meta property="og:url" content="/inscriere-curs.php" />
<meta property="og:image:alt" content="Cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing." />
<meta property="og:image" content="/images/cursuri-og.jpg" />
<meta property="og:image:width" content="1195" />
<meta property="og:image:height" content="963" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:description" content="Academia Testarii e despre atenţia la detalii. Oferim cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing" />
<meta property="og:site_name" content="Academia Testării" />

<!-- Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/css-plugin-collections.css" rel="stylesheet"/>

<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="css/menuzord-skins/menu-academia-testarii.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<!-- Academia Testarii CSS | Style css -->
<link href="css/style.css" rel="stylesheet" type="text/css">
<!-- Revolution Slider 5.x CSS settings -->
<link  href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>
<!-- CSS | Academia Testarii -->
<link href="css/colors/academia-testarii.css" rel="stylesheet" type="text/css">
<!-- external javascripts -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection -->
<script src="js/jquery-plugin-collection.js"></script>
<!-- Revolution Slider 5.x SCRIPTS -->
<script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
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
<body class="" id="up">
<div id="wrapper" class="clearfix">
<!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <div class="preloader-orbit-loading">
        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
      </div>
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Treci peste preloader</div>
  </div>

<!-- Header -->
  <header id="header" class="header modern-header modern-header-white">
<?php include ("include.top.header.php");?>
<?php include ("include.top.menu.php");?>
  </header>

<!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="images/Picture2.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Formular inscriere curs <br /><?php echo $cursactiv['main_classes.title'];?></h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Have Any Question -->
    <section class="divider">
      <div class="container pt-60 pb-60">
		<h2 class="mt-0 text-theme-colored">Te rugăm să completezi acest formular pentru a te înscrie la cursurile organizate de Academia Testării:</h2>
<?php if (!$membru) { ?>
		<p>După ce completezi acest formular vei primi un mesaj de confirmare pe email. In acest mesaj vei primi deasemenea și instrucţiuni pentru activarea contului tău de pe platforma Academia Testării unde vei putea consulta materiale pentru curs precum și alte informaţii care privesc relaţia dintre Academia Testării și tine.</p><p>Dacă ai deja cont pe platforma Academia Testării, te rugăm să <strong><a href="ajax-load/login-form.html" class="ajaxload-popup text-theme-colored">intri în contul tău</a></strong> pentru a te înscrie la cursuri.</p>
<?php } else { ?>
		<p>Avem nevoie de datele tale personale (Nume, Adresa, Localitate, etc pentru facturare). Te rugăm să completezi datele personale în <strong><a href="contul_tau.php#sectiuneaDate" class="text-theme-colored">contul tău</a></strong>, apoi să revi la formularul de înscriere.</p>
		<p>Dacă ai toate datele completate, atunci te poţi înscrie la cursuri selectând modulul dorit din partea de jos a formularului.</p>
<?php } ?>
	  <hr />
        <div class="section-content post">
		<form id="inscriere_curs" name="inscriere_curs" class="reservation-form" method="post" action="includes/inscriere-curs.php" novalidate="novalidate">
          <div class="row entry-content">
            <div class="col-sm-12 col-md-3">
				<div class="form-group">
                    <label>Nume <small>*</small></label>
					<?php if ($membru) { ?>
					<input name="nume" class="form-control" type="text" value="<?php echo $row_userlogat['last_name'];?>" readonly>
					<?php } else { ?>
                    <input name="nume" class="form-control" type="text" placeholder="Nume" minlength="3" required="">
					<?php } ?>
				</div>
            </div>
            <div class="col-sm-12 col-md-3">
				<div class="form-group">
                    <label>Prenume <small>*</small></label>
					<?php if ($membru) { ?>
					<input name="prenume" class="form-control" type="text" value="<?php echo $row_userlogat['first_name'];?>" readonly>
					<?php } else { ?>
                    <input name="prenume" class="form-control" type="text" placeholder="Prenume" minlength="3" required="">
					<?php } ?>
				</div>
            </div>
            <div class="col-sm-12 col-md-3">
				<div class="form-group">
                    <label>Email <small>*</small></label>
					<?php if ($membru) { ?>
					<input name="email" class="form-control" type="email" value="<?php echo $row_userlogat['email'];?>" readonly>
					<?php } else { ?>
                    <input name="email" class="form-control" type="email" placeholder="Email" minlength="5" required="">
					<?php } ?>
				</div>
            </div>
            <div class="col-sm-12 col-md-3">
				<div class="form-group">
                    <label>Data naștere</label>
					<?php if ($membru) { ?>
					<input name="data_nastere" class="form-control" type="date" value="<?php echo $row_userlogat['date_of_birth'];?>" readonly>
					<?php } else { ?>
                    <input name="data_nastere" class="form-control" type="date" minlength="10" placeholder="Data naștere">
					<?php } ?>
				</div>
            </div>
          </div>

		  <div class="row entry-content">
            <div class="col-sm-12 col-md-4">
				<div class="form-group">
                    <label>Adresă <small>*</small></label>
					<?php if ($membru) { ?>
					<input name="adresa" class="form-control" type="text" value="<?php echo $row_userlogat['address'];?>" readonly>
					<?php } else { ?>
                    <input name="adresa" class="form-control" type="text" placeholder="O folosim pentru factură" minlength="10" required="">
					<?php } ?>
				</div>
            </div>
            <div class="col-sm-12 col-md-4">
				<div class="form-group">
                    <label>Localitate <small>*</small></label>
					<?php if ($membru) { ?>
					<input name="localitate" class="form-control" type="text" value="<?php echo $row_userlogat['city'];?>" readonly>
					<?php } else { ?>
                    <input name="localitate" class="form-control" type="text" placeholder="O folosim pentru factură" minlength="3" required="">
					<?php } ?>
				</div>
            </div>
            <div class="col-sm-12 col-md-4">
				<div class="form-group">
                    <label>Judet <small>*</small></label>
					<?php if ($membru) { ?>
					<input name="judet" class="form-control" type="text" value="<?php echo $row_userlogat['county'];?>" readonly >
					<?php } else { ?>
                    <input name="judet" class="form-control" type="text" placeholder="Îl folosim pentru factură" minlength="3" required="">
					<?php } ?>
				</div>
            </div>

          </div>
		  <hr />

		  <div class="row entry-content">
            <div class="col-sm-12 col-md-4">
				<div class="form-group">
                    <label>Profesie actuală</label>
					<?php if ($membru) { ?>
					<input name="profesie" class="form-control" type="text" value="<?php echo $row_userlogat['job_title'];?>" readonly>
					<?php } else { ?>
                    <input name="profesie" class="form-control" type="text" placeholder="Profesie actuală">
					<?php } ?>
				</div>
            </div>
            <div class="col-sm-12 col-md-4">
				<div class="form-group">
                    <label>Telefon <small>*</small></label>
					<?php if ($membru) { ?>
					<input name="telefon" class="form-control" type="text" value="<?php echo $row_userlogat['phone'];?>" readonly>
					<?php } else { ?>
                    <input name="telefon" class="form-control" type="text" placeholder="Telefon" minlength="10" required="">
					<?php } ?>
				</div>
            </div>
            <div class="col-sm-12 col-md-4">
				<div class="form-group">
                    <label>Educaţie</label>
					<?php if ($membru) { ?>
					<input name="educatie" class="form-control" type="text" value="<?php echo $row_userlogat['education'];?>" readonly>
					<?php } else { ?>
                    <input name="educatie" class="form-control" type="text" placeholder="Educaţie">
					<?php } ?>
				</div>
            </div>
          </div>
		  <hr />

		  <div class="row entry-content">
            <div class="col-sm-12 col-md-3">
				<div class="form-group">
                    <label>Cunostinţe limba Engleză</label>

					<select name="engleza" class="form-control">
						<option value="fără">-- fără --</option>
						<option value="Incepător">Incepător</option>
						<option value="Mediu">Mediu</option>
						<option value="Avansat">Avansat</option>
					</select>

				</div>
            </div>
			<div class="col-sm-12 col-md-3">
				<div class="form-group">
                    <label>Cunostinţe altă limbă străină </label>
					<?php if ($membru) { ?>
					<input name="alta_limba" class="form-control" type="text" value="<?php echo $row_userlogat['other_language'];?>" readonly >
					<?php } else { ?>
                    <input name="alta_limba" class="form-control" type="text" placeholder="Cunostinţe altă limbă străina">
					<?php } ?>
				</div>
            </div>
            <div class="col-sm-12 col-md-3">
				<div class="form-group">
                    <label>Cunostinţe MS  Office</label>

					<select name="ms_office" class="form-control">
						<option value="fără">-- fără --</option>
						<option value="Incepător">Incepător</option>
						<option value="Mediu">Mediu</option>
						<option value="Avansat">Avansat</option>
					</select>

				</div>
            </div>
			<div class="col-sm-12 col-md-3">
				<div class="form-group">
                    <label>Cunostinţe Web</label>

					<select name="web" class="form-control">
						<option value="fără">-- fără --</option>
						<option value="Incepător">Incepător</option>
						<option value="Mediu">Mediu</option>
						<option value="Avansat">Avansat</option>
					</select>

				</div>
            </div>
          </div>
		  <hr />

		  <div class="row entry-content">
            <div class="col-sm-12 col-md-6">
				<div class="form-group">
                    <label>Modulul dorit <small>*</small></label>
						<select id="curs" class="form-control" name="curs">
							<option value="--">-- alege curs --</option>
<?php
$sql_cursuri="SELECT * FROM `main_classes` WHERE `is_active`=1 ORDER BY `order` ASC";
$query_cursuri=mysqli_query($link,$sql_cursuri);
$disabled="";
while ($row_cursuri=mysqli_fetch_assoc($query_cursuri)) { ?>
							<optgroup label="<?php echo str_replace("<br />","",$row_cursuri['title']);?>">
<?php
$sql_cursuri2="SELECT * FROM `classes` WHERE `main_class_id`=".$row_cursuri['id']." AND `registration_start_date`>NOW() ORDER BY `registration_start_date` ASC LIMIT 2";
$query_cursuri2=mysqli_query($link,$sql_cursuri2);
while ($row_cursuri2=mysqli_fetch_assoc($query_cursuri2)) {
$disabled="";
if ($membru) {
$cursuriSql=mysqli_query($link,"SELECT * FROM `class_students` WHERE `student_id`=".$row_userlogat['id']." AND `class_id`=".$row_cursuri2['id']);
if (mysqli_num_rows($cursuriSql)>0) {$inscris=true;$disabled="disabled";} else {$inscris=false;$disabled="";}
}
$activ="";
if ($row_cursuri2['id']==$cursactiv['id']) {$activ="selected";}
echo $row_cursuri2['id']."--".$cursactiv['id'];
?>
								<option <?php echo $activ;?> <?php echo $disabled;?> value="<?php echo $row_cursuri2['id'];?>"><?php if ($row_cursuri2['registration_start_date']!="0000-00-00") { echo strftime("%e %B %Y", strtotime($row_cursuri2['registration_start_date']))." - ".strftime("%e %B %Y", strtotime($row_cursuri2['registration_end_date']));} else {echo "TBA";}?> <?php if ($inscris) {echo " -- Esti înscris la acest curs.";};?></option>
<?php } ?>
							</optgroup>
<?php } ?>
						</select>
				</div>
            </div>
			<div class="col-sm-12 col-md-2">
				<div class="form-group">
                    <label>Modalitate plată <small>*</small></label><br />
					<label class="radio-inline">
                    <input type="radio" name="modalitate_plata" id="inlineRadio0" value="banca" checked="">
                    Virament bancar </label>
				</div>
            </div>
			<div class="col-sm-12 col-md-4">
				<div class="form-group">
				<label>Tip plată <small>*</small></label><br />
                <label class="radio-inline">
                    <input type="radio" name="tip_plata" id="inlineRadio1" value="integral" checked="">
                    Integral </label>
                <label class="radio-inline">
                    <input type="radio" name="tip_plata" id="inlineRadio2" value="doua_rate">
                    Două rate </label>
                <label class="radio-inline">
                    <input type="radio" name="tip_plata" id="inlineRadio3" value="trei_rate">
                    Trei rate </label>
                </div>
            </div>

          </div>
		  <hr />

		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="form-check">
					<input class="form-check-input" id="termeni_site" type="checkbox" name="termeni_site" value="">
					<label class="form-check-label"><a data-toggle="modal" data-target=".bs-example-modal-lg">Sunt de acord cu Termenii și Condițiile site-ului.</a></label>
				</div>
			</div>
<?php if ($set) { ?>
			<div class="col-sm-12 col-md-12">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="conditii_minime" value="">
					<label class="form-check-label">Am citit și îndeplinesc condițiile minime ale cursului</label>
				</div>
			</div>
<?php } ?>
			<div class="col-sm-12 col-md-12">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="newsletter" value="" checked="checked">
					<label class="form-check-label">Doresc sa primesc noutați prin email</label>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 text-center">
			<?php
			$inscrisdeja=false;
			if ($membru) {
			$cursuriSql=mysqli_query($link,"SELECT * FROM `class_students` WHERE `student_id`=".$row_userlogat['id']." AND `class_id`=".$curs);
				if (mysqli_num_rows($cursuriSql)>0) {$inscrisdeja=true;} else {$inscrisdeja=false;}
			}?>
			<?php if ($inscrisdeja) { ?>
				<h4>Ești deja înscris la acest curs.</h4>
				<a href="contul_tau.php#sectiuneaCursuri" class="btn btn-dark btn-theme-colored"><i class="fa fa-user-o"></i> Verifică informaţiile în contul tău.</a>
			<?php } else { ?>
				<button id="submitBtn" type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Asteapta putin..." disabled="disabled">Înscrie-te la curs</button>
			<? } ?>
			</div>
		</div>
		<input name="cursant" class="form-control" value="<?php echo $row_userlogat['id'];?>" type="hidden">
		<input name="numecurs" class="form-control" value="<?php echo $cursactiv["main_classes.title"]." - ".$cursactiv["classes.title"];?>" type="hidden">
		<input name="datacurs" class="form-control" value="<?php echo $cursactiv["registration_start_date"];?>" type="hidden">
		<input name="cost" class="form-control" value="<?php echo $cursactiv['price'];?>" type="hidden">
		<input name="form_botcheck" class="form-control" value="" type="hidden">
		<input name="action" class="form-control" value="inscriere_curs" type="hidden">
		</form>

<script type="text/javascript">
$("#inscriere_curs").validate({
  submitHandler: function(form) {
	var form_btn = $(form).find('button[type="submit"]');
	var form_result_div = '#form-result';
	$(form_result_div).remove();
	form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
	var form_btn_old_msg = form_btn.html();
	form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
	$(form).ajaxSubmit({
	  dataType:  'json',
	  success: function(data) {
		console.log(data);
		if( data.status == 'true' ) {
			var id_curs=data.curs;
		  $(form).find('.form-control').val('');
		  location.href = "multumim.php?curs=" + id_curs;
		}
		form_btn.prop('disabled', false).html(form_btn_old_msg);
		$(form_result_div).html(data.message).fadeIn('slow');
		setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
	  }
	});
  }
});
</script>

        </div>
      </div>
    </section>

  <!-- end main-content -->
  </div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Inchide"><span aria-hidden="true">&times;</span></button>
	</div>
<div class="pl-50 pr-50 pb-50">
<?php
$sql_termeni="SELECT * FROM `content` WHERE id=6";
$termeni=mysqli_fetch_assoc(mysqli_query($link,$sql_termeni));
?>

<h2 class="modal-title" id="myModalLabel2"><?php echo $termeni['title'];?></h2>
<hr />
<?php echo $termeni['text'];?>
</div>
    </div>
  </div>
</div>

  <!-- Footer -->
  <footer id="footer" class="footer" data-bg-img="images/footer-bg.png" data-bg-color="#020443">

<?php include("include.footer.php");?>

<?php include("include.subfooter.php");?>

  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
<script>
$(document).ready(function() {
    var the_terms = $("#termeni_site");
    the_terms.click(function() {
        if ($(this).is(":checked")) {
            $("#submitBtn").removeAttr("disabled");
        } else {
            $("#submitBtn").attr("disabled", "disabled");
        }
    });
});
</script>
<?php include ("tracking.php");?>
</body>
</html>