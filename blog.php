<!-- Made by: DanielM 2019 -->
<?php
session_start();
include("__connect.php");
if(isset($_SESSION['key_admin']) && $_SESSION['key_admin']==session_id()) {$membru=true;include("useract.php");} else {$membru=false;}
$page="blog";
?>
<!DOCTYPE html>
<html dir="ltr" lang="ro">
<head>
<!-- Page Title -->
<title>Academia Testării:: Blog</title>
<base href="https://www.academiatestarii.ro">
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Academia Testarii:: Blog" />
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
<meta property="og:title" content="Academia Testării:: Blog" />
<meta property="og:author" content="@academiatestarii" />
<meta property="og:type" content="website" />
<meta property="og:url" content="/blog.php" />
<meta property="og:image:alt" content="Cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing." />
<meta property="og:image" content="/images/academia.jpg" />
<meta property="og:image:width" content="1195" />
<meta property="og:image:height" content="963" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:description" content="Blog Academia Testarii: Cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing." />
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
              <h2 class="title text-white">Blog</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
          <div class="col-md-9">
            <div class="blog-posts">
              <div class="col-md-12">
                <div class="row list-dashed">
<?php
$items_per_page = 3;
if (isset($_GET['pagina']) && is_numeric($_GET['pagina'])) {
	$current_page = $_GET['pagina'];
} else {
	$current_page = 1;
}

$sql="
SELECT * FROM `news`
LEFT JOIN `news_images` ON `news`.`id`=`news_images`.`news_id`
WHERE `news`.`is_active`=1 ";
$query=mysqli_query($link,$sql);

if (isset($_GET['tag'])) {
	$taguri = mysqli_real_escape_string($link,$_GET['tag']);
	$tag = " AND `news`.`keywords` LIKE '%".$taguri."%' ";
} else {
	$taguri="";
	$tag = "";
}

$sql .=$tag;

$order="ORDER BY `news`.`date` DESC";
$sql .=$order;

$items_count = mysqli_num_rows($query);
$pages = ceil ($items_count / $items_per_page);
$pagination_query = " LIMIT " . ( ($current_page - 1) * $items_per_page) . ", " . $items_per_page;
$sql .= $pagination_query;

$query=mysqli_query($link,$sql);

while ($row=mysqli_fetch_assoc($query)) {
$scurta=removeTags($row['text'], array("p","ul","li","div","hr","h1","h2","h3","span","table","tr","td","img","strong","br","ol","dl")); // remove html
$descriere=truncate($scurta,300,"...");
?>
                  <article class="post clearfix mb-30 pb-30">
<?php if ($row['image']!="") { ?>
                    <div class="entry-header">
                      <div class="post-thumb thumb">
                        <img src="images/blog/<?php echo $row['image'];?>" alt="<?php echo $row['title'];?>" class="img-responsive img-fullwidth">
                      </div>
                    </div>
<?php } ?>
                    <div class="entry-content border-1px p-20 pr-10">
                      <div class="entry-meta media mt-0 no-bg no-border">
                        <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                          <ul>
                            <li class="font-16 text-white font-weight-600"><?php echo strftime("%e", strtotime($row['date']));?></li>
                            <li class="font-12 text-white text-uppercase"><?php echo strftime("%B", strtotime($row['date']));?></li>
							<li class="font-16 text-white font-weight-600"><?php echo strftime("%Y", strtotime($row['date']));?></li>
                          </ul>
                        </div>
                        <div class="media-body pl-15">
                          <div class="event-content pull-left flip">
                            <h3 class="entry-title text-white text-uppercase m-0 mt-5"><a href="articol.php?id=<?php echo $row['news.id'];?>"><?php echo $row['title'];?></a></h3>
                            <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> -- </span>
                            <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-eye mr-5 text-theme-colored"></i> <?php echo $row['views'];?> </span>
                          </div>
                        </div>
                      </div>
                      <p class="mt-10"><?php echo $descriere;?></p>
                      <a href="articol.php?id=<?php echo $row['news.id'];?>" class="btn-read-more">Citeste articolul</a>
                      <div class="clearfix"></div>
                    </div>
                  </article>
<?php } ?>

                </div>
              </div>

