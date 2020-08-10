<?php

$path="../images/blog/";$db="imagini_noutati";

include("../__connect.php");

$ds=DIRECTORY_SEPARATOR;  //1
 
$storeFolder = $path;   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
    
    if(is_numeric($_GET['id'])) {
        
        $insert_image_sql="INSERT INTO `".$db."` (`imagine`, `id_noutate`) VALUES ('" . $_FILES['file']['name'] . "', " . $_GET['id'] . ")";
        $insert_image=mysqli_query($link,$insert_image_sql);
        
    }
        
}


?>