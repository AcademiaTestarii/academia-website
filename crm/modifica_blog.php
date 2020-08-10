<?php include("../__connect.php");

// produs de modificat
if (isset($_GET['id']) AND is_numeric($_GET['id'])) {
$id=$_GET['id'];
$sql_noutate="SELECT * FROM `noutati` WHERE `id_noutate`=".$id;
$query_noutate=mysqli_query($link,$sql_noutate);
$row_noutate=mysqli_fetch_array($query_noutate);
} else {
	//header ("Location: index.php");
}
$pagetitle="Blog";
// modificare
if (isset($_POST['modifica'])) {
    
    if($_POST['active'] == 'on') {
        
        $active = 1;
        
    } else {
        
        $active = 0;
        
    }
    
	$sql_insert='UPDATE `noutati` SET
	`titlu`="'.mysqli_real_escape_string($link,$_POST['titlu']).'",
	`cuvinte_cheie`="'.mysqli_real_escape_string($link,$_POST['cuvinte_cheie']).'",
	`text`="'.mysqli_real_escape_string($link,$_POST['text']).'",
	`data_articol`=STR_TO_DATE("'.$_POST['data_articol'].'","%m/%d/%Y"),
    `active`='.$active.' 
	WHERE `id_noutate`='.$id;
	
	if ($query_insert=mysqli_query($link,$sql_insert)) {	
		header("Location: modifica_blog.php?id=".$id);
	} else { 
		printf("Error SQL modificare blog: %s\n", mysqli_error($link));
	}

}

/* metatags */
$metakeyList="";
$sql_meta="SELECT * FROM `noutati` WHERE `cuvinte_cheie`<>''";
$query_meta=mysqli_query($link,$sql_meta);
while($rowmeta = mysqli_fetch_array($query_meta)) {
	$metakeysParts = explode(",", $rowmeta['cuvinte_cheie']);
		foreach($metakeysParts as $metakey) {
			if (trim($metakey!="")) {
				$metakey = trim($metakey);
				@$metakeys[$metakey] = $metakeys[$metakey] + 1;
			}
		}
	}
ksort($metakeys);
foreach($metakeys as $metakeyname => $value) { 
	$metakeyList .="'".$metakeyname."', ";
}
$metakeyList=rtrim($metakeyList,', '); // remove the last comma
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia Testarii CRM | <?php echo $pagetitle;?> </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
	<link href="css/plugins/jQueryUI/jquery-ui.css" rel="stylesheet">
    <link href="js/plugins/Multiple-Dates-Picker-for-jQuery-UI-latest/jquery-ui.multidatespicker.css" rel="stylesheet">
	<link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
	<link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
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
                    <h2><?php echo $pagetitle;?></h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Home</a></li>
                        <li class="active"><a href="blog.php"><strong><?php echo $pagetitle;?></strong></a></li>
                    </ol>
                </div>
                <div class="col-sm-4">
					<div class="title-action">
						<a class="btn btn-primary" href="adauga_blog.php">Adauga</a>
					</div>
				</div>
            </div>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5><?php echo $pagetitle;?><small></small></h5>
				</div>
				<div class="ibox-content">
		
		          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Detalii si text</a></li>
              <li><a href="#tab_2" data-toggle="tab">Imagini</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
		<!-- Form start -->
		<form role="form" method="POST" accept-charset="UTF-8">
          <div class="box box-primary">
            
              <div class="box-body">
			  <div class="row">

			  <div class="checkbox col-md-12">
				  <label>
					<input name="active" type="checkbox" <?php if (($row_noutate["active"])==1) {echo"checked";}?> /> Activ
				  </label>&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
			  
			  <div class="col-md-4">
                <div class="form-group">
                  <label for="titlu">Titlu</label></small>
                  <input type="text" name="titlu" class="form-control" id="titlu" value="<?php echo $row_noutate['titlu'];?>">
                </div>
				</div>
				
				<div class="form-group" id="data_1">
				<label class="font-noraml">Data</label>
				<div class="input-group date"> 
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="data_articol" value="<?php echo strftime("%m/%d/%Y", strtotime($row_noutate["data_articol"]));?>">
				</div>
			</div>
				
                </div><!-- /.row -->

								<div class="row">
				
				
				<div class="col-md-12">
				<div class="form-group">
				  <label>Cuvinte cheie <small>(despartite de virgula)</small></label>
				  <input type="text" class="form-control" name="cuvinte_cheie" id="singleFieldTags2" value="<?php echo $row_noutate["cuvinte_cheie"];?>" />
				</div>
				</div>

                </div><!-- /.row -->
				
				</div><!-- /.box-body -->
              </div><!-- /.box-primary -->

			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Text</small>
              </h3>
            </div><!-- /.box-header -->
            <div class="box-body pad">
				<textarea id="text" name="text" rows="5" cols="80" class="summernote"><?php echo $row_noutate['text'];?></textarea>
            </div>
          </div><!-- /.box-info -->
		  
		 

              <div class="box-footer">
                <button type="submit" name="modifica" value="modifica" class="btn btn-primary">Modifica</button>
              </div>
            </form>
			<!-- Form end -->
              </div>
              <!-- /.tab-pane -->
			  
              <div class="tab-pane" id="tab_2">
			  <div id="dropzone">
				<form action="upload_images_blog.php?id=<?php echo $id; ?>" class="dropzone" id="noutati_dropzone">
					<div class="dz-message">Trage fisierele aici sau click pentru upload.<br> <span class="note">(Se pot selecta multiple fisiere si la drag si la upload)</span></div>
					
				</form>
              </div>    
                  <?php $select_images_query="SELECT * FROM `imagini_noutati` WHERE `id_noutate` = " . $id;
                 
                  $select_images = mysqli_query($link, $select_images_query);
                  if($select_images->num_rows != 0) { ?>
                  <hr />
                  <form method="post" action="sterge_imagini_blog.php?id=<?php echo $id; ?>">
                  <div class="row">
                    <?php while($image = mysqli_fetch_assoc($select_images)) { ?>    
                      
                      <div class="col-md-2 pb-30">
                          <input type="checkbox" name="galerie[]" value="<?php echo $image['id_imagine'];?>" /> Sterge
                          <img class="img-responsive thumbnail" src="../images/blog/<?php echo $image['imagine']; ?>">
                          <input type="radio" name="imagine_principala" value="<?php echo $image['id_imagine'];?>" <?php if($image['imagine_principala'] == 1) echo "checked"; ?>> Imagine principala
                          </div>
                      
                    <?php } ?>  
                      <div class="col-md-12"><button class="btn btn-block btn-danger" type="submit" name="sterge_galerie">Sterge imaginile selectate / Modifica imaginea principala</button></div>
                  </div>
                  </form>
                  <?php } ?>
                  
              </div>
              <!-- /.tab-pane -->
			  
				
			  
			  
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
		

          </div><!-- /.col-md-12 -->

      </div><!-- /.row -->
      
    </section><!-- /.container-frluid -->
        <div class="footer">
