<!-- Made by: DanielM 2019 --> 
<?php 
session_start();
include("__connect.php");
if(isset($_SESSION['key_admin']) && $_SESSION['key_admin']==session_id()) {$membru=true;include("useract.php");} else {$membru=false;}
$page="multumim";

if (isset($_GET['curs']) && is_numeric($_GET['curs'])) { 
	$curs=trim(mysqli_real_escape_string($link,$_GET['curs']));
	$sql="SELECT * FROM `cursuri` 
	LEFT JOIN `curs_main` ON `cursuri`.`parent`=`curs_main`.`id_curs_main`
	WHERE `id`=".$curs;
	$query=mysqli_query($link,$sql);
	if (mysqli_num_rows($query)>0) {
		$cursactiv=mysqli_fetch_assoc($query);
		$valoare=$cursactiv['pret'];
		$nume=$cursactiv['titlu_main'];
		$data=$cursactiv['start_inscriere'];
	} else {
		header("Location:cursuri.php");	
	}
} else {
	header("Location:cursuri.php");	
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="ro">
<head>
<!-- Page Title -->
<title>Academia Testării:: Mulțumim</title>
<base href="https://www.academiatestarii.ro">
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Academia Testarii e despre atenţia la detalii. Oferim cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing." />
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
<meta property="og:title" content="Academia Testării:: Mulțumim" />
<meta property="og:author" content="@academiatestarii" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.academiatestarii.ro/multumim.php" />
<meta property="og:image:alt" content="Cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing." />
<meta property="og:image" content="https://www.academiatestarii.ro/images/contact-og.jpg" />
<meta property="og:image:width" content="1195" />
<meta property="og:image:height" content="963" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:description" content="Academia Testarii e despre atenţia la detalii. Oferim cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing." /> 
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
              <h2 class="title text-white">Mulţumim pentru înregistrare!</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Divider: Contact -->
    <section class="divider bg-lighter">
      <div class="container">
	  <h2 class="mt-0 text-theme-colored">Ti-am rezervat un loc în clasă.</h2>
        <div class="row">
			<div class="col-md-12">
				<p>Pentru a finaliza înscrierea, te rugăm să faci plata, conform modalității de plată aleasă (integral / in rate), in contul <strong>RO42 INGB 0000 9999 0985 9526</strong>. Te rugăm sa mentionezi în detaliile de plata, persoana pentru care se face plata.<p>
				<p>Pentru a intra în <a href="contul_tau.php#sectiuneaCursuri">contul tău</a> de pe platforma Academia Testării trebuie mai întâi să activezi contul dând clik pe linkul pe care l-am trimis pe adresa de email cu care te-ai înregistrat.</p>
				<p>Am setat o parola temporară pentru tine pe care o poți schimba dupa ce activezi contul.</p>
				<p>Daca ai activat deja contul poti intra in <a href="contul_tau.php#sectiuneaCursuri">contul tău</a> unde vei găsi informații si materiale pentru cursurile la care te-ai inregistrat, poți schimba datele personale si poți descărca certificatele de absolivire.</p>
				<p><strong>Iți mulțumim,<br>Echipa Academia Testării.</strong></p>
			</div>
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
<?php include ("tracking.php");?>
<script>
    fbq('track', 'Lead', {
        content_name: '<?php echo $nume;?>',
        value: <?php echo $valoare;?>,
        currency: 'RON'
    });
</script>
<script>
	gtag('event', 'inscrie-te pagina formular', {
	  'event_category' : 'initiate lead',
	  'event_label' : '<?php echo $nume;?>',
	  'event_value' : '<?php echo $valoare;?>',
	  'event_date' : '<?php echo $data;?>',
	  'currency': 'RON'
	});
</script>
</body>
</html>