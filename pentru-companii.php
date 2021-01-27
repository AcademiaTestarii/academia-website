<?php
session_start();
include("__connect.php");
if (isset($_SESSION['key_admin']) && $_SESSION['key_admin'] == session_id()) {
  $membru = true;
  include("useract.php");
} else {
  $membru = false;
}
$page = "firme";
?>
<!DOCTYPE html>
<html dir="ltr" lang="ro">

<head>
  <!-- Page Title -->
  <title>Academia Testarii:: Pentru companii</title>
  <!-- Meta Tags -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
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
  <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
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
  <meta property="og:url" content="/pentru-companii.php" />
  <meta property="og:image:alt" content="Cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing." />
  <meta property="og:image" content="/images/companii-og.jpg" />
  <meta property="og:image:width" content="1195" />
  <meta property="og:image:height" content="963" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:description" content="DACĂ VĂ DOARE CEVA, DAR NU ŞTIŢI EXACT CE... vă propunem soluții complete și integrate de testare software care să maximizeze investiția şi să reducă riscurile tehnice." />
  <meta property="og:site_name" content="Academia Testării" />

  <!-- Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
  <link href="css/animate.css" rel="stylesheet" type="text/css">
  <link href="css/css-plugin-collections.css" rel="stylesheet" />
  <link href="css/design.css" rel="stylesheet" />
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
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
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
      <!-- <div id="disable-preloader" class="btn btn-default btn-sm">Treci peste preloader</div>-->
    </div>

    <!-- Header -->
    <header id="header" class="header modern-header modern-header-white">
      <?php include("include.top.header.php"); ?>
      <?php include("include.top.menu.php"); ?>
    </header>

    <!-- Start main-content -->
    <div class="main-content">
      <main>
        <a class="companii-section__chat" href="#reservation_form">Vreți să aflați mai multe detalii?<br>Lasați-ne un mesaj!</a>
        <div class="companii-section-hero">
          <div class="companii-section-hero__header">
            <div class="container">
              <h1 class="companii-section-hero__header__heading">Ce putem face pentru compania<br>dumneavoastră</h1>
              <p class="companii-section-hero__header__description">Vă oferim o listă integrată a rezultatelor afacerii aliniate obiectivelor dvs. și cerințele echipei, bazate pe abilități tehnice, cursuri de soft skills, clase și workshop-uri care: crează un mediu de testare care oferă soluțiilor software un avantaj competitive; crește calitatea software-ului prin îmbunătățirea colaborării în echipă și a testării aprofundate’ echilibrează cunoștințele tehnice cu soft skills îmbunătățite pentru un mediu de lucru mai integrat și incluziv.</p>
              <a class="companii-section-hero__header__button" href="#reservation_form">Contactează-ne</a>
            </div>
          </div>
          <div class="companii-section-hero__body">
            <div class="companii-section-hero-box">
              <h3 class="companii-section-hero-box__title">CONSULTANȚÂ</h3>
              <p class="companii-section-hero-box__description">Prin expertiza extensivă pe care o avem, ajutăm companiile să iși evalueze și îmbunatățească procesele de testare.</p>
            </div>
            <div class="companii-section-hero-box">
              <h3 class="companii-section-hero-box__title">CURSURI</h3>
              <p class="companii-section-hero-box__description">Curicula amplă, gandită pentru a oferi beneficii măsurabile</p>
            </div>
            <div class="companii-section-hero-box">
              <h3 class="companii-section-hero-box__title">COACHING</h3>
              <p class="companii-section-hero-box__description">Accesează programul nostru și îmbunatățește performanțele echipei tale</p>
            </div>
          </div>
        </div>
        <div class="companii-section-consultanta">
          <div class="container">
            <h1 class="companii-section-consultanta__title">Consultanță</h1>
            <p class="companii-section-consultanta__description">Propunem fiecărui client un proces simplu și transparent menit să il ajute să ințeleagă mai bine și să dezvolte procesele de testare. Principalele produse oferite (TMA) și (TPI) sunt gândite ca două produse complementare, pentru a maximiza beneficiile obținute de fiecare client.</p>
            <div class="companii-section-consultanta__body">
              <div class="companii-section-consultanta__body__box">
                <div class="companii-section-consultanta__body__box__title">TMA</div>
                <div class="companii-section-consultanta__body__box__description">Evaluați maturitatea prin analiza proceselor, practicilor si scopului testarii. Analiza detaliata bazata pe evaluarea a unei liste consistente de atribute, diferentiabile pe nivele de maturitate. Aplicabil de la nivel de proiect la nivel organizational.</div>
              </div>
              <div class="companii-section-consultanta__body__box">
                <div class="companii-section-consultanta__body__box__title">TPI</div>
                <div class="companii-section-consultanta__body__box__description">Evaluarea capabilităților curente, definirea și implementarea măsurilor necesare pentru a obtine cele mai rapide beneficii. Concentrarea eforturilor in zonele care conteaza cel mai mult.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="companii-section-cursuri">
          <div class="companii-section-cursuri__header">
            <div class="container">
              <h1 class="companii-section-hero__header__heading">Cursuri</h1>
              <p class="companii-section-hero__header__description">Curicula amplă, gandită pentru a oferi beneficii<br>măsurabile clienților</p>
            </div>
          </div>
          <div class="companii-section-cursuri__body">
            <div class="container">
              <div class="companii-section-cursuri__body__box companii-section-cursuri__body__box--active">
                <div class="companii-section-cursuri__body__box__icon"></div>
                <div class="companii-section-cursuri__body__box__title">Validați cunostințele echipei dumneavoastră cu ajutorul celor mai importante certificări internaționale.</div>
                <div class="companii-section-cursuri__body__box__content">
                  <h3 class="companii-section-cursuri__body__box__content__title">Cui se adresează</h3>
                  <p class="companii-section-cursuri__body__box__content__text">Persoanelor din zona de testare software care doresc să îmbunatățească și standardizeze modul de lucru.
                  </p>
                  <p class="companii-section-cursuri__body__box__content__text">DE CE?</p>
                  <p class="companii-section-cursuri__body__box__content__text">O certificare IT recunoscută internațional este un indicator de referință rapid și ușor recunoscut, mapat la un set de abilități specifice bazat pe testări standardizate. O certificare demonstrează dedicarea, motivația și mai ales abilitatile specifice ariei certificate.
                  </p>
                  <h3 class="companii-section-cursuri__body__box__content__title">Cursuri:</h3>
                  <ul class="companii-section-cursuri__body__box__content__list">
                    <li class="companii-section-cursuri__body__box__content__list__item">Selenium Tester</li>
                    <li class="companii-section-cursuri__body__box__content__list__item">Design Thinking</li>
                    <li class="companii-section-cursuri__body__box__content__list__item">ISTQB Foundation Tester
                    </li>
                    </li>
                    <li class="companii-section-cursuri__body__box__content__list__item">ISTQB Agile Tester</li>
                  </ul>
                </div>
              </div>
              <div class="columns-container">
                <div class="companii-section-cursuri__body__top__column">
                  <div class="companii-section-cursuri__body__top__column__outcome">
                    <div class="companii-section-cursuri__body__column__outcome__icon"></div>
                    <div class="companii-section-cursuri__body__column__outcome__title">Construiți de la zero o echipă internă de testare automata</div>
                    <div class="companii-section-cursuri__body__column__outcome__content">
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cui se adresează</h3>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Organizațiilor care doresc să preia noi talente și să le dezvolte intern de la posturi de juniori la membrii de echipă responsabili și independenți.
                      </p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">DE CE?</p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Bucurați-vă de un control mai bun al procesului de testare. Abordați problemele înainte ca acestea să poată deveni probleme depline. Adaptați continuu procesul pentru a se potrivi nevoilor și obiectivelor de afaceri în continuă schimbare.</p>
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cursuri:</h3>
                      <ul class="companii-section-cursuri__body__column__outcome__content__list">
                        <li class="companii-section-cursuri__body__column__outcome__content__list__item">Testare automată pentru începători (Java, Python, PHP, JavaScript, C#)</li>
                        <li class="companii-section-cursuri__body__column__outcome__content__list__item">Testare automată de UI (Selenium, Codeception, Cypress)</li>
                        <li class="companii-section-cursuri__body__column__outcome__content__list__item">Testare automată pentru servicii WEB (PHPunit, Codeception, Behat, Laravel, Symfony, Apium, SOAP UI, Rest Assured, Postman)</li>
                        <li class="companii-section-cursuri__body__column__outcome__content__list__item">Tehnici avansate de testare automată (Java, Python, PHP, JavaScript, C#)</li>
                        <li class="companii-section-cursuri__body__column__outcome__content__list__item">Definirea procesului de livrare si guvernanță</li>
                      </ul>
                    </div>
                  </div>
                  <div class="companii-section-cursuri__body__top__column__outcome">
                    <div class="companii-section-cursuri__body__column__outcome__icon"></div>
                    <div class="companii-section-cursuri__body__column__outcome__title">Atrageți talentul către echipa de testare de la roluri junior la profesioniști cu experiență</div>
                    <div class="companii-section-cursuri__body__column__outcome__content">
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cui se adresează</h3>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Organizațiilor care doresc să își mărească echipa prin angajarea atât a juniorilor proaspăt scoși din școală, cât și a profesioniștilor reorientați în carieră.
                      </p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">DE CE?</p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Rezultatul nostru oferă noilor membri ai echipei o bază tehnică puternică și abilități îmbunătățite organizatorice, de comunicare și interpersonale.</p>
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cursuri:</h3>
                      <ul class="companii-section-cursuri__body__column__outcome__content__list">
                        <li class="companii-section-cursuri__body__box__content__list__item">Testare Software pentru începători</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Comunicarea într-un context organizațional</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Managementul conflictelor</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Agile Tester</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Definirea procesului de livrare și guvernanță</li>
                      </ul>
                    </div>
                  </div>
                  <div class="companii-section-cursuri__body__top__column__outcome">
                    <div class="companii-section-cursuri__body__column__outcome__icon"></div>
                    <div class="companii-section-cursuri__body__column__outcome__title">Îmbunătățirea procesului de testare</div>
                    <div class="companii-section-cursuri__body__column__outcome__content">
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cui se adresează</h3>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Organizațiilor care doresc să eficientizeze procesul de testare din punct de vedere tehnic și să-l alinieze la o abordare adaptată nevoilor și bazată pe interacțiuni.

                      </p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">DE CE?</p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Accesul oferă un cadru complet integrat pentru a face față provocărilor tehnologice, acordând totodată o atenție deosebită interacțiunilor dintre membrii echipei.</p>
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cursuri:</h3>
                      <div class="list-container">
                        <ul class="companii-section-cursuri__body__column__outcome__content__list">
                          <li class="companii-section-cursuri__body__box__content__list__item">Tehnici avansate de Testare Software.
                          </li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Test case best practices</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">User acceptance testing</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Testing best practices
                          </li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Defect management</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Alinierea procesului de testare la modelul de livrare</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Test case management</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Testing tools
                          </li>
                        </ul>
                        <ul class="companii-section-cursuri__body__column__outcome__content__list">
                          <li class="companii-section-cursuri__body__box__content__list__item">Facilitation skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Coaching skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Influencing skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Public speaking</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Emotional intelligence
                          </li>
                          <li class="companii-section-cursuri__body__box__content__list__item">People management</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Negotiation skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Conflict management</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Team performance</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="companii-section-cursuri__body__top__column__outcome">
                    <div class="companii-section-cursuri__body__column__outcome__icon"></div>
                    <div class="companii-section-cursuri__body__column__outcome__title">Transformarea organizației la metodologia Agile</div>
                    <div class="companii-section-cursuri__body__column__outcome__content">
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cui se adresează</h3>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Organizațiilor care aplică metodologia Agile și care doresc înțelegerea cadrului, principiilor și valorilor.</p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">DE CE?</p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Agile permite mai multă independență individuală în abordarea problemelor cu managerii, asigurându-se că există mai multe funcționalități încrucișate între echipe și încurajează un mediu mai dinamic.</p>
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cursuri:</h3>
                      <ul class="companii-section-cursuri__body__column__outcome__content__list">
                        <li class="companii-section-cursuri__body__box__content__list__item">Agile overview</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Agile retrospectives</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Agile tools</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Agile product management</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Emotional intelligence</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Negotiation skills</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Conflict management</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Definirea procesului de livrare si guvernanță</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="companii-section-cursuri__body__top__column">
                  <img class="companii-section-cursuri__body__top__column__image" src="images/image6.png" alt="">
                </div>
              </div>
              <div class="columns-container">
                <div class="companii-section-cursuri__body__top__column">
                  <img class="companii-section-cursuri__body__top__column__image companii-section-cursuri__body__top__column__image--left" src="images/image5.png" alt="">
                </div>
                <div class="companii-section-cursuri__body__top__column">
                  <div class="companii-section-cursuri__body__top__column__outcome">
                    <div class="companii-section-cursuri__body__column__outcome__icon"></div>
                    <div class="companii-section-cursuri__body__column__outcome__title">Îmbunătățiți livrarea de produse într-un context Agile</div>
                    <div class="companii-section-cursuri__body__column__outcome__content">
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cui se adresează</h3>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Organizațiilor care doresc să creeze un flux constant de produse utile, reducând disparitățile dintre dezvoltare și QA.

                      </p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">DE CE?</p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Metodologia Agile pentru livrarea produselor asigură o sincronizare mai bună între echipe, un timp mai rapid de comercializare și produse de înaltă calitate care îmbunătățesc experiența utilizatorului.</p>
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cursuri:</h3>
                      <div class="list-container">
                        <ul class="companii-section-cursuri__body__column__outcome__content__list">
                          <li class="companii-section-cursuri__body__box__content__list__item">Agile product management</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Product management</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Safe frameworks</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Agile retrospectives</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Agile tools</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Facilitation skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Influencing skills</li>
                        </ul>
                        <ul class="companii-section-cursuri__body__column__outcome__content__list">
                          <li class="companii-section-cursuri__body__box__content__list__item">Negotiation skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Conflict management</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Public speaking</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Emotional intelligence
                          </li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Enabling delivery and governance</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Public speaking</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="companii-section-cursuri__body__top__column__outcome">
                    <div class="companii-section-cursuri__body__column__outcome__icon"></div>
                    <div class="companii-section-cursuri__body__column__outcome__title">Susținerea echipelor de livrare Agile</div>
                    <div class="companii-section-cursuri__body__column__outcome__content">
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cui se adresează</h3>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Organizațiilor care doresc să creeze un set robust de roluri care să susțină livrarea de produse Agile.

                      </p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">DE CE?</p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Fiecare organizație trebuie să contureze framework-uri de responsabilitate clare - acest lucru asigură transparența procesului, o mai bună organizare a echipelor și a competențelor lor individuale și un mediu de lucru mai sănătos, în care fiecare persoană primește o voce și este respectată pentru contribuția sa unică.</p>
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cursuri:</h3>
                      <div class="list-container">
                        <ul class="companii-section-cursuri__body__column__outcome__content__list">
                          <li class="companii-section-cursuri__body__box__content__list__item">Product owner</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Agile retrospectives</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Scrum masters</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Agile tools</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Agile coach</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Facilitation skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Agile tester Coaching skills</li>
                        </ul>
                        <ul class="companii-section-cursuri__body__column__outcome__content__list">
                          <li class="companii-section-cursuri__body__box__content__list__item">Coaching skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Conflict management</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Influencing skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Public speaking</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Enabling delivery and governance</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Emotional intelligence
                          </li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Negotiation skills</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="companii-section-cursuri__body__top__column__outcome">
                    <div class="companii-section-cursuri__body__column__outcome__icon"></div>
                    <div class="companii-section-cursuri__body__column__outcome__title">Sprijină colaborarea într-un context digital</div>
                    <div class="companii-section-cursuri__body__column__outcome__content">
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cui se adresează</h3>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Organizațiilor care doresc să echilibreze abordările concentrate pe interactiunea fizica cu un mediu în care cele mai multe comunicări au loc online sau de la distanță.
                      </p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">DE CE?</p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Având în vedere contextul actual, nu a fost niciodată mai dificil să se asigure linii clare de comunicare între părțile interesate: tonul corect al vocii, modul în care este furnizat feedback, asigurându-se că toată lumea se simte văzută și apreciată atât ca membru al echipei, cât și ca persoană.</p>
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cursuri:</h3>
                      <div class="list-container">
                        <ul class="companii-section-cursuri__body__column__outcome__content__list">
                          <li class="companii-section-cursuri__body__box__content__list__item">Agile tools</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Communication in the organization context</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Facilitation skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Coaching skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Influencing skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Facilitation skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Public speaking</li>
                        </ul>
                        <ul class="companii-section-cursuri__body__column__outcome__content__list">
                          <li class="companii-section-cursuri__body__box__content__list__item">Enabling delivery and governance</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Team performance</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Negotiation skills</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">Conflict management</li>
                          <li class="companii-section-cursuri__body__box__content__list__item">People management</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="companii-section-cursuri__body__top__column__outcome">
                    <div class="companii-section-cursuri__body__column__outcome__icon"></div>
                    <div class="companii-section-cursuri__body__column__outcome__title">Oferiți o carieră motivațională angajaților</div>
                    <div class="companii-section-cursuri__body__column__outcome__content">
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cui se adresează</h3>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Organizațiilor orientate spre construirea unei echipe de muncă stabilă, satisfăcute și motivate.</p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">DE CE?</p>
                      <p class="companii-section-cursuri__body__column__outcome__content__text">Prevenirea riscului de „exod al creierelor” prin punerea în aplicare a unor avansări clare în carieră, de la posturi junior la conducătorii de proiecte și posturi de conducere.</p>
                      <h3 class="companii-section-cursuri__body__column__outcome__content__title">Cursuri:</h3>
                      <ul class="companii-section-cursuri__body__column__outcome__content__list">
                        <li class="companii-section-cursuri__body__box__content__list__item">Career path program</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">On the job practice</li>
                        <li class="companii-section-cursuri__body__box__content__list__item">Transparent & interactive progress monitoring</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="companii-section-coaching">
          <div class="container">
            <h1 class="companii-section-coaching__title">Coaching</h1>
            <p class="companii-section-coaching__description">Accesează programul nostru și îmbunatatește performanțele echipei tale.</p>
            <div class="companii-section-coaching__body">
              <div class="companii-section-coaching__body__box">
                <div class="companii-section-coaching__body__box__label">
                  <div class="companii-section-coaching__body__box__title">Individual</div>
                </div>
                <div class="companii-section-coaching__body__box__description">Fiecare membru al echipei este diferit. Venim în ajutorul fiecăruia prin coaching dedicat, adaptat nevoilor sale.</div>
              </div>
              <div class="companii-section-coaching__body__box">
                <div class="companii-section-coaching__body__box__label">
                  <div class="companii-section-coaching__body__box__title">De grup</div>
                </div>
                <div class="companii-section-coaching__body__box__description">Prin sesiunile de coaching oferite, ajutăm la îmbunătățirea eficienței echipelor și a întregului proces de livrare.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="companii-form">
            <h2 class="companii-form__headline">Nu ești sigur cu ce să începi?</h2>
            <p class="companii-form__text">Contactează-ne pentru o consultație</p>
            <form id="reservation_form" name="reservation_form" class="reservation-form mb-0" method="post" action="includes/reservation.php">
              <input type="text" name="prenume" class="companii-form__input" placeholder="Prenume">
              <input type="text" name="nume" class="companii-form__input" placeholder="Nume">
              <input type="email" name="email" class="companii-form__input" placeholder="E-mail">
              <input type="text" name="nume-companie" class="companii-form__input" placeholder="Numele Companiei">
              <input type="text" name="telefon" class="companii-form__input" placeholder="Număr de telefon">
              <input type="text" name="mesaj" class="companii-form__input__mesaj" placeholder="Mesaj">
              <div class="companii-form__termeni">
                <input id="bifa" name="acord" type="checkbox" class="companii-form__input__bifa">
                <label for="bifa" class="companii-form__termeni__conditii">Datele personale colectate în acest formular vor fi folosite doar pentru a oferi un răspuns întrebarilor dumneavoastră.<br>Prin trimiterea acestui formular sunteți de acord cu stocarea datelor în vederea soluționării solicitării dumneavoastră
                </label>
              </div>
              <input name="form_botcheck" class="form-control" type="hidden" value="">
              <button data-loading-text="Asteptati putin..." onClick="fbq('track', 'Contact');" class="companii-section-hero__header__button">Contactează-ne</button>
            </form>
          </div>
        </div>
      </main>

      <!-- end main-content -->
    </div>
    <!-- Reservation Form Validation Start-->
    <script type="text/javascript">
      $('.companii-section-cursuri__body__column__outcome__title').on('click', function() {
        $(this).parent().toggleClass('companii-section-cursuri__body__top__column__outcome--active')
      })
      $('.companii-section-cursuri__body__column__outcome__icon').on('click', function() {
        $(this).parent().toggleClass('companii-section-cursuri__body__top__column__outcome--active')
      })
      $('.companii-section-cursuri__body__box__title').on('click', function() {
        $(this).parent().toggleClass('companii-section-cursuri__body__box--active')
      })
      $('.companii-section-cursuri__body__box__icon').on('click', function() {
        $(this).parent().toggleClass('companii-section-cursuri__body__box--active')
      })
      $("#reservation_form").validate({
        submitHandler: function(form) {
          var form_btn = $(form).find('button[type="submit"]');
          var form_result_div = '#form-result';
          $(form_result_div).remove();
          form_btn.after('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
          var form_btn_old_msg = form_btn.html();
          form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
          $(form).ajaxSubmit({
            dataType: 'json',
            success: function(data) {
              if (data.status == 'true') {
                $(form).find('.companii-form__input').val('');
              }
              form_btn.prop('disabled', false).html(form_btn_old_msg);
              $(form_result_div).html(data.message).fadeIn('slow');
              setTimeout(function() {
                $(form_result_div).fadeOut('slow')
              }, 6000);
            }
          });
        }
      });
    </script>
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

  <script>
    /* $(function () {
	$( ".inside li" ).prepend( "<i class=\"fa fa-arrow-right\"></i>" );
  });*/
  </script>
  <?php include("tracking.php"); ?>
</body>

</html>
