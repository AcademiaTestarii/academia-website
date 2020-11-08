<?php
session_start();
include("__connect.php");
if(isset($_SESSION['key_admin']) && $_SESSION['key_admin']==session_id()) {$membru=true;include("useract.php");} else {$membru=false;}
$page="blog";
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
$id=trim(mysqli_real_escape_string($link,$_GET['id']));
$sql="
SELECT * FROM `news`
LEFT JOIN `news_images` ON `news`.`id`=`news_images`.`news_id`
WHERE `news`.`deleted_at` is null AND `news`.`id`=".$id;
$query=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($query);

if($row['views'] == null) {
    mysqli_query($link,"UPDATE `news` SET `views`=0 WHERE `id`=".$id);
}

mysqli_query($link,"UPDATE `news` SET `views`=`views`+1 WHERE `id`=".$id);
} else {
header("Location:blog.php");
}
if (isset($_POST['contact_message2'])) {
    $id=trim(mysqli_real_escape_string($link,$_GET['id']));
    $name =trim(mysqli_real_escape_string($link,$_POST['contact_name']));
    $email =trim(mysqli_real_escape_string($link,$_POST['contact_email2']));
    $comment =trim(mysqli_real_escape_string($link,$_POST['contact_message2']));

    mysqli_query($link,"INSERT INTO `comments` (`article_id`,`reply_id`,`name`,`email`,`webpage`, `comment`)
				VALUES
                ($id, NULL,'".$name."','".$email."', NULL, '".$comment."')");

}
?>
<!DOCTYPE html>
<html dir="ltr" lang="ro">
<head>
<!-- Page Title -->
<title>Academia Testarii:: <?php echo $row['title'];?></title>
<base href="<?php echo $_SERVER['SERVER_NAME'];?>>">
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="<?php echo truncate(strip_tags($row['text']),300);?>" />
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
<meta property="og:title" content="<?php echo $row['title'];?>" />
<meta property="og:author" content="@academiatestarii" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
<meta property="og:image:alt" content="Cursuri de iniţiere şi specializare în Software Testing, consultanţă şi resourcing." />
<meta property="og:image" content="/images/blog/<?php echo $row['image'];?>" />
<meta property="og:image" content="<?php echo "https://".$_SERVER['HTTP_HOST']."/academiatestarii/images/blog/".$row['image'];?>" />
<meta property="og:image:width" content="1195" />
<meta property="og:image:height" content="963" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:description" content="<?php echo truncate(strip_tags($row['text']),300);?>" />
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
              <h2 class="title text-white"><?php echo $row['title'];?></h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">

          <div class="col-md-9">
            <div class="blog-posts single-post">
              <article class="post clearfix mb-0">
<?php if ($row['image']!="") { ?>
                <div class="entry-header">
                  <div class="post-thumb thumb"> <img src="<?php echo $crmHost;?>/news/<?php echo $row['image'];?>" alt="<?php echo $row['title'];?>" class="img-responsive img-fullwidth"> </div>
                </div>
<?php } ?>
                <div class="entry-content">
                  <div class="entry-meta media no-bg no-border mt-15 pb-20">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600"><?php echo strftime("%e", strtotime($row['date']));?></li>
                            <li class="font-12 text-white text-uppercase"><?php echo strftime("%B", strtotime($row['date']));?></li>
							<li class="font-16 text-white font-weight-600"><?php echo strftime("%Y", strtotime($row['date']));?></li>
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0"><a href="#"><?php echo $row['title'];?></a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> --- </span>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-eye mr-5 text-theme-colored"></i> <?php echo $row['views'];?> </span>
                      </div>
                    </div>
                  </div>
                  <?php echo $row['text'];?>

                  <div class="mt-30 mb-0">
                    <h5 class="pull-left mt-10 mr-20 text-theme-colored">Distribuie acest articol:</h5>
                    <ul class="styled-icons icon-circled m-0">
                      <li><a href="#" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
                      <li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
                      <li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
                    </ul>
                  </div>
                </div>
              </article>
              <div class="tagline p-0 pt-20 mt-5">
                <div class="row">
                  <div class="col-md-8">
                    <div class="tags">
<?php
/* metatags */
$metakeyList="";
$sql_meta="SELECT * FROM `news` WHERE `news`.`deleted_at` is null and `keywords`<>'' AND `id`=".$id;
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
	$metakeyList .=$metakeyname.", ";
}
$metakeyList=rtrim($metakeyList,', '); // remove the last comma
?>

                      <p class="mb-0"><i class="fa fa-tags text-theme-colored"></i> <span>Taguri:</span> <?php echo $metakeyList;?></p>
                    </div>
                  </div>

                </div>
              </div>

              <div class="comments-area">
                <h5 class="comments-title">Comentarii</h5>
				<hr />
                <ul class="comment-list">
