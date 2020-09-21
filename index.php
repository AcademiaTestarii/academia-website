<!-- Made by: DanielM 2019 --> 
<?php 
session_start();
include("__connect.php");
if(isset($_SESSION['key_admin']) && $_SESSION['key_admin']==session_id()) {$membru=true;include("useract.php");} else {$membru=false;}
$page="home";
?>
<!DOCTYPE html>
<html dir="ltr" lang="ro">
<head>
<!-- Page Title -->
<title>Academia Testării</title>
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
<meta property="og:title" content="Academia Testării" />
<meta property="og:author" content="@academiatestarii" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.academiatestarii.ro/index.php" />
<meta property="og:image:alt" content="Cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing." />
<meta property="og:image" content="https://www.academiatestarii.ro/images/academia.jpg" />
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
<link id="menuzord-menu-skins" href="/css/menuzord-skins/menu-academia-testarii.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="/css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="/css/responsive.css" rel="stylesheet" type="text/css">
<!-- Academia Testarii CSS | Style css -->
<link href="/css/style.css" rel="stylesheet" type="text/css"> 
<!-- Revolution Slider 5.x CSS settings -->
<link  href="/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>
<!-- CSS | Academia Testarii -->
<link href="/css/colors/academia-testarii.css" rel="stylesheet" type="text/css">
<!-- external javascripts -->
<script src="/js/jquery-2.2.4.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection -->
<script src="/js/jquery-plugin-collection.js"></script>
<!-- Revolution Slider 5.x SCRIPTS -->
<script src="/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
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

<?php include("include.slider.home.php");?>

<!-- Sectiune home start -->
    <section>
      <div class="container" id="what">
        <div class="section-content">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
			<?php $sql="SELECT * FROM `content` WHERE `id`=1"; $query=mysqli_query($link,$sql); $row=mysqli_fetch_assoc($query);?>
              <h2 class="title line-bottom-double-line-centered text-theme-colored"><?php echo $row['title'];?></h2>
			  <div class="mb-50"><?php echo $row['text'];?></div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- END Sectiune home start -->

<!-- Divider: Funfact -->
    <section class="divider parallax layer-overlay overlay-theme-colored-8" data-bg-img="images/Picture2.jpg" data-parallax-ratio="0.7">
      <div class="container">
        <div class="section-content text-center">
          <div class="row">
            <div class="col-md-12">
              <h2 class="mt-0 mb-50 text-white">Activitatea noastra <span class="text-theme-colored2"> in cifre</span></h2>
            </div>
          </div>
        </div>
		<?php 	$sql_activitate="SELECT * FROM `activities` WHERE `id`=1";
				$row_activitate=mysqli_fetch_assoc(mysqli_query($link,$sql_activitate));?>
		
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-smile mt-5 text-theme-colored2"></i>
              <h2 data-animation-duration="2000" data-value="<?php echo $row_activitate['followers'];?>" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">NE URMĂRESC</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-note2 mt-5 text-theme-colored2"></i>
              <h2 data-animation-duration="2000" data-value="<?php echo $row_activitate['classes'];?>" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">Cursuri active</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-users mt-5 text-theme-colored2"></i>
              <h2 data-animation-duration="2000" data-value="<?php echo $row_activitate['graduates'];?>" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">ABSOLVENȚI</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
            <div class="funfact text-center">
              <i class="pe-7s-cup mt-5 text-theme-colored2"></i>
              <h2 data-animation-duration="2000" data-value="<?php echo $row_activitate['recommandations'];?>" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">RECOMANDĂRI </h5>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- END Divider: Funfact -->	
	
<!-- Sectiune ce facem pentru tine -->
    <section>
      <div class="container" id="what">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
			<?php $sql="SELECT * FROM `content` WHERE `id`=3"; $query=mysqli_query($link,$sql); $row=mysqli_fetch_assoc($query);?>
              <h2 class="title line-bottom-double-line-centered text-theme-colored"><?php echo $row['title'];?></h2>
			  <div class="mb-50"><?php echo $row['text'];?></div>
            </div>
          </div>
		  
			<?php 	$sql_sub="SELECT * FROM `subcontent` WHERE `content_id`=".$row['id'];
					$query_sub=mysqli_query($link,$sql_sub);
					if (mysqli_num_rows($query_sub)>0) {
					echo '<div class="row">';	
					while ($row_sub=mysqli_fetch_assoc($query_sub)) {
			?>
          
            <div class="col-md-4">
              <div class="icon-box text-center">
                <a href="cursuri.php" class="icon icon-gray icon-bordered bg-hover-theme-colored icon-circled icon-xl">
                  <i class="fa fa-cubes text-theme-colored font-48"></i>
                </a>
                <h4 class="icon-box-title text-uppercase"><a class="" href="#"><?php echo $row_sub['title'];?></a></h4>
                <?php echo $row_sub['text'];?>
                <!--a class="btn btn-dark btn-default btn-theme-colored2 btn-sm mt-10" href="cursuri.php">Vezi calendarul de cursuri</a-->
              </div>
            </div>
			
			<?php }	echo "</div>"; } ?>   
		  
        </div>
      </div>
    </section>	
<!-- END Sectiune ce facem pentru tine -->
 
<?php include("include.programa.cursuri.php");?>

<?php include("include.testimoniale.absolventi.php");?>

<!-- Sectiune ce facem pentru companii -->
    <section>
      <div class="container" id="what">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
			<?php $sql="SELECT * FROM `content` WHERE `id`=4"; $query=mysqli_query($link,$sql); $row=mysqli_fetch_assoc($query);?>
              <h2 class="title line-bottom-double-line-centered text-theme-colored"><?php echo $row['title'];?></h2>
			  <div class="mb-50"><?php echo $row['text'];?></div>
            </div>
			<div class="col-md-12 text-center">
			<a class="btn btn-dark btn-theme-colored2 mt-10" href="pentru-companii.php">Află mai multe detalii</a>
			</div>
          </div>
        </div>
      </div>
    </section>	
<!-- END Sectiune ce facem pentru companii -->
  

<?php include ("include.parteneri.php");?> 
  
  
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
</body>
</html>