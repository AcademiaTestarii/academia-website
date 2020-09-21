<!-- Made by: DanielM 2019 --> 
<?php
session_start();
include("__connect.php");
if(isset($_SESSION['key_admin']) && $_SESSION['key_admin']==session_id()) {$membru=true;include("useract.php");} else {$membru=false;}
$page="firme";
?>
<!DOCTYPE html>
<html dir="ltr" lang="ro">
<head>
<!-- Page Title -->
<title>Academia Testarii:: Pentru companii</title>
<base href="https://www.academiatestarii.ro">
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Academia Testarii:: Pentru companii" />
<meta name="keywords" content="" />

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
<meta property="og:title" content="Academia Testarii:: Pentru companii" />
<meta property="og:author" content="@academiatestarii" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.academiatestarii.ro/pentru-companii.php" />
<meta property="og:image:alt" content="Cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing." />
<meta property="og:image" content="https://www.academiatestarii.ro/images/companii-og.jpg" />
<meta property="og:image:width" content="1195" />
<meta property="og:image:height" content="963" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:description" content="DACĂ VĂ DOARE CEVA, DAR NU ŞTIŢI EXACT CE... vă propunem soluții complete și integrate de testare software care să maximizeze investiția şi să reducă riscurile tehnice." /> 
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
              <h2 class="title text-white">Pentru companii</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- Section: Cursuri-->
    <section class="inside">
      <div class="container">
        <div class="section-content">
          <div class="row features-style1">
            <div class="col-md-12">
			<?php $sql="SELECT * FROM `content` WHERE `id`=4"; $query=mysqli_query($link,$sql); $row=mysqli_fetch_assoc($query);?>
              <h2 class="mt-0 text-theme-colored"><?php echo $row['title'];?></h2>
			<?php echo $row['text'];?>
			<br />
		</div>
		<div class="col-md-12">
		</div>
        <div class="col-md-12">
            <div class="vertical-tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
<?php 	
	$sub=mysqli_query($link,"SELECT * FROM `subcontent` WHERE `content_id`=4");
	$i=1;
	while ($rowsub=mysqli_fetch_assoc($sub)) {
?>
                    <li role="presentation" <?php if ($i==1) { echo'class="active"';}?>><a href="#Section<?php echo $i;?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $rowsub['title'];?></a></li>
<?php $i++; }?>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabs">
<?php 	
	$sub=mysqli_query($link,"SELECT * FROM `subcontent` WHERE `content_id`=4");
	$i=1;
	while ($rowsub=mysqli_fetch_assoc($sub)) {
?>
                    <div role="tabpanel" class="tab-pane fade <?php if ($i==1) { echo'in active';}?>" id="Section<?php echo $i;?>">
                        <h3><?php echo $rowsub['title'];?></h3>
                        <?php echo $rowsub['text'];?>
                    </div>
<?php $i++; }?>
                </div>
            </div>
        </div>
            
          </div>
        </div>
      </div>
    </section>

<!-- Divider: Call To Action -->
    <section class="divider parallax layer-overlay overlay-theme-colored-2" data-bg-img="images/slider3.jpg" data-parallax-ratio="0.7">
      <div class="container">
        <div class="row">
          <div class="call-to-action pt-20 pb-10">
            <!-- Reservation Form Start-->
            <form id="reservation_form" name="reservation_form" class="reservation-form mb-0" method="post" action="includes/reservation.php">
              <div class="col-md-10">
                <h2 class="text-white border-bottom mt-0 mb-10">Să discutăm <span class="text-theme-colored2">detaliile</span></h2>
                <p class="text-white mt-0">În funcţie de specificul nevoilor fiecărui client, detaliile logistice, programa sau costul sunt stabilite împreună. Spune-ne mai multe la <a href="mailto:contact@academiatestarii.ro">contact@academiatestarii.ro</a>. Noi suntem încântaţi să îți răspundem.</p>
                <h4 class="text-white mt-20 mb-10">Sau folosește formularul de mai jos.</h4>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group mb-15">
                  <input name="email" class="form-control email" type="email" minlength="5" pattern=".+@+.+." size="30" required="" placeholder="Adresa email">
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group mb-15">
                  <input placeholder="Mesaj" type="text" id="mesaj" name="mesaj" minlength="10" class="form-control" required="">
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-2">
                <div class="form-group mb-15 mt-0">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <button type="submit" class="btn text-white btn-lg btn-flat btn-theme-colored2 form-control" data-loading-text="Asteptati putin..." onClick="fbq('track', 'Contact');">Trimite acum</button>
                </div>
              </div>
            </form>
            <!-- Reservation Form End-->

            <!-- Reservation Form Validation Start-->
            <script type="text/javascript">
              $("#reservation_form").validate({
                submitHandler: function(form) {
                  var form_btn = $(form).find('button[type="submit"]');
                  var form_result_div = '#form-result';
                  $(form_result_div).remove();
                  form_btn.after('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                  var form_btn_old_msg = form_btn.html();
                  form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                  $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                      if( data.status == 'true' ) {
                        $(form).find('.form-control').val('');
                      }
                      form_btn.prop('disabled', false).html(form_btn_old_msg);
                      $(form_result_div).html(data.message).fadeIn('slow');
                      setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                    }
                  });
                }
              });
            </script>
            <!-- Reservation Form Validation Start -->
          </div>
        </div>
      </div>
    </section>

  <!-- end main-content -->
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
 /* $(function () {
	$( ".inside li" ).prepend( "<i class=\"fa fa-arrow-right\"></i>" );
  });*/
</script>
<?php include ("tracking.php");?>
</body>
</html>