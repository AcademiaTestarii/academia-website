<?php
require_once 'database.php';
$db = new databaseConnection();
if(isset($_GET['Perioada'])){
$query = "SELECT dataCurs FROM cursuri WHERE ID = ".$_GET['Perioada'];

try {
$result = $db->query($query);   
print_r(json_encode($result));
return(json_encode($result));
} catch (Exception $ex) {
return ($ex);
   // die($ex);  
}
}else
{
    print_r("You have to give us the period");
    $resp = "invalid";
}
?>