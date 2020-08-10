<?php
require_once('config.php');
require_once('functions.php');
require_once('../../System/database.php');
require_once('../../Mail/mailScript.php');
require_once("../../2Checkout/lib/Twocheckout.php");
//echo "salut";
/*Check to see if the form was submitted from the installed domain. If so,
process the data. If not, kill the script. Obviously, you can disable this, but
it's strongly recommended that you keep this check in place.*/
if($_POST['Metoda']=="2")
{
        

$domain = $_SERVER['HTTP_HOST'];
$uri = parse_url($_SERVER['HTTP_REFERER']);

//$r_domain = substr($uri['host'], strpos($uri['host'],"."),strlen($uri['host']))	;

//if ( $domain == $r_domain ) {

	/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);
	
	/*This cleans our &_POST array to prevent against SQL injection attacks.*/
	$_POST = f_clean($_POST);

	/*These are the main variables we'll use to process the form.*/
	$table = $_POST['formID'];
	$_POST['Password']=base64_encode($_POST['Password']);
	//Teste
	$db=new databaseConnection();
	$query = "SELECT * FROM cursuri WHERE ID = ".$_POST['Perioada'];
	$result=$db->query($query);
	//print_r($result);

	if($result['Locuri']<=0)//>=$result['Locuri'])
	{
                header("Location: https://academiatestarii.ro/formular-inscriere");
                echo "Perioadă plină";
	}
	//Teste
	else{
	//Increments places in cursuri table
	$query = ("UPDATE cursuri SET Inscrisi = Inscrisi+1 WHERE ID = ".$_POST['Perioada']);
	$db->query($query);
	$query = ("UPDATE cursuri SET Locuri = Locuri-1 WHERE ID = ".$_POST['Perioada']);
        $db->query($query);
	$keys = implode(", ", (array_keys($_POST))); 
	$values = implode("', '", (array_values($_POST)));
	
	/*These are variables for our redirect.*/
	$redirect = $_POST['redirect_to'];
	$referred = $_SERVER['HTTP_REFERER'];
	$query = parse_url($referred, PHP_URL_QUERY);
	$referred = str_replace(array('?', $query), '', $referred);

	/*These are the extra data fields we'll collect on form submission.*/
	$x_fields = 'timestamp, ip';
	$x_values = time() . "', '" . 0;

	/*Check to see if the table exists and if it doesn't create it.*/
	if ( !f_tableExists($table, DB_NAME) ) {
		$sql = "CREATE TABLE $table (
			ID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(ID),
			timestamp int NOT NULL,
			ip int NOT NULL
		)";
		
		$result = mysql_query($sql);
		
		if (!$result) {	
			die('Invalid query: ' . mysql_error());
		}
		
	} 

	/*Check to see if the fields specified in the form exist and if they don't, create them.*/
	foreach ($_POST as $key => $value) {
		$column = mysql_real_escape_string($key);
		$alter = f_fieldExists($table, $column, $column_attr = "VARCHAR( 255 ) NULL" );
		
		if (!$alter) {
			echo 'Unable to add column: ' . $column ."<br>";
		}
	}

	/*Insert out values into the database.*/
	$sql="INSERT INTO $table ($keys, $x_fields) VALUES ('$values', '$x_values')";

	if (!mysql_query($sql)) {
		die('Error: ' . mysql_error());
	}
        
	/*Close our database connection.*/
	mysql_close();
        $message = "Dragă ". $_POST['Nume'] . " " . $_POST['Prenume']. "," . "\n\n"