<?php include("include.footer.php");?>
        </div>
		
        </div>
        </div>

    <!-- Main scripts -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
   <!-- Data picker -->
   <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

<!-- Dropzone -->
<script src="dropzone/dropzone.js"></script>
<link rel="stylesheet" href="dropzone/dropzone.css">

<!-- CK Editor 4 -->
<script src="js/plugins/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textareas> with a CKEditor instance.
    CKEDITOR.replace('text')
  })
</script>

<!-- Tagit script -->
<link href="js/plugins/tagit/jquery.tagit.css" rel="stylesheet" type="text/css">
<link href="js/plugins/tagit/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
<script src="js/plugins/tagit/tag-it.js" type="text/javascript" charset="utf-8"></script>
<script>
    
Dropzone.options.noutatiDropzone = {
  resizeWidth: 1200
};

$('#data_1 .input-group.date').datepicker({
	todayBtn: "linked",
	keyboardNavigation: false,
	forceParse: false,
	calendarWeeks: false,
	autoclose: true
});
    
	$(function(){
		var sampleTags = [<?php echo $metakeyList;?>];

		//-------------------------------
		// Minimal
		//-------------------------------
		$('#myTags').tagit();

		//-------------------------------
		// Single field
		//-------------------------------
		$('#singleFieldTags').tagit({
			availableTags: sampleTags,
			// This will make Tag-it submit a single form value, as a comma-delimited field.
			singleField: true,
			singleFieldNode: $('#mySingleField')
		});

		// singleFieldTags2 is an INPUT element, rather than a UL as in the other 
		// examples, so it automatically defaults to singleField.
		$('#singleFieldTags2').tagit({
			availableTags: sampleTags,
			allowSpaces: true
		});

		//-------------------------------
		// Preloading data in markup
		//-------------------------------
		$('#myULTags').tagit({
			availableTags: sampleTags, // this param is of course optional. it's for autocomplete.
			// configure the name of the input field (will be submitted with form), default: item[tags]
			itemName: 'item',
			fieldName: 'tags'
		});

		//-------------------------------
		// Tag events
		//-------------------------------
		var eventTags = $('#eventTags');

		var addEvent = function(text) {
			$('#events_container').append(text + '<br>');
		};

		eventTags.tagit({
			availableTags: sampleTags,
			beforeTagAdded: function(evt, ui) {
				if (!ui.duringInitialization) {
					addEvent('beforeTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
				}
			},
			afterTagAdded: function(evt, ui) {
				if (!ui.duringInitialization) {
					addEvent('afterTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
				}
			},
			beforeTagRemoved: function(evt, ui) {
				addEvent('beforeTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
			},
			afterTagRemoved: function(evt, ui) {
				addEvent('afterTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
			},
			onTagClicked: function(evt, ui) {
				addEvent('onTagClicked: ' + eventTags.tagit('tagLabel', ui.tag));
			},
			onTagExists: function(evt, ui) {
				addEvent('onTagExists: ' + eventTags.tagit('tagLabel', ui.existingTag));
			}
		});

		//-------------------------------
		// Read-only
		//-------------------------------
		$('#readOnlyTags').tagit({
			readOnly: true
		});

		//-------------------------------
		// Tag-it methods
		//-------------------------------
		$('#methodTags').tagit({
			availableTags: sampleTags
		});

		//-------------------------------
		// Allow spaces without quotes.
		//-------------------------------
		$('#allowSpacesTags').tagit({
			availableTags: sampleTags,
			allowSpaces: true
		});

		//-------------------------------
		// Remove confirmation
		//-------------------------------
		$('#removeConfirmationTags').tagit({
			availableTags: sampleTags,
			removeConfirmation: true
		});
		
	});
</script>

</body>
</html>