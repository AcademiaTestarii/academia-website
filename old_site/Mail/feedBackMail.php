<?php
    ini_set("SMTP", "mail.academiatestarii.ro");
    ini_set("sendmail_from", "testacad@academiatestarii.ro");
    //$message = $_POST['Mesage'];
    
    $message = 
     "<h4> Formular contact site</h4> '\n\n'
    Nume:" . $_POST['Name']. "'\n'
    Telefon:" . $_POST['Telefon']. "'\n'
    Subiect:" . $_POST['Subject']. "'\n'
    Mesaj:" . $_POST['Mesage']. "'\n'
    Sursa:" . $_POST['Source'];
    
    $headers = "From: " . $_POST['Mail'];
    
    $subject = "Formular contact site: ". $_POST['Subject'];
    //print_r($subject);die();
    
    
   mail("contact@academiatestarii.ro", $subject, $message, $headers);
  
    require_once('../Formular/proc/config.php'); 
    require_once('../Formular/proc/functions.php');

    /*Open the connection to our database use the info from the config file.*/
    $link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);
    
    /*This cleans our &_POST array to prevent against SQL injection attacks.*/
    $_POST = f_clean($_POST);



    $sql="INSERT INTO `contact` ( `Nume`,   `Mail`, `Subiect`, `Mesaj`, `Sursa`) VALUES ('".$_POST[Name]."', '".$_POST[Mail]."', '".$_POST[Subject]."', '".$_POST[Mesage]."', '".$_POST[Source]."')";

    if (!mysql_query($sql)) {
        die('Error: ' . mysql_error());
    }
        
    /*Close our database connection.*/
    mysql_close();



   // die();
    header("Location: ../index.php");