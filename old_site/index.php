<?php
session_start();
if(!isset($_SERVER['HTTPS']))
    header ("Location: https://academiatestarii.ro");
$var_https_site = "https://academiatestarii.ro";
include("includes/header.html");
include("includes/navbar.html");
if(isset($_GET['page']))
{
			if($_GET['page'] == "info" || $_GET['page']=="despre-noi")	{ include("includes/informatii.html"); } // /despre-noi
			else if($_GET['page']=="bankInfo" || $_GET['page']=="confirmare"){         include("Formular/proc/bankInfo.php");} // /confirmare
			else if($_GET['page']=="ContulMeu"  || $_GET['page']=="cont"){ 		include("PaginaPers/pers.php"); }    // /cont
			else if($_GET['page'] == "QAdenum"  || $_GET['page']=="initiere-in-software-testing") { 		include("includes/cursQAdenum.php"); }  
																	//  /initiere-in-software-testing
			else if($_GET['page'] == "progCursuri"  || $_GET['page']=="program-cursuri"){	include("includes/progCursuri.php");} // /program-cursuri
			else if($_GET['page'] == "about" ){			include("includes/about.html");}   // /about
			else if($_GET['page'] == "contact"  ){		include("includes/contact.html");} // /contact
			else if($_GET['page'] == "register"  || $_GET['page']=="inscriere"){		include("Formular/agreement.php");} // /inscriere
			else if($_GET['page'] == "login" ){			include("Login/login.php");} // /login
			else if($_GET['page'] == "form"  || $_GET['page']=="formular-inscriere"){			include("Formular/proc/index.php"); } // /formular-inscriere
}
else if(isset($_GET['checkbox'])){
		if($_GET['checkbox']=="check") 					include("Formular/proc/index.php");
	}
else if(isset($_GET['submit'])){
		if($_GET['submit']=="Next") 					include("Formular/agreement.php");
	}
else{  													include("includes/home.html"); }
include("includes/footer.html");
 
?>