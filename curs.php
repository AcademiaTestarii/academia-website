<?php
session_start();
include("__connect.php");
if (isset($_SESSION['key_admin']) && $_SESSION['key_admin'] == session_id()) {
    $membru = true;
    include("useract.php");
} else {
    $membru = false;
}
$value=($_GET['id']);
$temp = explode('/',$value);
$newId = $temp[0];

if (isset($newId) && is_numeric($newId)) {
    $id = trim(mysqli_real_escape_string($link, $newId));
    $page = "cursuri";
    $sql_curs = "
	SELECT classes.*, main_classes.title as main_title FROM `classes`
	LEFT JOIN `main_classes` ON `classes`.`main_class_id`=`main_classes`.`id`
	WHERE `classes`.`main_class_id`=" . $id . " ";
    if (isset($academiaTestariiTrainerProvider)) {
        $sql_curs .= " AND main_classes.trainer_provider_id = $academiaTestariiTrainerProvider";
    }

    $sql_curs .= " AND `classes`.`registration_start_date` > NOW()
	ORDER BY `classes`.`registration_start_date` ASC
	LIMIT 1";
    $query_curs = mysqli_query($link, $sql_curs);
    if (mysqli_num_rows($query_curs) > 0) {
        $row_curs = mysqli_fetch_assoc($query_curs);
    } else {
        $sql_curs = "
	SELECT classes.*, main_classes.title as main_title FROM `classes`
	LEFT JOIN `main_classes` ON `classes`.`main_class_id`=`main_classes`.`id`
	WHERE `classes`.`main_class_id`=" . $id . "" ;
	   if (isset($academiaTestariiTrainerProvider)) {
        $sql_curs .= " AND main_classes.trainer_provider_id = $academiaTestariiTrainerProvider";
        }
	$sql_curs .= " AND `classes`.`registration_start_date` <= NOW()
	ORDER BY `classes`.`registration_start_date` DESC
	LIMIT 1";
        $query_curs = mysqli_query($link, $sql_curs);
        $row_curs = mysqli_fetch_assoc($query_curs);
        //  header("Location:cursuri.php");
    }
} elseif (isset($_GET['url_string_short'])) {
    $url = trim(mysqli_real_escape_string($link, $_GET['url_string_short']));
    $sql_curs = "
	SELECT classes.*, main_classes.title as main_title FROM `classes`
	LEFT JOIN `main_classes` ON `classes`.`main_class_id`=`main_classes`.`id`
	WHERE `main_classes`.`url_string_short`='" . $url . "' ";
    if (isset($academiaTestariiTrainerProvider)) {
        $sql_curs .= " AND main_classes.trainer_provider_id = $academiaTestariiTrainerProvider";
    }
	$sql_curs .= " AND `classes`.`registration_start_date` > NOW()
	ORDER BY `classes`.`registration_start_date` ASC
	LIMIT 1
	";
    $query_curs = mysqli_query($link, $sql_curs);
    if (mysqli_num_rows($query_curs) > 0) {
        $row_curs = mysqli_fetch_assoc($query_curs);
        $id = $row_curs['parent'];
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
    <title>Academia Testării :: Curs: <?php echo $row_curs['main_title']; ?></title>
    <base href="<?php echo $_SERVER['SERVER_NAME']; ?>>">
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="<?php echo $row_curs['descriere_scurta']; ?>"/>
    <meta name="keywords" content=""/>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="https://<?php echo $_SERVER['HTTP_HOST']?>/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Open Graph data -->
    <meta property="og:title" content="Curs <?php echo $row_curs['main_title']; ?>"/>
    <meta property="og:author" content="@academiatestarii"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"/>
    <meta property="og:image:alt" content="<?php echo $row_curs['main_title']; ?>"/>
    <meta property="og:image" content="<?php echo $crmHost . "/classes/" . $row_curs['image']; ?>"/>
    <meta property="og:image:width" content="800"/>
    <meta property="og:image:height" content="530"/>
    <meta property="og:image:type" content="image/jpeg"/>
    <meta property="og:description" content="<?php echo $row_curs['short_description']; ?>"/>
    <meta property="og:site_name" content="Academia Testării"/>

    <!-- Stylesheet -->
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/css/animate.css" rel="stylesheet" type="text/css">
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/css/css-plugin-collections.css" rel="stylesheet"/>

    <!-- CSS | menuzord megamenu skins -->
    <link id="menuzord-menu-skins" href="https://<?php echo $_SERVER['HTTP_HOST']?>/css/menuzord-skins/menu-academia-testarii.css" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/css/style-main.css" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/css/preloader.css" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- Academia Testarii CSS | Style css -->
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/css/style.css" rel="stylesheet" type="text/css">
    <!-- Revolution Slider 5.x CSS settings -->
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>
    <!-- CSS | Academia Testarii -->
    <link href="https://<?php echo $_SERVER['HTTP_HOST']?>/css/colors/academia-testarii.css" rel="stylesheet" type="text/css">
    <!-- external javascripts -->
    <script src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/jquery-2.2.4.min.js"></script>
    <script src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/jquery-ui.min.js"></script>
    <script src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/bootstrap.min.js"></script>
    <!-- JS | jquery plugin collection -->
    <script src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/jquery-plugin-collection.js"></script>
    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type='application/ld+json'>{
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "/",
            "sameAs": [
                "https://www.facebook.com/academiatestarii/",
                "https://www.linkedin.com/company/18151104/"
            ],
            "@id": "/#organization",
            "name": "Academia Testarii",
            "logo": "/images/logo-academia-testarii.png"
        }</script>

    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
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
        <!--    <div id="disable-preloader" class="btn btn-default btn-sm">Treci peste preloader</div>-->
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
                            <h2 class="title text-white"><?php echo $row_curs['main_title']; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Cursuri-->
        <section class="inside curs">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 blog-pull-right">
                        <div class="single-service">
                            <?php if ($row_curs['description'] != "") { ?>
                                <h3 class="text-theme-colored line-bottom text-theme-colored"><?php echo $row_curs['short_description']; ?></h3>
                                <?php echo $row_curs['description']; ?>
                            <?php } ?>
                            <h4 class="line-bottom mt-20 mb-20 text-theme-colored">Detalii curs</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-20">
                                        <?php if ($row_curs['for_whom_description'] != "") { ?>
                                            <div class="left media p-0 mb-10"><a href="#" class="pull-left flip"><i
                                                            class="fa fa-3x fa-bullseye text-theme-colored"></i></a>
                                                <div class="media-body">
                                                    <h5 class="mt-0">Cui se adresează</h5>
                                                    <?php echo $row_curs['for_whom_description']; ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php if ($row_curs['requirements_description'] != "") { ?>
                                        <div>
                                            <div class="left media p-0 mb-10"><a href="#" class="pull-left flip"><i
                                                            class="fa fa-3x fa-check-square text-theme-colored2"></i></a>
                                                <div class="media-body">
                                                    <h5 class="mt-0">Ce trebuie să știi</h5>
                                                    <?php echo $row_curs['requirements_description']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($row_curs['about_description'] != "") { ?>
                                        <div>
                                            <div class="left media p-0 mb-10"><a href="#" class="pull-left flip"><i
                                                            class="fa fa-3x fa-book text-theme-colored2"></i></a>
                                                <div class="media-body">
                                                    <h5 class="mt-0">Ce vei învăţa</h5>
                                                    <?php echo $row_curs['about_description']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($row_curs['cost_description'] != "") { ?>
                                        <div>
                                            <div class="left media p-0 mb-10"><a href="#" class="pull-left flip"><i
                                                            class="fa fa-3x fa-credit-card text-theme-colored"></i></a>
                                                <div class="media-body">
                                                    <h5 class="mt-0">Cost</h5>

                                                    <? if ($row_curs['discount_price'] != "" && $row_curs['discount_price'] != 0) { ?>
                                                        <strong>Taxa de înscriere este de </strong>
                                                        <del>
                                                            <span class="amount"><?php echo $row_curs['price']; ?> Lei</span>
                                                        </del> <strong><span
                                                                    class="amount"><?php echo $row_curs['discount_price']; ?> Lei</span></strong>
                                                    <?php } else { ?>
                                                        <strong>Taxa de înscriere este de </strong><span
                                                                class="amount"><?php echo $row_curs['price']; ?> Lei</span>
                                                    <?php } ?>
                                                    <?php echo $row_curs['cost_description']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php if ($row_curs['structure_description'] != "") { ?>
                                <h4 class="line-bottom mt-20 mb-20 text-theme-colored">Structură Curs</h4>
                                <?php echo $row_curs['structure_description']; ?>
                            <?php } ?>

                            <!-- REDUCRERI -->
                            <?php if (($row_curs['early_description'] != "") && ($row_curs['loyality_description'] != "") && ($row_curs['friends_description'] != "") && ($row_curs['discount_description'] != "")) { ?>
                                <h4 class="line-bottom mt-20 mb-20 text-theme-colored">Reduceri</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if ($row_curs['early_description'] != "") { ?>
                                            <div class="mt-20">
                                                <div class="left media p-0 mb-10"><a href="#" class="pull-left flip"><i
                                                                class="fa fa-3x fa-lightbulb-o text-theme-colored"></i></a>
                                                    <div class="media-body">
                                                        <h5 class="mt-0">Early Bird</h5>
                                                        <?php echo $row_curs['early_description']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($row_curs['loyality_description'] != "") { ?>
                                            <div>
                                                <div class="left media p-0 mb-10"><a href="#" class="pull-left flip"><i
                                                                class="fa fa-3x fa-user-plus text-theme-colored2"></i></a>
                                                    <div class="media-body">
                                                        <h5 class="mt-0">Loyalty</h5>
                                                        <?php echo $row_curs['loyality_description']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($row_curs['friends_description'] != "") { ?>
                                            <div>
                                                <div class="left media p-0 mb-10"><a href="#" class="pull-left flip"><i
                                                                class="fa fa-3x fa-users text-theme-colored"></i></a>
                                                    <div class="media-body">
                                                        <h5 class="mt-0">Friends will be friends</h5>
                                                        <?php echo $row_curs['friends_description']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($row_curs['discount_description'] != "") { ?>
                                            <div>
                                                <div class="left media p-0 mb-10"><a href="#" class="pull-left flip"><i
                                                                class="fa fa-3x fa-building text-theme-colored2"></i></a>
                                                    <div class="media-body">
                                                        <h5 class="mt-0">Company discount</h5>
                                                        <?php echo $row_curs['discount_description']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- END REDUCRERI -->

                            <?php if ($row_curs['schedule'] != "" || $row_curs['schedule_pdf'] != "") { ?>
                                <h4 class="line-bottom mt-20 mb-20 text-theme-colored">Programă Curs</h4>
                                <div class="row">
                                    <?php if ($row_curs['schedule'] != "") { ?>
                                        <div class="col-md-6">
                                            <div class="mt-0">
                                                <div class="left media p-0 mb-10">
                                                    <div class="media-body">
                                                        <?php echo $row_curs['schedule']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($row_curs['schedule_pdf'] != "") { ?>
                                        <div class="col-md-6">
                                            <div class="mt-0">
                                                <div class="left media p-0 mb-10"><a
                                                            href="<?php echo $crmHost; ?>/documents/<?php echo $row_curs['schedule_pdf']; ?>"
                                                            class="pull-left flip" target="_blank"><i
                                                                class="fa fa-4x fa-download text-theme-colored"></i></a>
                                                    <div class="media-body">
                                                        <h5 class="mt-0">Descarcă programa în format PDF</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <h4 class="line-bottom mt-20 mb-20 text-theme-colored">Înscriere</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if (isset($_SESSION['key_admin']) && $_SESSION['key_admin'] == session_id()) {
                                        $cursuriSql = mysqli_query($link, "SELECT * FROM `class_students` WHERE `student_id`=" . $_SESSION['id'] . " AND `class_id`=" . $row_curs['id']);
                                        if (mysqli_num_rows($cursuriSql) > 0) {
                                            ?>
                                            <h4>Ești deja înscris la acest curs.</h4>
                                            <a href="contul_tau.php#sectiuneaCursuri"
                                               class="btn btn-dark btn-theme-colored" width="100%"
                                               style="display:block;"><i class="fa fa-user-o"></i> Verifică informaţiile
                                                în contul tău.</a>
                                        <?php } else { ?>
                                            <a href="<?php echo $crmHost; ?>/catalog/<?php echo $row_curs['main_class_id']; ?>/class_signup"
                                               class="btn btn-dark btn-theme-colored" width="100%"
                                               style="display:block;"><i
                                                        class="fa fa-edit mr-5 text-theme-colored2"></i>Înscrie-te la
                                                acest curs</a>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <a href="<?php echo $crmHost; ?>/catalog/<?php echo $row_curs['main_class_id']; ?>/class_signup"
                                           class="btn btn-dark btn-theme-colored" width="100%" style="display:block;"><i
                                                    class="fa fa-edit mr-5 text-theme-colored2"></i>Înscrie-te la acest
                                            curs</a>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="sidebar sidebar-left mt-sm-30 ml-40">

                            <div class="widget">
                                <h4 class="widget-title line-bottom">Cursurile <span
                                            class="text-theme-colored2">noastre</span></h4>
                                <div class="services-list">
                                    <ul class="list list-border">
                                        <?php
                                        $sql_cursuri = "SELECT  a.*, c.*, a.title as main_title
FROM main_classes a
    INNER JOIN classes c
        ON a.id = c.main_class_id
    INNER JOIN
    (
        SELECT main_class_id, MAX(registration_start_date) maxDate
        FROM classes
        GROUP BY main_class_id
    ) b ON c.main_class_id = b.main_class_id AND
            c.registration_start_date = b.maxDate
             WHERE `c`.`registration_start_date`>NOW() AND `c`.`is_active`=1";
                                        if (isset($academiaTestariiTrainerProvider)) {
                                            $sql_cursuri .= " AND a.trainer_provider_id = $academiaTestariiTrainerProvider";
                                        }
             $sql_cursuri .= " order by `c`.`registration_start_date` asc";

                                        $query_cursuri = mysqli_query($link, $sql_cursuri);
                                        while ($row_cursuri = mysqli_fetch_assoc($query_cursuri)) { ?>
                                            <?php if ($id == $row_cursuri['main_class_id']) { ?><img
                                                class="img-fullwidth topmenuimg"
                                                src="<?php echo $crmHost; ?>/classes/<?php echo $row_curs['image']; ?>"
                                                alt="<?php echo $row_curs['main_title']; ?>"> <?php } ?>
                                            <li <?php if ($id == $row_cursuri['main_class_id']) {
                                                echo "class=\"active\"";
                                            } ?>>
                                                <a href="curs/<?php echo $row_cursuri['main_class_id']. '/'. strtolower(str_replace(" ", "-", iconv('utf-8', 'ascii//TRANSLIT', $row_cursuri['title']))) ?>"><?php echo ($row_cursuri['is_new'] == 0) ? ($row_cursuri['main_title']) : ("<strong>NOU</strong>: " . $row_cursuri['main_title']); ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="widget">
                                <h4 class="widget-title line-bottom">Desfășurare <span
                                            class="text-theme-colored2">Curs</span></h4>
                                <div class="opening-hours">
                                    <ul class="list-border">

                                        <li class="clearfix">
                                            <?php $datesSql = mysqli_query($link, "SELECT MIN(`date`) AS `start`, MAX(`date`) AS `end` FROM `class_dates` WHERE `class_id`=" . $row_curs['id']);
                                            $datesRow = mysqli_fetch_assoc($datesSql);
                                            ?>
                                            <span> <?php if ($datesRow['start'] != "0000-00-00" && $datesRow['start'] > date("Y-m-d")) {
                                                    echo strftime("%e %B %Y", strtotime($datesRow['start'])) . " - " . strftime("%e %B %Y", strtotime($datesRow['end']));
                                                } else {
                                                    echo "Data va fi anuntata ulterior";
                                                } ?></span></li>
                                        <li class="clearfix"><span><?php echo $row_curs['deployment']; ?></span></li>
                                        <?php
                                        if(!is_null($row_curs['weekdays_schedule'])) {
                                            echo " <li class='clearfix'><span>".$row_curs['weekdays_schedule']."</span></li>";
                                        }
                                        ?>
                                        <?php
                                        if(!is_null($row_curs['weekend_schedule'])) {
                                            echo " <li class='clearfix'><span>".$row_curs['weekend_schedule']."</span></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="widget">
                                <h4 class="widget-title line-bottom">Locuri <span class="text-theme-colored2">Disponibile</span>
                                </h4>
                                <div class="opening-hours">
                                    <ul class="list-border">
                                        <li class="clearfix">
                                            <?php $sqlInscrisi = mysqli_query($link, "SELECT * FROM `class_students` WHERE `class_id`=" . $row_curs['id']);
                                            $cati = mysqli_num_rows($sqlInscrisi);
                                            ?>
                                            <?php echo $row_curs['students'] - $cati; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="widget">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if (isset($_SESSION['key_admin']) && $_SESSION['key_admin'] == session_id()) {
                                            $cursuriSql = mysqli_query($link, "SELECT * FROM `class_students` WHERE `student_id`=" . $_SESSION['id'] . " AND `class_id`=" . $row_curs['id']);
                                            if (mysqli_num_rows($cursuriSql) > 0) {
                                                ?>
                                                <h4>Ești deja înscris la acest curs.</h4>
                                                <a href="contul_tau.php#sectiuneaCursuri"
                                                   class="btn btn-dark btn-theme-colored" width="100%"
                                                   style="display:block;"><i class="fa fa-user-o"></i> Verifică
                                                    informaţiile în contul tău.</a>
                                            <?php } else { ?>
                                                <a href="<?php echo $crmHost; ?>/catalog/<?php echo $row_curs['main_class_id']; ?>/class_signup"
                                                   class="btn btn-dark btn-theme-colored" width="100%"
                                                   style="display:block;"><i
                                                            class="fa fa-edit mr-5 text-theme-colored2"></i>Înscrie-te
                                                    la acest curs</a>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <a href="<?php echo $crmHost; ?>/catalog/<?php echo $row_curs['main_class_id']; ?>/class_signup"
                                               class="btn btn-dark btn-theme-colored" width="100%"
                                               style="display:block;"><i
                                                        class="fa fa-edit mr-5 text-theme-colored2"></i>Înscrie-te la
                                                acest curs</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $datesSql2 = mysqli_query($link, "SELECT `id` AS `urmatorul` FROM `classes` WHERE `main_class_id`=" . $id . " AND  `registration_start_date` > NOW() AND `id` != " . $row_curs['id'] . " ORDER BY `registration_start_date` ASC LIMIT 1");
                            if (mysqli_num_rows($datesSql2) > 0) {
                                $datesRow2 = mysqli_fetch_assoc($datesSql2);
                                $datesSql3 = mysqli_query($link, "SELECT MIN(`date`) AS `start`, MAX(`date`) AS `end` FROM `class_dates` WHERE `class_id`=" . $datesRow2['urmatorul']);
                                $datesRow3 = mysqli_fetch_assoc($datesSql3);
                                ?>
                                <div class="widget">
                                    <h4 class="widget-title line-bottom">Următoarele <span class="text-theme-colored2">Cursuri</span>
                                    </h4>
                                    <div class="opening-hours">
                                        <ul class="list-border">
                                            <li class="clearfix">

                                                <?php if ($datesRow3['start'] != "0000-00-00") {
                                                    echo strftime("%e %B %Y", strtotime($datesRow3['start'])) . " - " . strftime("%e %B %Y", strtotime($datesRow3['end']));
                                                } else {
                                                    echo "Data va fi anuntată ulterior";
                                                } ?>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php
                            $sql_trainer = "SELECT * FROM `trainer` LEFT JOIN `class_trainers` ON `trainer`.`id`=`class_trainers`.`trainer_id`
WHERE `class_trainers`.`class_id`=" . $row_curs['id'] . ' and trainer.deleted_at is null';
                            $query_trainer = mysqli_query($link, $sql_trainer);
                            if (mysqli_num_rows($query_trainer) > 0) {
                                $row_trainer = mysqli_fetch_assoc($query_trainer);
                                ?>
                                <div class="widget">
                                    <h4 class="widget-title line-bottom">Trainer <span
                                                class="text-theme-colored2">curs</span></h4>
                                    <div class="team-block service-box maxwidth400">
                                        <div class="team-thumb">
                                            <img class="img-fullwidth" alt=""
                                                 src="<?php echo $crmHost; ?>/trainers/<?php echo $row_trainer['picture']; ?>">
                                        </div>
                                        <div class="team-bottom-part">
                                            <h3 class="text-uppercase text-theme-colored2"><?php echo $row_trainer['name']; ?></h3>
                                        </div>
                                        <div class="team-overlay team-bottom-part">
                                            <h4><?php echo $row_trainer['title']; ?></h4>
                                            <?php echo $row_trainer['bio'] ?>
                                            <ul class="styled-icons icon-dark icon-theme-colored icon-circled icon-sm text-center">
                                                <li><a href="<?php echo $row_trainer['linkedin']; ?>" target="_blank"><i
                                                                class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
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
<script src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/custom.js"></script>

<script type="text/javascript" src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript"
        src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="https://<?php echo $_SERVER['HTTP_HOST']?>/js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
<?php include("tracking.php"); ?>

</body>
</html>
