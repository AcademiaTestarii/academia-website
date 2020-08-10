<?php

?>


<html>
<head>
	<title>Formular Înscriere</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="javascript/getInscrisiRequest.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
</head>
<style>


</style>
<body bgcolor="#ffa64d">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="container">

    <div class="jumbotron">
<form action="Formular/proc/process.php" name="frmhot" id="myCCForm" method="post" onsubmit="checkform(event)">
<input type="hidden" name="formID" value="form2" />
<input type="hidden" name="redirect_to" value="" />
<input type="hidden" name="statusCurs"/>
<br>
Nume
<input type="text" name="Nume" id="in1" value="" required minlength="1" maxlength="256" pattern="[A-Z a-z]+"></input><font color="red">*</font>
Prenume
<input type="text" name="Prenume" value="" required minlength="1" maxlength="256" pattern="[A-Z a-z]+"></input><font color="red">*</font>
<br>
<br>
<div ng-app="email">
    <div ng-controller="mail">    
Email
<input type="text" ng-model="Email" ng-change="update()" id="mailFormat" name="Email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required></input><font color="red">*</font>
</div>
</div>
<br>
Password
<input type="password" name="Password" value="" required minlength="6" maxlength="256" pattern="[A-Za-z0-9!@#$]+"></input><font color="red">*</font>
<br>
<br>
Profesie actuală
<input type="text" name="Profesie" value="" required minlength="1" maxlength="256"></input><font color="red">*</font>
Telefon
<input type="text" name="Phone" value="" required maxlength="10" minlength="10" pattern="07+[0-9]+"></input><font color="red">*</font>

<br>
<br>
Dată naştere
<input type="date" name="Data Nastere" min="1901-01-01" max="2002-12-12" required><font color="red">*</font>
<br>
<br>
<!--
<span id="Plata2">Variantă de plată</span>
<select name="Plata" id="Plata">
	<option value="integral">Plata integrală</option>
	<option value="rate">Plata în 2 rate</option>
</select>
<br>
<br>-->
<div style="display: none">
Metodă de plată
<select name="Metoda" onChange="myFunction()">
   <!-- <option value="1">Online</option>-->
    <option value="2" selected="true">Transfer Bancar</option>
</select><font color="red">*</font>
</div>
<br>

Perioadă de cursuri
<div id="App2">
    <div ng-controller="main" ng-cloak>
    <select name="Perioada" id="Perioada" ng-change="update()" ng-model="mode">
        <option value="1" ng-selected="true">{{curs1}}</option>
	<option value="2">{{curs2}}</option>
	<option value="3">{{curs3}}</option>
	<option value="4">{{curs4}}</option>
    </select><font color="red">*</font>
Locuri disponibile:{{putInscrisi}}
</div>
</div>
<br>
Educaţie<font color="red">*</font>
<br>
<textarea rows="3" cols="30" name="Educatie" value="" minlength="1" maxlength="256" required></textarea>
<br>
<br>
Cunoştinţe engleză
<select name="Engleza">
	<option value="1">Începător</option>
        <option value="2" selected="true">Mediu</option>
	<option value="3">Avansat</option>
</select><font color="red">*</font>
Cunoştinţe office
<select name="Office">
	<option value="1">Începător</option>
	<option value="2">Mediu</option>
	<option value="3">Avansat</option>
</select><font color="red">*</font>
Cunoştinţe web
<select name="Web">
	<option value="1">Începător</option>
	<option value="2">Mediu</option>
	<option value="3">Avansat</option>
</select><font color="red">*</font>

<input type="hidden" name="Active" value="0"/>
  <br>
  <br>
  Cost cursuri
  <ul>
      <li>Integral:900 Lei</li>
      <li>În 2 rate:1000 Lei(500 Lei prima rată)</li>
  </ul>
  <button type="submit" class="btn btn-primary yourCustomClass" >Submit</button>

</form>

</div>
</div>
<script type="text/javascript">
    function changeLoc(){
			document.location="../Principal/home.php";
		}
		function checkform(evt){
			var myForm = document.frmhot;
			var condition = true;
			if(myForm.Nume.value==""){
				//alert(myForm.Nume.value);
				alert("Introduceţi numele!");
				condition = false;
			}
		else
			if(myForm.Prenume.value==""){
				alert("Introduceţi prenumele!");
				condition = false;
			}
		else
			if(myForm.Profesie.value==""){
				alert("Introduceţi profesia actuală!");
				condition = false;
			}
		else	
			if(myForm.Username.value==""){
				alert("Alegeţi un username!");
				condition = false;
			}
		else	
			if(myForm.Password.value==""){
				alert("Alegeţi o parolă!");
				condition = false;
			}
		else	
			if(myForm.Email.value==""){
				alert("Introduceţi adresa de email!");
				condition = false;
			}
			//alert(condition);
			if(condition) {condition = confirm('Submit?');}
			if(!condition){
				if(evt.preventDefault) { event.preventDefault();}
				else if(evt.returnValue){evt.returnValue=false;}
				else return false;
			}
		}
    function valMail(id){
    var Email=document.getElementById(id).value;
    Email = Email.trim();
    if(!Email.match(/^.+@.+$/)){
        alert("Introdu date valide!");
        Email = "";
    }
    
    
    
    }
</script>
</body>
</html>