//                . '<html><body>'
//                . '<img src="../../Resources/Mail/acd.jpg"'
//                . '</body></html>' . "\n\n"
//                . "Mulţumim pentru înscriere!" ."\n\n"
                . "Ţi-am rezervat un loc în programul nostru." . "\n\n"
                . "Pentru confirmare, te rugăm să efectuezi transferul şi să trimiţi dovada plăţii la adresa office@academiatestarii.ro în termen de 2 zile lucrătoare." . "\n\n"
                . "Foloseşte detaliile:" . "\n\n"
                . "         1.	Cont IBAN: RO91 RZBR 0000 0600 1930 8157" . "\n\n"
                . "         2.	Deschis la Raiffeisen Bank, Sucursala Floreasca City Center, Bucuresti" . "\n\n"
                . "         3.	Beneficiar: Academia Testării" . "\n"
                . "Îţi stăm la dispoziţie pentru alte informaţii." . "\n\n"
                . "Cele bune" . "\n"
                . "Echipa Academia Testării"
                ;
        mail($_POST['Email'], "Bine aţi venit!", $message, $headers);
         
    header("Location: https://academiatestarii.ro/confirmare");
        }
    
        }else{
$token=$_POST['token'];
//die($token);
Twocheckout::privateKey('6240B70D-43FE-49F7-8E46-6CC71C9D608F');
Twocheckout::sellerId('901346277');
Twocheckout::sandbox(true);  #Uncomment to use Sandbox
if($_POST['Plata']=="integral")
    $sum='600.00';
else
    $sum='300.00';
try {
    $charge = Twocheckout_Charge::auth(array(
        "merchantOrderId" => "123",
        "token" => $token,
        "currency" => 'RON',
        "total" => '1.00',
        "billingAddr" => array(
            "name" => 'Testing Tester',
            "addrLine1" => '123 Test St',
            "city" => 'Columbus',
            "state" => 'OH',
            "zipCode" => '43123',
            "country" => 'USA',
            "email" => 'testingtester@2co.com',
            "phoneNumber" => '555-555-5555'
        ),
        "shippingAddr" => array(
            "name" => 'Testing Tester',
            "addrLine1" => '123 Test St',
            "city" => 'Columbus',
            "state" => 'OH',
            "zipCode" => '43123',
            "country" => 'USA',
            "email" => 'testingtester@2co.com',
            "phoneNumber" => '555-555-5555'
        )
    ), 'array');
    if ($charge['response']['responseCode'] == 'APPROVED') {
    

$domain = $_SERVER['HTTP_HOST'];
$uri = parse_url($_SERVER['HTTP_REFERER']);

//$r_domain = substr($uri['host'], strpos($uri['host'],"."),strlen($uri['host']))	;

//if ( $domain == $r_domain ) {

	/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);
	
	/*This cleans our &_POST array to prevent against SQL injection attacks.*/
	$_POST = f_clean($_POST);

	/*These are the main variables we'll use to process the form.*/
	$table = $_POST['formID'];
	$_POST['Password']=base64_encode($_POST['Password']);
	//Teste
	$db=new databaseConnection();
	$query = "SELECT * FROM cursuri WHERE ID = ".$_POST['Perioada'];
	$result=$db->query($query);
	print_r($result);

	if($result['Inscrisi']>=$result['Locuri'])
	{
		echo "perioada plina";
	}
	//Teste
	else{
	//Increments places in cursuri table
	$query = ("UPDATE cursuri SET Inscrisi = Inscrisi+1 WHERE ID = ".$_POST['Perioada']);
	$db->query($query);

	$keys = implode(", ", (array_keys($_POST))); 
	$values = implode("', '", (array_values($_POST)));
	
	/*These are variables for our redirect.*/
	$redirect = $_POST['redirect_to'];
	$referred = $_SERVER['HTTP_REFERER'];
	$query = parse_url($referred, PHP_URL_QUERY);
	$referred = str_replace(array('?', $query), '', $referred);

	/*These are the extra data fields we'll collect on form submission.*/
	$x_fields = 'timestamp, ip';
	$x_values = time() . "', '" . 0;

	/*Check to see if the table exists and if it doesn't create it.*/
	if ( !f_tableExists($table, DB_NAME) ) {
		$sql = "CREATE TABLE $table (
			ID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(ID),
			timestamp int NOT NULL,
			ip int NOT NULL
		)";
		
		$result = mysql_query($sql);
		
		if (!$result) {	
			die('Invalid query: ' . mysql_error());
		}
		
	} 

	/*Check to see if the fields specified in the form exist and if they don't, create them.*/
	foreach ($_POST as $key => $value) {
		$column = mysql_real_escape_string($key);
		$alter = f_fieldExists($table, $column, $column_attr = "VARCHAR( 255 ) NULL" );
		
		if (!$alter) {
			echo 'Unable to add column: ' . $column ."<br>";
		}
	}

	/*Insert out values into the database.*/
	$sql="INSERT INTO $table ($keys, $x_fields) VALUES ('$values', '$x_values')";

	if (!mysql_query($sql)) {
		die('Error: ' . mysql_error());
	}
        
	/*Close our database connection.*/
	mysql_close();
        
        mail($_POST['Email'], "Testing", $message, $headers);
        }        
	/*Redirect the user after a successful form submission*/
	if ( !empty ( $redirect ) ) {
		header("Location: $redirect?msg=1");
	} else {
		header("Location: ../../index.php");
	}
    }
        
        }catch (Twocheckout_Error $e) {
    echo $e->getMessage();
    
}
//} else {
	//die('You are not allowed to submit data to this form');
//}
}
?>