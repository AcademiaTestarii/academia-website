<?php
require_once 'database.php';

$db=new databaseConnection();

if(isset($_GET['Mail'])||($_GET['Mail']!=""))
{
    $query = "SELECT * FROM form2 WHERE Email = '".$_GET['Mail']. "'";

    try {
    $result= $db->query($query);

    if(count($result)>2){
        print_r("Exista");
        return "Exista";
    }
    } catch (Exception $ex) {
        print_r ($ex);
    }
}else{
    print_r('Give a mail');
    $resp="invalid";
}

?>