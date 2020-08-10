<?php 
include("../__connect.php");
$page = "testimoniale";
$today = date("Y-m-d");
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia Testarii CRM | Testimoniale</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
<?php include("include.user.php");?>
                    <div class="logo-element">
                        AT+
                    </div>
                </li>
<?php include("include.mainmenu2.php");?>
            </ul>
        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <!--form role="search" class="navbar-form-custom" action="search_results.php">
                <div class="form-group">
                    <input type="text" placeholder="Cautare ..." class="form-control" name="top-search" id="top-search">
                </div>
            </form-->
        </div>
<?php include ("include.panoucontrol.php")?>
        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Testimoniale</h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Home</a></li>
                        <li class="active"><strong>Testimoniale</strong></li>
                    </ol>
                </div>
                <div class="col-sm-4">
				<div class="title-action">
					<a class="btn btn-primary" href="testimonial.php">Adauga testimonial</a>
				</div>
    </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

<?php 
$sql="SELECT * FROM `testimoniale` ORDER BY `nume` ASC";
$query=mysqli_query($link,$sql);
while ($row=mysqli_fetch_assoc($query)) {
?>
				<div class="col-lg-4">
					<div class="widget-head-color-box white-bg p-lg text-center">
						<div class="">
							<h4 class="media-heading"><?php echo $row['nume'];?></h4>
							<p><?php echo $row['testimonial'];?></p>
							<div class="hr-line-dashed"></div>
							<a class="btn btn-primary" href="testimonial.php?id=<?php echo $row['id'];?>">Detalii testimonial</a>
						</div>
					</div>
                </div>
					
<?php } ?>

            </div>


        </div>
        <div class="footer">
<?php include("include.footer.php");?>
        </div>

        </div>
        </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

</body>

</html>