<?php
$sql_comentarii="SELECT * FROM `comments` WHERE `is_active`=1 AND `article_id`=".$id;
$query_comentarii=mysqli_query($link,$sql_comentarii);
if (mysqli_num_rows($query_comentarii)>0) {
	while ($row_comentarii=mysqli_fetch_assoc($query_comentarii)) {
?>
                  <li>
                    <div class="media comment-author">
						<div class="media-body">
                        <h5 class="media-heading comment-heading"><?php echo $row_comentarii['name'];?>:</h5>
                        <div class="comment-date"><?php echo strftime("%e %B %Y", strtotime($row_comentarii['added_on'])) ?></div>
                        <?php echo $row_comentarii['comment'];?>
						</div>
                    </div>
                  </li>
	<?php } } else { ?>
				<!--li>
                    <div class="media comment-author">
						<h5 class="media-heading comment-heading">Nu sunt comentarii.</h5>
					</div>
                </li-->
<?php } ?>
                </ul>
              </div>

              <div class="comment-box">
                <div class="row">
                  <div class="col-sm-12">
                    <h5>Lasă un comentariu</h5>
                    <div class="row">
                      <form role="form" id="comment-form" method="POST" action="articol.php?id=<?php echo $id;?>">
                        <div class="col-sm-6 pt-0 pb-0">
                          <div class="form-group">
                            <input type="text" class="form-control" required name="contact_name" id="contact_name" placeholder="Numele tau">
                          </div>
                          <div class="form-group">
                            <input type="text" required class="form-control" name="contact_email2" id="contact_email2" placeholder="Adresa Email">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <textarea class="form-control" required name="contact_message2" id="contact_message2"  placeholder="Comentariul tau" rows="7"></textarea>
                          </div>
                          <div class="form-group">
							<input type="hidden" value="" name="verifica" />
                            <button type="submit" class="btn btn-dark btn-theme-colored pull-right" data-loading-text="Asteapta putin...">Trimite</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="sidebar sidebar-right mt-sm-30">

              <div class="widget">
                <h5 class="widget-title line-bottom">Articole recente</h5>
                <div class="latest-posts">
<?php
$sql="
SELECT *, news.id as news_id FROM `news`
LEFT JOIN `news_images` ON `news`.`id`=`news_images`.`news_id`
WHERE `news`.`deleted_at` is null AND `news`.`is_active`=1 AND `news`.`id`!= ".$id."
ORDER BY `news`.`created_at` DESC LIMIT 3";
$query=mysqli_query($link,$sql);
while ($row=mysqli_fetch_assoc($query)) {
$scurta=removeTags($row['text'], array("p","ul","li","div","hr","h1","h2","h3","span","table","tr","td","img","strong","br","ol","dl")); // remove html
$descrierescurta=truncate($scurta,100,"...");
?>
                  <article class="post media-post clearfix pb-0 mb-10">
<?php if ($row['image']!="") { ?>
                    <a class="post-thumb" href="articol.php?id=<?php echo $row['news_id'];?>"><img src="<?php echo $crmHost;?>/news/<?php echo $row['image'];?>" alt="<?php echo $row['title'];?>"></a>
<? } ?>
                    <div class="post-right">
                      <h4 class="post-title mt-0"><a href="articol.php?id=<?php echo $row['news_id'];?>"><?php echo $row['title'];?></a></h4>
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
$sql_meta="SELECT * FROM `news` WHERE `news`.`deleted_at` is null AND `keywords`<>''";
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
	$metakeyList .='<a href="blog.php?tag='.$metakeyname.'">'.$metakeyname.'</a>';
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