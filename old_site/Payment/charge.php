<?php
require_once("../2Checkout/lib/Twocheckout.php");
$token=$_POST['token'];
Twocheckout::privateKey('6240B70D-43FE-49F7-8E46-6CC71C9D608F');
Twocheckout::sellerId('901346277');
Twocheckout::sandbox(true);  #Uncomment to use Sandbox

try {
    $charge = Twocheckout_Charge::auth(array(
        "merchantOrderId" => "123",
        "token" => $token,
        "currency" => 'RON',
        "total" => '20.00',
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
        echo "Thanks for your Order!";
    }
} catch (Twocheckout_Error $e) {
    $e->getMessage();
    
}


?>