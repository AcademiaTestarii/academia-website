<?php

require_once '../credentials.php';
// Interogare serii documente

echo 'Interogare serii documente (toate): ';
try {
    $output = $sbcClient->getDocumentSeries($companyVatCode);
    $series = $output['list'];
	print_r($series);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
echo '<br>';
echo 'Interogare serii documente (facturi): ';
try {
    $output = $sbcClient->getDocumentSeries($companyVatCode, SmartBillCloudRestClient::DocumentType_Factura);
    $series = $output['list'];
	print_r($series);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
echo '<br>';
echo 'Interogare serii documente (proforme): ';
try {
    $output = $sbcClient->getDocumentSeries($companyVatCode, SmartBillCloudRestClient::DocumentType_Proforma);
    $series = $output['list'];
	print_r($series);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
echo '<br>';
echo 'Interogare serii documente (chitante): ';
try {
    $output = $sbcClient->getDocumentSeries($companyVatCode, SmartBillCloudRestClient::DocumentType_Chitanta);
    $series = $output['list'];
	print_r($series);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
echo '<br>';