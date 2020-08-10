<?php 
include("../__connect.php");
$page = "cursuri";
$today = getdate();

/* Remove image */
if (isset($_GET['removeimage'])) {
$removeimage = $_GET['removeimage'];
$picsql = mysqli_query($link,"SELECT * FROM `cursuri` WHERE `id`=".$removeimage);
$pic=mysqli_fetch_array($picsql);
unlink(dirname( __FILE__ )."/../images/cursuri/".$pic['image']);
mysqli_query($link,"UPDATE `cursuri` SET `imagine`=NULL WHERE `id`=".$removeimage);
//header ("Location: curs.php?id=".$pic['id']);

}/* Remove programa */
if (isset($_GET['removeprograma'])) {
$removeimage = $_GET['removeprograma'];
$picsql = mysqli_query($link,"SELECT * FROM `cursuri` WHERE `id`=".$removeimage);
$pic=mysqli_fetch_array($picsql);
unlink(dirname( __FILE__ )."/../documente/".$pic['pdf_programa']);
mysqli_query($link,"UPDATE `cursuri` SET `pdf_programa`=NULL WHERE `id`=".$removeimage);
//header ("Location: curs.php?id=".$pic['id']);
}

if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['id_main']) && is_numeric($_GET['id_main'])) {
	$id=$_GET['id'];
	$id_curs_main=$_GET['id_main'];
	$action="modifica";
	$pagetitle="Modificare";
	$sql=mysqli_query($link,"SELECT * FROM `cursuri` LEFT JOIN `curs_main` ON `cursuri`.`parent`=`curs_main`.`id_curs_main` WHERE `cursuri`.`id`=".$id);
	if (mysqli_num_rows($sql)>0) {
		// edit
		$row=mysqli_fetch_assoc($sql);
		//desfasurare
		$desfasurare="";
		$sql_desfasurare=mysqli_query($link,"SELECT * FROM `date_cursuri` WHERE `id_curs`=".$id);
		while ($row_desfasurare=mysqli_fetch_assoc($sql_desfasurare)) {
			$desfasurare.="'".strftime("%m/%d/%Y", strtotime($row_desfasurare['data']))."',";
		}
		$desfasurare=rtrim($desfasurare,",");
		// stare
		if ($row['activ']==1) {$activ="checked=\"checked\"";} else {$activ="";}
		if ($row['planificat']==1) {$planificat="checked=\"checked\"";} else {$planificat="";}
		if ($row['weekend']==1) {$weekend="checked=\"checked\"";} else {$weekend="";}
		if ($row['bucuresti']==1) {$bucuresti="checked=\"checked\"";} else {$bucuresti="";}
		
		if (isset($_GET['duplicat']) && is_numeric($_GET['duplicat'])) {
			$action="duplicat";
			$pagetitle="Duplicat";
		}
	} else {
		header ("Location: cursuri.php");
	}

} else {
	$action="adauga";
	$pagetitle="Adaugare";
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia Testarii CRM | <?php echo $pagetitle;?> Cursuri</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
	<link href="css/plugins/jQueryUI/jquery-ui.css" rel="stylesheet">
    <link href="js/plugins/Multiple-Dates-Picker-for-jQuery-UI-latest/jquery-ui.multidatespicker.css" rel="stylesheet">
	<link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
	<link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/plugins/iCheck/custom.css" rel="stylesheet">

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
                    <h2><?php echo $pagetitle;?> Curs</h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Home</a></li>
                        <li class="active"><a href="cursuri.php"><strong>Cursuri</strong></a></li>
                    </ol>
                </div>
            </div>

		<!-- Main content -->
		<section class="wrapper wrapper-content">
		
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5><?php echo $pagetitle;?> curs<small></small></h5>
				</div>
				<div class="ibox-content">	
				
				<form id="form" method="post" class="form-horizontal" action="action_curs.php" enctype="multipart/form-data">
				<input type="hidden" name="action" value="<?php echo $action;?>" />
				<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
				<input type="hidden" name="id_curs_main" value="<?php echo $row['id_curs_main'];?>" />
				
					<div class="form-group">
						<label class="col-sm-2 control-label">Stare curs:</label>
						<div class="col-sm-2"><label> <input type="checkbox" name="activ" <?php echo $activ;?> value="1"> Publicat <small>apare pe site </small></label></div>
						<div class="col-sm-2"><label> <input type="checkbox" name="weekend" <?php echo $weekend;?> value="1"> Weekend </label></div>
						<div class="col-sm-2"><label> <input type="checkbox" name="bucuresti" <?php echo $bucuresti;?> value="1"> Online </label></div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Titlu curs:<br /><small>Apare in meniu, in casete, etc</small></label>
						<div class="col-sm-4"><input disabled value="<?php echo $row['titlu_main'];?>" name="titlu_main" type="text" class="form-control" required></div>
						<label class="col-sm-2 control-label">Suplimentar:<br /><small>Iterare, nu apare pe site</small></label>
						<div class="col-sm-4"><input value="<?php echo $row['titlu'];?>" name="titlu" type="text" class="form-control" required></div>
					</div>
					<div class="hr-line-dashed"></div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Descriere scurta:<br /><small>Slogan curs</small></label>
						<div class="col-sm-10"><input value="<?php echo $row['descriere_scurta'];?>" name="descriere_scurta" type="text" class="form-control" required></div>
					</div>
					<div class="hr-line-dashed"></div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Descriere lunga:</label>
						<div class="col-sm-10">
						<textarea id="text1" name="descriere">
							<?php echo $row['descriere'];?>
                        </textarea>
						</div>
					</div>
					
				<div class="ibox-title">
					<h5>Informatii inscriere<small></small></h5>
				</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Numar cursanti:</label>
						<div class="col-sm-10"><input value="<?php echo $row['cursanti'];?>" name="cursanti" type="text" placeholder="doar cifre" class="form-control" required></div>
					</div>
					<div class="hr-line-dashed"></div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Pret curs/cursant:</label>
						<div class="col-sm-10"><input value="<?php echo $row['pret'];?>" name="pret" type="text" placeholder="doar cifre" class="form-control" required></div>
					</div>	
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Pret redus/cursant:</label>
						<div class="col-sm-10"><input value="<?php echo $row['pret_redus'];?>" name="pret_redus" type="text" placeholder="doar cifre" class="form-control"></div>
					</div>
					
					
				<div class="ibox-title">
					<h5>Detalii curs<small></small></h5>
				</div>					
					<div class="form-group">
						<label class="col-sm-2 control-label">Cui se adresează:</label>
						<div class="col-sm-10">
						<textarea id="text2" name="cui">
							<?php echo $row['cui'];?>
						</textarea>
						</div>
					</div>
					<div class="hr-line-dashed"></div>				
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Ce vei învăța:</label>
						<div class="col-sm-10">
						<textarea id="text3" name="ce">
							<?php echo $row['ce'];?>
						</textarea>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Costuri:</label>
						<div class="col-sm-10">
						<textarea id="text4" name="costuri">
							<?php echo $row['costuri'];?>
						</textarea>
						</div>
					</div>		
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Resurse curs:</label>
						<div class="col-sm-10">
						<textarea id="text14" name="resurse">
							<?php echo $row['resurse'];?>
						</textarea>
						</div>
					</div>
					
				<div class="ibox-title">
					<h5>Structura curs</h5>
				</div>					
					<div class="form-group">
						<label class="col-sm-2 control-label">Structura curs:</label>
						<div class="col-sm-10">
						<textarea id="text5" name="structura">
							<?php echo $row['structura'];?>
                        </textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Cerinte minime de participare:</label>
						<div class="col-sm-10">
						<textarea id="text15" name="cerinte">
							<?php echo $row['cerinte'];?>
                        </textarea>
						</div>
					</div>
					
				<div class="ibox-title">
					<h5>Programa curs</h5>
				</div>					
					<div class="form-group">
						<label class="col-sm-2 control-label">Programa curs:</label>
						<div class="col-sm-10">
						<textarea id="text6" name="programa">
							<?php echo $row['programa'];?>
                        </textarea>
						</div>
					</div>					
				<div class="ibox-title">
				
					<h5>Reduceri<small></small></h5>
				</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Early Bird:</label>
						<div class="col-sm-10">
						<textarea id="text7" name="early">
							<?php echo $row['early'];?>
                        </textarea>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Loyalty:</label>
						<div class="col-sm-10">
						<textarea id="text8" name="loyality">
							<?php echo $row['loyality'];?>
                        </textarea>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Friends will be friends:</label>
						<div class="col-sm-10">
						<textarea id="text9" name="friends">
							<?php echo $row['friends'];?>
                        </textarea>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Company discount:</label>
						<div class="col-sm-10">
						<textarea id="text10" name="discount">
							<?php echo $row['discount'];?>
                        </textarea>
						</div>
					</div>

				<div class="ibox-title">
					<h5>Trainer</h5>
				</div>					
					<div class="form-group">
						<label class="col-sm-2 control-label">Trainer:</label>
						<div class="col-sm-10">
						<select class="select2 form-control" name="trainer">
							<option>-- Alege --</option>
						<?php 	$sql_trainer=mysqli_query($link,"SELECT * FROM `trainer` ORDER BY `nume` ASC");
								while ($row_trainer=mysqli_fetch_assoc($sql_trainer)) { 
								$sql_exista=mysqli_query($link,"SELECT * FROM `trainer_curs` WHERE `id_trainer`=".$row_trainer['id']." AND `id_curs`=".$id);
								if (mysqli_num_rows($sql_exista)>0){$selected="selected";}
						?>
							<option value="<?php echo $row_trainer['id'];?>" <?php echo $selected;?>><?php echo $row_trainer['nume'];?></option>
						<?php $selected=""; } ?>
						</select>
						</div>
					</div>
					
				<div class="ibox-title">
					<h5>Data desfasurare</h5>
				</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Calendar: <br /><small>ll/zz/yyyy</small></label>
						<div class="col-sm-10">
							<input type="text" name="desfasurare" id="mdp-demo" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Loc desfasurare: <br /><small>Online sau o locatie</small></label>
						<div class="col-sm-10">
							<input type="text" name="desfasurarecurs" id="desfasurarecurs" class="form-control" value="<?php echo $row['desfasurare'];?>">
						</div>
					</div>

				<div class="ibox-title">
					<h5>Programa curs (PDF)</h5>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Fisier PDF:<br></label>
					<div class="col-sm-10">
					<? if ($row["pdf_programa"]!="") { ?>
                      <p class="help-block"><a href="../documente/<?php echo $row['pdf_programa'];?>" target="_blank" /><?php echo $row['pdf_programa'];?></a></p>
						<a class="btn btn-primary btn-sm" href="<?php echo basename($_SERVER["REQUEST_URI"]);?>&removeprograma=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-trash"></i> &nbsp; Sterge programa</a>
					<? } else { ?>
						<div class="inputBtnSection">
						<input id="uploadFile" class="disableInputField" placeholder="Selecteaza un fisier" disabled="disabled" />
						<label class="fileUpload">
							<input id="filepdf" name="filepdf" type="file" class="upload" />
						</label>
						</div>
					<? } ?>
					</div>
				</div>
				
				<div class="ibox-title">
					<h5>Imagine curs</h5>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Imagine:<br><small>va fi redimensionata automat, latimea minima: 800px</small></label>
					<div class="col-sm-10">
					<? if ($row["imagine"]!="") { ?>
                      <p class="help-block"><img src="../images/cursuri/<?php echo $row['imagine'];?>" width="250" /></p>
						<a class="btn btn-primary btn-sm" href="<?php echo basename($_SERVER["REQUEST_URI"]);?>&removeimage=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-trash"></i> &nbsp; Sterge imaginea</a>
					<? } else { ?>
						<div class="inputBtnSection">
						<input id="uploadImage" class="disableInputField" placeholder="Selecteaza o imagine" disabled="disabled" />
						<label class="fileUpload">
							<input id="image" name="image" type="file" class="upload" />
						</label>
						</div>
					<? } ?>
					</div>
				</div>
				<div class="hr-line-dashed"></div>
				
				
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-primary" type="submit">Salveaza</button>
					</div>
				</div>
				
				</form>	
			
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
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="js/plugins/fullcalendar/moment.min.js"></script>
    <!-- Date range picker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>

	<!-- Multiple-dates -->
    <script src="js/plugins/Multiple-Dates-Picker-for-jQuery-UI-latest/jquery-ui.multidatespicker.js"></script>
    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
	<script src="js/plugins/ckeditor/ckeditor.js"></script>	
<script>
  $(function () {
    // Replace the <textareas> with a CKEditor instance.
    CKEDITOR.replace('text1'),
    CKEDITOR.replace('text2'),
    CKEDITOR.replace('text3'),
    CKEDITOR.replace('text4'),
    CKEDITOR.replace('text5'),
    CKEDITOR.replace('text6'),
    CKEDITOR.replace('text7'),
    CKEDITOR.replace('text8'),
    CKEDITOR.replace('text9'),
    CKEDITOR.replace('text10'),
    CKEDITOR.replace('text14'),
    CKEDITOR.replace('text15')
	})
</script>	
    <script>
        $(document).ready(function(){
			
			// Perioada inscriere
			$('input[name="perioada"]').daterangepicker();
		
			// Desfasurare curs
			var today = new Date();
			var y = today.getFullYear();
			
			$('#mdp-demo').multiDatesPicker({
				
			addDates: [<?php echo $desfasurare;?>],
			numberOfMonths: [3,4],
			defaultDate: '1/1/2020'
			});
			
			// Validare curs
			$("#form").validate({
                 rules: {
                     cursanti: {
                         required: true,
                         number: true
                     },
                     pret: {
                         required: true,
                         number: true
                     }
                 }
             });

			$(".select2").select2();
			
			// Check-boxuri
			$('.i-checks').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
			});

       });
    </script>
	<!-- CK Editor 4 -->

</body>

</html>