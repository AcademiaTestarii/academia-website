<?php 
include("../__connect.php");
$id="";
$row_meniu="";
// stare 
if (isset($_GET['stare']) AND is_numeric($_GET['stare'])) {
	if ($_GET['value']==1){
	$sql_update_stare=mysqli_query($link,"UPDATE `slider` SET `active`=0 WHERE `id`=".$_GET['id']);
	} else {
	$sql_update_stare=mysqli_query($link,"UPDATE `slider` SET `active`=1 WHERE `id`=".$_GET['id']);	
	}
header ("Location:slider.php");
}
// sterge 
if (isset($_GET['sterge']) AND is_numeric($_GET['sterge'])) {
	$sql_sterge=mysqli_query($link,"DELETE FROM `slider` WHERE `id`=".$_GET['sterge']);
header ("Location:slider.php");
}
$page = "slider";
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia testarii CRM | Bannere</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<script>
	function confirmDelete(delUrl) {
  		if (confirm("Esti sigur ca vrei sa stergi?")) {
		document.location = delUrl;
		}
	}
	</script>
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
<?php include("include.mainmenu.php");?>
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
    <div class="col-lg-6">
        <h2>Bannere</h2>
        <ol class="breadcrumb">
            <li>
                <a href="dashboard.php">Home</a>
            </li>
            <li class="active">
                <strong>Bannere</strong>
            </li>
        </ol>
    </div>
	<div class="col-sm-6">
		<div class="title-action">
			<a class="btn btn-primary" href="modifica_slider.php">Adauga banner nou</a>
		</div>
    </div>
</div>

    <!-- Main content -->
    <section class="wrapper wrapper-content">
	
		<div class="ibox">
			<div class="ibox-title">
				<h5>Banere disponibile <small></small></h5>
			</div>
			<div class="ibox-content">	
				<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
				<th>ID</th>
				<th>Data</th>
				<th>Titlu</th>
				<th>Imagine</th>
				<th class="text-center">Activ</th>
				<th class="text-center">Sterge</th>
				</tr>
				</thead>
				<tbody>

				<? $list=mysqli_query($link,"SELECT * FROM `slider` ORDER BY `created` DESC");
				while ($r_list = mysqli_fetch_array($list)) { ?>
				<tr>
				<td><?php echo $r_list['id'];?></td>
				<td><?php echo date("F d, Y",strtotime($r_list["created"]));?></td>
				<td><a href="modifica_slider.php?id=<?php echo $r_list['id'];?>"><?php echo $r_list['title'];?></a></td>
				<td>
				<? if ($r_list['image']=="") {?> <img src="../images/nopicture.gif" width="200px" /> 
				<?} else {?>
				<img src="../images/slider/<?php echo $r_list['image'];?>" width="200px" /> 
				<? } ?></td>
				<td class="text-center">
				<form action="" method="GET">
				<input type="checkbox" <?php if ($r_list['active']) {echo "checked";}?> name="activ" onChange="this.form.submit()" />
				<input type="hidden" name="stare" value="<?php echo $r_list['id'];?>" />
				<input type="hidden" name="value" value="<?php echo $r_list['active'];?>" />
				<input type="hidden" name="id" value="<?php echo $r_list['id'];?>" />
				</form>
				</td>
				<td class="text-center">
				<form action="" method="GET">
				<button class="btn btn-danger btn-xs" onClick="confirmDelete()" type="submit" />Sterge</button>
				<input type="hidden" name="sterge" value="<?php echo $r_list['id'];?>" />
				</form>
				</td>
				</tr>
				<? } ?>

				</tbody>
				</table>
			</div>
		</div>

    </section>
    <!-- /.content -->

<div class="footer">
<?php include("include.footer.php");?>
</div>

</div>
</div>

<!-- Mainly scripts -->
<script src="js/plugins/fullcalendar/moment.min.js"></script>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI custom -->
<script src="js/jquery-ui.custom.min.js"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>

<!-- Full Calendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>

<script>

    $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

        /* initialize the external events
         -----------------------------------------------------------------*/


        $('#external-events div.external-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1111999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });


        /* initialize the calendar
         -----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            events: [
                {
                    title: 'ceva toata ziua',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'IT-01 - Iniţiere în Software Testing',
                    start: new Date(y, m, d-5),
                    end: new Date(y, m, d-2)
                },
                {
                    id: 999,
                    title: 'Alt eveniment',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Alt eveniment',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Sedinta',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                },
                {
                    title: 'Intalnire',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    title: 'Eveniment',
                    start: new Date(y, m, d+1, 19, 0),
                    end: new Date(y, m, d+1, 22, 30),
                    allDay: false
                },
                {
                    title: 'Un link',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ]
        });


    });

</script>
</body>

</html>
