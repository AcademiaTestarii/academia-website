<!-- Made by: DanielM 2019 -->
<?php
session_start();
include("__connect.php");
if (isset($_SESSION['key_admin']) && $_SESSION['key_admin'] == session_id()) {
  $membru = true;
  include("useract.php");
} else {
  $membru = false;
}
$page = "despre";
?>
<!DOCTYPE html>
<html dir="ltr" lang="ro">

<head>
  <!-- Page Title -->
  <title>Academia Testării:: Despre Noi</title>
  <base href="https://www.academiatestarii.ro">
  <!-- Meta Tags -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Echipa Academia Testării: conectata la cele mai recente tendințe, practici, tehnologii și industrie instrumente, avem o vastă experiență în zonă, adunate prin aplicare practică în procesul de dezvoltare timp de aproape 20 de ani." />
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
  <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- Open Graph data -->
  <meta property="og:title" content="Academia Testării:: Despre Noi" />
  <meta property="og:author" content="@academiatestarii" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="/despre-noi.php" />
  <meta property="og:image:alt" content="Cunoaste echipa." />
  <meta property="og:image" content="/images/despre-og.jpg" />
  <meta property="og:image:width" content="1195" />
  <meta property="og:image:height" content="963" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:description" content="Echipa Academia Testării: conectata la cele mai recente tendințe, practici, tehnologii și industrie instrumente, avem o vastă experiență în zonă, adunate prin aplicare practică în procesul de dezvoltare timp de aproape 20 de ani." />
  <meta property="og:site_name" content="Academia Testării" />

  <!-- Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
  <link href="css/animate.css" rel="stylesheet" type="text/css">
  <link href="css/css-plugin-collections.css" rel="stylesheet" />

  <!-- CSS | menuzord megamenu skins -->
  <link id="menuzord-menu-skins" href="css/menuzord-skins/menu-academia-testarii.css" rel="stylesheet" />
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
  <link href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css" />
  <link href="js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css" />
  <link href="js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css" />
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
  <script type='application/ld+json'>
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "/",
      "sameAs": ["https://www.facebook.com/academiatestarii/", "https://www.linkedin.com/company/18151104/"],
      "@id": "/#organization",
      "name": "Academia Testarii",
      "logo": "/images/logo-academia-testarii.png"
    }
  </script>

  <!-- Facebook Pixel Code -->
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '347879355772596');
    fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" src="https://www.facebook.com/tr?id=347879355772596&ev=PageView
&noscript=1" />
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
      <?php include("include.top.header.php"); ?>
      <?php include("include.top.menu.php"); ?>
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
                <h2 class="title text-white">Despre noi</h2>
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
                <?php $sql = "SELECT * FROM `content` WHERE `id`=2";
                $query = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($query); ?>
                <h2 class="mt-0 text-theme-colored"><?php echo $row['title']; ?></h2>
                <?php echo $row['text']; ?>

                <?php $sql_sub = "SELECT * FROM `subcontent` WHERE `content_id`=" . $row['id'];
                $query_sub = mysqli_query($link, $sql_sub);
                if (mysqli_num_rows($query_sub) > 0) {
                  while ($row_sub = mysqli_fetch_assoc($query_sub)) {
                    ?>

                    <div class="post mt-20">
                      <div class="row entry-content">
                        <div class="col-md-4">
                          <div class="box-hover-effect play-button">
                            <div class="effect-wrapper">
                              <div class="thumb">
                                <img class="img-fullwidth" src="images/<?php echo $row_sub['image']; ?>" alt="<?php echo $row_sub['title']; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <h3 class="text-uppercase mt-0 mt-sm-30 text-theme-colored"><?php echo $row_sub['title']; ?></h3>
                          <?php echo $row_sub['text']; ?>
                        </div>
                      </div>
                    </div>

                  <?php }
              } ?>

              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Cunoaste echipa -->
      <section class="bg-silver-light">
        <div class="container pb-60">
          <div class="section-title text-center">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h2 class="text-uppercase line-bottom-double-line-centered mt-0">Cunoaste <span class="text-theme-colored2">echipa</span></h2>
                <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati!</p-->
              </div>
            </div>
          </div>
          <div class="section-content">
            <div class="row mtli-row-clearfix">

              <?php $sql_team = "SELECT * FROM `trainer` WHERE `is_staff`=1";
              $query_team = mysqli_query($link, $sql_team);
              while ($row_team = mysqli_fetch_assoc($query_team)) { ?>

                <div class="col-xs-12 col-sm-6 col-md-4 sm-text-center mb-30 mb-sm-30">
                  <div class="team-block service-box maxwidth400">
                    <div class="team-thumb">
                      <img class="img-fullwidth" alt="" src="images/<?php echo $row_team['picture']; ?>">
                      <div class="team-overlay">
                        <h3 class="text-white"><?php echo $row_team['title']; ?></h3>
                        <ul class="list-inline text-white font-16 mb-10">
                          <li><i class="fa fa-phone text-theme-colored2 mr-10" aria-hidden="true"></i>Tel: <?php echo $row_team['phone']; ?></li>
                          <li><i class="fa fa-envelope-o text-theme-colored2 mr-10" aria-hidden="true"></i>Email: <?php echo $row_team['email']; ?></li>
                        </ul>
                      </div>
                    </div>
                    <div class="team-bottom-part text-center">
                      <h4 class="text-uppercase text-theme-colored2"><?php echo $row_team['name']; ?></h4>
                      <ul class="styled-icons icon-dark icon-theme-colored icon-circled icon-sm">
                        <li><a href="<?php echo $row_team['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>

              <?php } ?>


            </div>
          </div>
        </div>
      </section>

      <!-- end main-content -->
    </div>

    <!-- Footer -->
    <footer id="footer" class="footer" data-bg-img="images/footer-bg.png" data-bg-color="#020443">

      <?php include("include.footer.php"); ?>

      <?php include("include.subfooter.php"); ?>

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
  <?php include("tracking.php"); ?>
</body>

</html>
