<?php

require_once 'SmartBillCloudRestClient.php';

// Credentiale cont
$username = 'office@academiatestarii.ro';
$token    = '001|4a2af243166e5a7f81ff07a46cf4b391';
$companyVatCode = "42075475";

$sbcClient = new SmartBillCloudRestClient($username, $token);

// Serii documente
$companyInvoiceSeries = "AAA";
$companyProformaSeries = "";
$companyReceiptSeries = "";

// Gestiune 
$warehouse = "";