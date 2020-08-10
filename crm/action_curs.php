<?php
include("../__connect.php");

if (isset($_POST['action'])) {
	
/*-------------------------------------------------------------------------------------------------------------------------*/
// duplicat 
if ($_POST['action']=="duplicat") {

if (isset($_POST['activ'])) {$activ=1;} else {$activ=0;}
if (isset($_POST['planificat'])) {$planificat=1;} else {$planificat=0;}
if (isset($_POST['weekend'])) {$weekend=1;} else {$weekend=0;}
if (isset($_POST['bucuresti'])) {$bucuresti=1;} else {$bucuresti=0;}

// perioada inscriere
$perioada=$_POST['desfasurare'];
$inscriere = explode(', ', $perioada);
$n=count($inscriere);
$start_inscriere = $inscriere[0];
$end_inscriere = $inscriere[$n-1];

$sql="
INSERT INTO `cursuri` 
(`parent`,`titlu`,`descriere`,`descriere_scurta`,`start_inscriere`,`end_inscriere`,`cursanti`,`pret`,`pret_redus`,`cui`,`ce`,`costuri`,`resurse`,`structura`,`cerinte`,`programa`,`early`,`loyality`,`friends`,`discount`,`activ`,`planificat`,`weekend`,`bucuresti`,`desfasurare`)
VALUES
(
".$_POST['id_curs_main'].",
'".trim(mysqli_real_escape_string($link,$_POST['titlu']))."',
'".trim(mysqli_real_escape_string($link,$_POST['descriere']))."',
'".trim(mysqli_real_escape_string($link,$_POST['descriere_scurta']))."',
STR_TO_DATE('".$start_inscriere."','%m/%d/%Y'),
STR_TO_DATE('".$end_inscriere."','%m/%d/%Y'),
".$_POST['cursanti'].",
".$_POST['pret'].",
".$_POST['pret_redus'].",
'".trim(mysqli_real_escape_string($link,$_POST['cui']))."',
'".trim(mysqli_real_escape_string($link,$_POST['ce']))."',
'".trim(mysqli_real_escape_string($link,$_POST['costuri']))."',
'".trim(mysqli_real_escape_string($link,$_POST['resurse']))."',
'".trim(mysqli_real_escape_string($link,$_POST['structura']))."',
'".trim(mysqli_real_escape_string($link,$_POST['cerinte']))."',
'".trim(mysqli_real_escape_string($link,$_POST['programa']))."',
'".trim(mysqli_real_escape_string($link,$_POST['early']))."',
'".trim(mysqli_real_escape_string($link,$_POST['loyality']))."',
'".trim(mysqli_real_escape_string($link,$_POST['friends']))."',
'".trim(mysqli_real_escape_string($link,$_POST['discount']))."',
".$activ.",
".$planificat.",
".$weekend.",
".$bucuresti.",
'".trim(mysqli_real_escape_string($link,$_POST['desfasurarecurs']))."'
)
";

//echo $sql;
if ($query=mysqli_query($link,$sql)) {
	$id_curs=mysqli_insert_id($link); // get inserted id
	
	// desfasurare 
	if ($_POST['desfasurare']!="") {
		$desfasurare = explode(', ', $_POST['desfasurare']);
		foreach($desfasurare as $data_desfasurare) {
			$sqldata="INSERT INTO `date_cursuri` (`id_curs`,`data`) VALUES (".$id_curs.",STR_TO_DATE('".$data_desfasurare."','%m/%d/%Y'))";
			if ($querydata=mysqli_query($link,$sqldata)) { echo "Done | "; } else { printf("Error SQL adaugare perioada: %s\n", mysqli_error($link));} 
		}
	}
	
	// trainer
	if ($_POST['trainer']!="") {
		$adauga_trainer="INSERT INTO `trainer_curs` (`id_trainer`,`id_curs`) VALUES (".$_POST['trainer'].",".$id_curs.")";
		if (!$query_trainer=mysqli_query($link,$adauga_trainer)) { printf("Error SQL adaugare trainer: %s\n", mysqli_error($link));}
	}
	
	} else { printf("Error SQL adaugare curs: %s\n", mysqli_error($link)); }


if ($_FILES['image']!="") {
include_once('class.upload/class.upload.php');
    $handle = new upload($_FILES['image']);
    if ($handle->uploaded) {
        $handle->image_resize			= true;
		$handle->image_x				= 800;
		$handle->image_ratio_y			= true;
		// path
        $handle->process(dirname( __FILE__ )."/../images/cursuri/");
        $img_name = $handle->file_dst_name;
        if ($handle->processed) {
		mysqli_query($link,"UPDATE `cursuri` SET `imagine`='".$img_name."' WHERE `id`=".$id_curs);
		$handle->clean();
        } else {
			echo "Process Error: Something went wrong: ".$handle->error;
			$handle->clean();
        }
    } else {
		echo "File Error: Something went wrong: ".$handle->error;
		$handle->clean();
    }	
} // end image upload

if ($_FILES['filepdf']!="") {
include_once('class.upload/class.upload.php');
    $handle = new upload($_FILES['filepdf']);
    if ($handle->uploaded) {
		// path
        $handle->process(dirname( __FILE__ )."/../documente/");
        $pdf_name = $handle->file_dst_name;
        if ($handle->processed) {
		mysqli_query($link,"UPDATE `cursuri` SET `pdf_programa`='".$pdf_name."' WHERE `id`=".$id_curs);
		$handle->clean();
        } else {
			echo "Process Error: Something went wrong: ".$handle->error;
			$handle->clean();
        }
    } else {
		echo "File Error: Something went wrong: ".$handle->error;
		$handle->clean();
    }	
} // end file upload

} // end duplicat


// ---------------------------------------------------------------------------------------------------------------------------------------------------------
// Modificare 
if ($_POST['action']=="modifica") {

if (isset($_POST['activ'])) {$activ=1;} else {$activ=0;}
if (isset($_POST['planificat'])) {$planificat=1;} else {$planificat=0;}
if (isset($_POST['weekend'])) {$weekend=1;} else {$weekend=0;}
if (isset($_POST['bucuresti'])) {$bucuresti=1;} else {$bucuresti=0;}

// perioada inscriere
$perioada=$_POST['desfasurare'];
$inscriere = explode(', ', $perioada);
$n=count($inscriere);
$start_inscriere = $inscriere[0];
$end_inscriere = $inscriere[$n-1];
if ($_POST['pret_redus']=="" || !isset($_POST['pret_redus']) || $_POST['pret_redus']==0) {$pret_redus=NULL;} else {$pret_redus=$_POST['pret_redus'];}
// update cursuri
$sql="
UPDATE `cursuri` SET 
`titlu`='".trim(mysqli_real_escape_string($link,$_POST['titlu']))."',
`descriere_scurta`='".trim(mysqli_real_escape_string($link,$_POST['descriere_scurta']))."',
`descriere`='".trim(mysqli_real_escape_string($link,$_POST['descriere']))."',
`start_inscriere`=STR_TO_DATE('".$start_inscriere."','%m/%d/%Y'),
`end_inscriere`=STR_TO_DATE('".$end_inscriere."','%m/%d/%Y'),
`cursanti`=".$_POST['cursanti'].",
`pret`=".$_POST['pret'].",
`pret_redus`='".$pret_redus."',
`cui`='".trim(mysqli_real_escape_string($link,$_POST['cui']))."',
`ce`='".trim(mysqli_real_escape_string($link,$_POST['ce']))."',
`costuri`='".trim(mysqli_real_escape_string($link,$_POST['costuri']))."',
`resurse`='".trim(mysqli_real_escape_string($link,$_POST['resurse']))."',
`structura`='".trim(mysqli_real_escape_string($link,$_POST['structura']))."',
`cerinte`='".trim(mysqli_real_escape_string($link,$_POST['cerinte']))."',
`programa`='".trim(mysqli_real_escape_string($link,$_POST['programa']))."',
`early`='".trim(mysqli_real_escape_string($link,$_POST['early']))."',
`loyality`='".trim(mysqli_real_escape_string($link,$_POST['loyality']))."',
`friends`='".trim(mysqli_real_escape_string($link,$_POST['friends']))."',
`discount`='".trim(mysqli_real_escape_string($link,$_POST['discount']))."',
`desfasurare`='".trim(mysqli_real_escape_string($link,$_POST['desfasurarecurs']))."',
`weekend`=".$weekend.",
`activ`=".$activ.",
`planificat`=".$planificat.",
`bucuresti`=".$bucuresti."
WHERE `id`=".$_POST['id'];
if (!$query=mysqli_query($link,$sql)) { printf("Error SQL modificare curs %s\n", mysqli_error($link));}

// update desfasurare
	
$sql="DELETE FROM `date_cursuri` WHERE `id_curs`=".$_POST['id'];
mysqli_query($link,$sql);
$desfasurare = explode(', ', $_POST['desfasurare']);
foreach($desfasurare as $data_desfasurare) {
	$sqldata="INSERT INTO `date_cursuri` (`id_curs`,`data`) VALUES (".$_POST['id'].",STR_TO_DATE('".$data_desfasurare."','%m/%d/%Y'))";
	if ($querydata=mysqli_query($link,$sqldata)) { echo "Done | "; } else { printf("Error SQL adaugare perioada: %s\n", mysqli_error($link));} 
}

// update trainer
	
$sql="DELETE FROM `trainer_curs` WHERE `id_curs`=".$_POST['id'];
mysqli_query($link,$sql);
$adauga_trainer="INSERT INTO `trainer_curs` (`id_trainer`,`id_curs`) VALUES (".$_POST['trainer'].",".$_POST['id'].")";
if (!$query_trainer=mysqli_query($link,$adauga_trainer)) { printf("Error SQL adaugare trainer: %s\n", mysqli_error($link));}

if ($_FILES['image']!="") {
include_once('class.upload/class.upload.php');
    $handle = new upload($_FILES['image']);
    if ($handle->uploaded) {
        $handle->image_resize			= true;
		$handle->image_x				= 800;
		$handle->image_ratio_y			= true;
		// path
        $handle->process(dirname( __FILE__ )."/../images/cursuri/");
        $img_name = $handle->file_dst_name;
        if ($handle->processed) {
		mysqli_query($link,"UPDATE `cursuri` SET `imagine`='".$img_name."' WHERE `id`=".$_POST['id']);
		$handle->clean();
        } else {
			echo "Process Error: Something went wrong: ".$handle->error;
			$handle->clean();
        }
    } else {
		echo "File Error: Something went wrong: ".$handle->error;
		$handle->clean();
    }	
} // end image upload

if ($_FILES['filepdf']!="") {
include_once('class.upload/class.upload.php');
    $handle = new upload($_FILES['filepdf']);
    if ($handle->uploaded) {
		// path
        $handle->process(dirname( __FILE__ )."/../documente/");
        $pdf_name = $handle->file_dst_name;
        if ($handle->processed) {
			echo $fisier="UPDATE `cursuri` SET `pdf_programa`='".$pdf_name."' WHERE `id`=".$_POST['id'];
			if ($fisierok=mysqli_query($link,$fisier)) { echo "Done fisier "; } else { printf("Error SQL adaugare pdf: %s\n", mysqli_error($link));} 
		$handle->clean();
        } else {
			echo "Process Error: Something went wrong: ".$handle->error;
			$handle->clean();
        }
    } else {
		echo "File Error: Something went wrong: ".$handle->error;
		$handle->clean();
    }	
} // end file upload

} // end modificare


// Adaugare ----------------------------------------------------------------------------------------------------------------------
if ($_POST['action']=="adaugare") {

if (isset($_POST['activ'])) {$activ=1;} else {$activ=0;}
if (isset($_POST['planificat'])) {$planificat=1;} else {$planificat=0;}
if (isset($_POST['weekend'])) {$weekend=1;} else {$weekend=0;}
if (isset($_POST['bucuresti'])) {$bucuresti=1;} else {$bucuresti=0;}


$sql="INSERT INTO `curs_main` (titlu_main) VALUES ('".trim(mysqli_real_escape_string($link,$_POST['titlu_main']))."')";
if ($query=mysqli_query($link,$sql)) {
	$id_curs_main=mysqli_insert_id($link); // get inserted id
} else { printf("Error SQL adaugare curs: %s\n", mysqli_error($link)); }

// perioada inscriere
$perioada=$_POST['desfasurare'];
$inscriere = explode(', ', $perioada);
$n=count($inscriere);
$start_inscriere = $inscriere[0];
$end_inscriere = $inscriere[$n-1];
if ($_POST['pret_redus']=="" || !isset($_POST['pret_redus']) || $_POST['pret_redus']==0) {$pret_redus=NULL;} else {$pret_redus=$_POST['pret_redus'];}
$sql="
INSERT INTO `cursuri` 
(`parent`,`titlu`,`descriere`,`descriere_scurta`,`start_inscriere`,`end_inscriere`,`cursanti`,`pret`,`pret_redus`,`cui`,`ce`,`costuri`,`resurse`,`structura`,`cerinte`,`programa`,`early`,`loyality`,`friends`,`discount`,`activ`,`planificat`,`weekend`,`bucuresti`,`desfasurare`)
VALUES
(
".$id_curs_main.",
'".trim(mysqli_real_escape_string($link,$_POST['titlu']))."',
'".trim(mysqli_real_escape_string($link,$_POST['descriere']))."',
'".trim(mysqli_real_escape_string($link,$_POST['descriere_scurta']))."',
STR_TO_DATE('".$start_inscriere."','%m/%d/%Y'),
STR_TO_DATE('".$end_inscriere."','%m/%d/%Y'),
".$_POST['cursanti'].",
".$_POST['pret'].",
".$pret_redus.",
'".trim(mysqli_real_escape_string($link,$_POST['cui']))."',
'".trim(mysqli_real_escape_string($link,$_POST['ce']))."',
'".trim(mysqli_real_escape_string($link,$_POST['costuri']))."',
'".trim(mysqli_real_escape_string($link,$_POST['resurse']))."',
'".trim(mysqli_real_escape_string($link,$_POST['structura']))."',
'".trim(mysqli_real_escape_string($link,$_POST['cerinte']))."',
'".trim(mysqli_real_escape_string($link,$_POST['programa']))."',
'".trim(mysqli_real_escape_string($link,$_POST['early']))."',
'".trim(mysqli_real_escape_string($link,$_POST['loyality']))."',
'".trim(mysqli_real_escape_string($link,$_POST['friends']))."',
'".trim(mysqli_real_escape_string($link,$_POST['discount']))."',
".$activ.",
".$planificat.",
".$weekend.",
".$bucuresti.",
'".trim(mysqli_real_escape_string($link,$_POST['desfasurarecurs']))."'
)
";

//echo $sql;
if ($query=mysqli_query($link,$sql)) {
	$id_curs=mysqli_insert_id($link); // get inserted id
	
	// desfasurare 
	if ($_POST['desfasurare']!="") {
		$desfasurare = explode(', ', $_POST['desfasurare']);
		foreach($desfasurare as $data_desfasurare) {
			$sqldata="INSERT INTO `date_cursuri` (`id_curs`,`data`) VALUES (".$id_curs.",STR_TO_DATE('".$data_desfasurare."','%m/%d/%Y'))";
			if ($querydata=mysqli_query($link,$sqldata)) { echo "Done | "; } else { printf("Error SQL adaugare perioada: %s\n", mysqli_error($link));} 
		}
	}
	
	// trainer
	if ($_POST['trainer']!="") {
		$adauga_trainer="INSERT INTO `trainer_curs` (`id_trainer`,`id_curs`) VALUES (".$_POST['trainer'].",".$id_curs.")";
		if (!$query_trainer=mysqli_query($link,$adauga_trainer)) { printf("Error SQL adaugare trainer: %s\n", mysqli_error($link));}
	}
	
	} else { printf("Error SQL adaugare curs: %s\n", mysqli_error($link)); }


if ($_FILES['image']!="") {
include_once('class.upload/class.upload.php');
    $handle = new upload($_FILES['image']);
    if ($handle->uploaded) {
        $handle->image_resize			= true;
		$handle->image_x				= 800;
		$handle->image_ratio_y			= true;
		// path
        $handle->process(dirname( __FILE__ )."/../images/cursuri/");
        $img_name = $handle->file_dst_name;
        if ($handle->processed) {
		mysqli_query($link,"UPDATE `cursuri` SET `imagine`='".$img_name."' WHERE `id`=".$id_curs);
		$handle->clean();
        } else {
			echo "Process Error: Something went wrong: ".$handle->error;
			$handle->clean();
        }
    } else {
		echo "File Error: Something went wrong: ".$handle->error;
		$handle->clean();
    }	
} // end image upload

if ($_FILES['filepdf']!="") {
include_once('class.upload/class.upload.php');
    $handle = new upload($_FILES['filepdf']);
    if ($handle->uploaded) {
		// path
        $handle->process(dirname( __FILE__ )."/../documente/");
        $img_pdf = $handle->file_dst_name;
        if ($handle->processed) {
		mysqli_query($link,"UPDATE `cursuri` SET `pdf_programa`='".$img_pdf."' WHERE `id`=".$id_curs);
		$handle->clean();
        } else {
			echo "Process Error: Something went wrong: ".$handle->error;
			$handle->clean();
        }
    } else {
		echo "File Error: Something went wrong: ".$handle->error;
		$handle->clean();
    }	
} // end file upload

} // end adaugare

/*	
echo "<pre>";
print_r($_POST);
echo "</pre>";	
*/

} else { // no direct access

header("Location:cursuri.php");	
} // end post

header("Location:cursuri.php");	
?>