<?php if (!isset($_GET['tag'])) { ?>

              <div class="col-md-12">
                <nav>
                  <ul class="pagination theme-colored">
				<?php if ($current_page>1) { ?>
                    <li> <a aria-label="Inapoi" href="blog.php?pagina=<?php echo $current_page-1; ?>"> <span aria-hidden="true">«</span> </a> </li>
				<?php } ?>
				<?php for ($i = 1; $i <= $pages; $i++) { ?>
                    <li <?php if($current_page==$i) {echo "class=\"active\" ";}?>><a href="blog.php?pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
				<?php } ?>
				<?php if ($current_page<$pages) { ?>
                    <li> <a aria-label="Inainte" href="blog.php?pagina=<?php echo $current_page+1; ?>"> <span aria-hidden="true">»</span> </a> </li>
				<?php } ?>
                  </ul>
                </nav>
              </div>
<?php } ?>


            </div>
          </div>

          <div class="col-md-3">
            <div class="sidebar sidebar-right mt-sm-30">

              <!--div class="widget">
                <h5 class="widget-title line-bottom">Categorii</h5>
                <ul class="list-divider list-border list check">
                  <li><a href="#">Lorem</a></li>
                  <li><a href="#">Lorem</a></li>
                  <li><a href="#">Lorem</a></li>
                  <li><a href="#">Lorem</a></li>
                  <li><a href="#">Lorem</a></li>
                  <li><a href="#">Lorem</a></li>
                </ul>
              </div-->

              <div class="widget">
                <h5 class="widget-title line-bottom">Articole recente</h5>
                <div class="latest-posts">
<?php
$sql="
SELECT * FROM `news`
LEFT JOIN `news_images` ON `news`.`id`=`news_images`.`news_id`
WHERE `news`.`is_active`=1
ORDER BY `news_images`.`date` DESC LIMIT 3";
$query=mysqli_query($link,$sql);
while ($row=mysqli_fetch_assoc($query)) {
$scurta=removeTags($row['text'], array("p","ul","li","div","hr","h1","h2","h3","span","table","tr","td","img","strong","br","ol","dl")); // remove html
$descrierescurta=truncate($scurta,100,"...");
?>
                  <article class="post media-post clearfix pb-0 mb-10">
<?php if ($row['image']!="") { ?>
                    <a class="post-thumb" href="articol.php?id=<?php echo $row['news.id'];?>"><img src="images/blog/<?php echo $row['image'];?>" alt="<?php echo $row['title'];?>"></a>
<? } ?>
                    <div class="post-right">
                      <h4 class="post-title mt-0"><a href="articol.php?id=<?php echo $row['news.id'];?>"><?php echo $row['title'];?></a></h4>
                      <p class="post_sub"><?php echo $descrierescurta;?></p>
                    </div>
                  </article>
<?php } ?>
                </div>
              </div>

              <div class="widget">
                <h5 class="widget-title line-bottom">Taguri</h5>
                <div class="tags">
<?php
/* metatags */
$metakeyList="";
$sql_meta="SELECT * FROM `news` WHERE `keywords`<>''";
$query_meta=mysqli_query($link,$sql_meta);
while($rowmeta = mysqli_fetch_array($query_meta)) {
	$metakeysParts = explode(",", $rowmeta['keywords']);
		foreach($metakeysParts as $metakey) {
			if (trim($metakey!="")) {
				$metakey = trim($metakey);
				@$metakeys[$metakey] = $metakeys[$metakey] + 1;
			}
		}
	}
ksort($metakeys);
foreach($metakeys as $metakeyname => $value) {
if ($taguri==$metakeyname) {$activ='class="active"';} else {$activ="";}
	$metakeyList .='<a '.$activ.' href="blog.php?tag='.$metakeyname.'">'.$metakeyname.'</a>';
}
echo $metakeyList;
?>
                </div>
              </div>

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