<?php
session_start();
include("__connect.php");
if(isset($_SESSION['key_admin']) && $_SESSION['key_admin']==session_id()) {$membru=true;include("useract.php");} else {$membru=false;}
$page="despre";
?>
<!DOCTYPE html>
<html dir="ltr" lang="ro">
<head>
<!-- Page Title -->
<title>Academia Testării:: Termeni si Conditii</title>
<base href="<?php echo $_SERVER['SERVER_NAME'];?>>">
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Academia Testării:: Termeni si Conditii" />
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
<meta property="og:title" content="Academia Testării:: Termeni si Conditii" />
<meta property="og:author" content="@academiatestarii" />
<meta property="og:type" content="website" />
<meta property="og:url" content="/" />
<meta property="og:image:alt" content="Cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing." />
<meta property="og:image" content="/images/academia.jpg" />
<meta property="og:image:width" content="1195" />
<meta property="og:image:height" content="963" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:description" content="Acești termeni și condiții reprezintă o declarație completă a acordului dintre părți și înlocuiesc toate discuțiile, corespondența și reprezentările anterioare." />
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
 <!--   <div id="disable-preloader" class="btn btn-default btn-sm">Treci peste preloader</div>-->
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
              <h2 class="title text-white">Termeni şi condiţii</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- Section: Despre noi-->
    <section class="inside">
      <div class="container">
        <div class="section-content">
          <div class="row features-style1">
            <div class="col-md-12">

              <h2 class="mt-0 text-theme-colored">Termeni şi condiţii</h2>
<hr />
<h4><b>TAXA DE ÎNSCRIERE</b></h4>
<p>Taxa de înscriere este datorată de catre client si trebuie plătită cu, cel târziu, șapte (7) zile înainte de data începerii cursului.</p>
<p>Taxa de înscriere include instruirea, materialele de curs, utilizarea software-ului, calculatoarelor și a altor materiale tehnice necesare desfăşurării cursului.</p>
<p>Taxa de înscriere nu include cazare, mese, călătorii sau orice alte cheltuieli care ar putea fi suportate de clienții noștri.</p>
<h4><b>PLATA</b></h4>
<p>Plata taxei de inscriere de poate face integral sau in doua transe. Plata se realizeaza prin transfer bancar, in decurs de doua zile lucratoare de la efectuarea inscrierii pe site. In cazul in care termenul nu este respectat, Academia Testarii isi rezerva dreptul de a anula inscrierea.</p>
<h4><b>SUBSTITUŢIILE PERMISE</b></h4>
<p>Salutăm înscrierea unui înlocuitor la cursurile Academia Testării, cu condiția ca titularul să ne notifice în scris înainte de prima zi a cursului. Cu toate acestea, înlocuitorul trebuie să respecte profilul şi deţină cunoştintele obligatorii pentru a urma cursurile Academia Testării.</p>
<h4><b>ANULARE / TRANSFER</b></h4>
<p>Anulările sau transferurile se pot face pentru o rambursare integrală și fără nici o penalizare, cu cel puțin 14 zile înainte de prima zi a cursului. În caz contrar, întreaga taxă de înscriere va fi datorată și plătibilă.</p>
<h4><b>PARTICIPANȚII CU DISABILITĂȚI</b></h4>
<p>Ne angajăm să ajutăm participanții cu dizabilități la curs. La cerere scrisă, cu cel puțin două săptămâni înainte de începerea cursului, vom rezerva un spațiu sau un loc special în sală și / sau vom facilita acţiunile necesare pentru a ajuta orice participant cu dizabilități sau alte nevoi speciale.</p>
<h4><b>SECURITATE</b></h4>
<p>Toți participanții la curs se vor conforma măsurilor de securitate în vigoare la locul cursului, în privinţa cărora vor fi instruiţi în cadrul cursului introductiv.</p>
<h4><b>CUNOȘTINȚELE CURSULUI</b></h4>
<p>Ne rezervăm dreptul de a modifica programul cursurilor, în baza numărului de înscrieri. Vom încerca să oferim clienţilor cât mai multe notificări prealabile cu privire la orice schimbare de acest fel, cu cel putin 14 zile înainte de începerea cursului. În cazul în care clientul nu poate participa la data revizută, vom credita 100% din taxa de înscriere plătită anticipat sau, dacă ni se solicită, vom restitui aceste taxe. Cu toate acestea, nu vom fi răspunzatori pentru niciun fel de alte costuri, incluzând (de exemplu) taxele de călătorie sau orice alte daune.</p>
<h4><b>COPYRIGHT / PROPRIETATE INTELECTUALĂ</b></h4>
<p>Toate drepturile de autor, brevetele, desenele și alte drepturi de proprietate intelectuală din / legate de materialele de curs furnizate sau puse la dispoziție rămân proprietăți ale Academia Testării. Nicio parte a materialelor de curs nu poate fi reprodusă, stocată sau transmisă sub nicio formă, incluzând fotocopiere sau înregistrare. Este de asemenea interzisă traducerea materialelor în orice limbă, fără permisiunea scrisă şi prealabilă a Academia Testării.</p>
<h4><b>GENERAL</b></h4>
<p>Acești termeni și condiții reprezintă o declarație completă a acordului dintre părți și înlocuiesc toate discuțiile, corespondența și reprezentările anterioare.</p>
<p>Broșurile, reclamele, postările Social Media ale Academia Testării sunt doar cu scop informativ și nu au ca scop încheierea unui acord între Academia Testării și destinatarul.</p>
<p>Acești termeni și condiții pot fi modificați fără notificare prealabilă, iar schimbările se vor aplica oricăror înscrieri primite după data schimbării.</p>
<p>Acești termeni și condiții nu pot fi modificați de către o terţă parte, cu excepția unui acord scris semnat de un reprezentant legal al Academia Testării.</p>
<p>Acest acord va fi guvernat de, și interpretat în conformitate cu legislaţia in vigoare.</p>

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
</body>
</html>