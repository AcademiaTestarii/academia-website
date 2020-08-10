<?php
if(session_status()!=2)
	session_start();
if($_GET['e']=='0')
{
                       $message='Trebuie să îţi activezi contul mai întâi!';
} else if($_GET['e']=='1'){
    $message = 'Date incorecte!';
}
require 'config.php';
if(!empty($_POST['email']) && !empty($_POST['password'])):

	$records = $conn->prepare('SELECT ID,Email,Password,Active FROM form2 WHERE email = :Email');
	$records->bindParam(':Email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) >0 && $_POST['password']==base64_decode($results['Password'])){
		if($results['Active'] == 0){
                    $message='Trebuie să îţi activezi contul mai întâi!';
                    header("Location: https://academiatestarii.ro/index.php?page=login&e=0");                    

                    }
        else {
                $_SESSION['ID'] = $results['ID'];
		header("Location: ../cont");
                }
	}else{
		//die(base64_decode($results['Password']));
                header("Location: https://academiatestarii.ro/login?e=1");
		$message = 'Date incorecte!';
		
//echo($message);
	}

	endif;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<br>
<div class="container">
	<div class="jumbotron">
		<center>
			<h1>Intră în cont</h1>
			<form action="Login/login.php" method="POST">
                            <p><?php echo $message;?></p>
				<input type="text" name="email" placeholder="email"></input>
				<br>
				<br>
				<input type="password" name="password" placeholder="parolă"></input>
				<br>
				<br>
				<input type="submit" value="Login"></input>
			</form>
		</center>
	</div>
</div>
<script type="text/javascript">
	function changeLoc()
	{
		document.location="index.php";
	}
</script>
</body>
</html>