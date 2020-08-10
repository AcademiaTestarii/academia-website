<?php
	//session_start();
	require 'Login/config.php';
	if(!isset($_SESSION['ID']) ){
		header("Location: ../Login/login.php");
	}else{
		$records = $conn->prepare('SELECT ID,Nume,Prenume,Plata,Perioada FROM form2 WHERE ID=:ID');
		$records->bindParam(':ID', $_SESSION['ID']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = NULL;
	if( count($results)>0){
		$user = $results;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pagina personala</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
</head>
<style>
	body{
		font-family: 'Overpass', sans-serif;
	}

</style>
<body>
<div class="container">
	<div class="jumbotron">
        <form action="Login/logout.php">
<button type="submit" class="btn btn-alert">Logout</button>
</form>
	<center>
	<h1>Hello <?=$user['Nume'];?> <?=$user['Prenume'];?></h1>
	</center>
	</div>
	<br>
	<div class="jumbotron">Situaţia plăţii: <?=$user['Plata'];?>
	<br>
	<br>
	Perioada:
	august-septembrie

	</div>
	<br>

</div>
	<script type="text/javascript">
		function changeLoc(){
			document.location="../Principal/home.php";
		}
	</script>
</body>
</html>