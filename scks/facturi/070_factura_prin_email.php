<?php

require_once '../credentials.php';

// Emitere factura simpla
$invoice = array(
    'companyVatCode'=> $companyVatCode,
    'client' 		=> array(
        'name' 			=> "Intelligent IT",
        'vatCode' 		=> "RO12345678",
        'regCom' 		=> "",
        'address' 		=> "str. Sperantei, nr. 5",
        'isTaxPayer' 	=> false,
        'city' 			=> "Sibiu",
        'country' 		=> "Romania",
        'email' 		=> "office@intelligent.ro",
    ),
    'issueDate' 	=> date('Y-m-d'),
    'seriesName' 	=> $companyInvoiceSeries,
    'isDraft' 		=> false,
    'dueDate' 		=> date('Y-m-d', time() + 14*3600),
    'mentions' 		=> "",
    'observations' 	=> "",
    'deliveryDate' 	=> date('Y-m-d', time() + 1*3600),
    'products' 		=> array(
        array(
            'name' 				=> "Produs 1",
            'code' 				=> "ccd1",
            'isDiscount' 		=> false,
            'measuringUnitName' => "buc",
            'currency' 			=> "RON",
            'quantity' 			=> 2,
            'price' 			=> 10,
            'isTaxIncluded' 	=> true,
            'taxName' 			=> "Redusa",
            'taxPercentage' 	=> 9,
            'isService' 		=> false,
        ),
    ),
);
echo 'Emitere factura simpla: ';
try {
   $output = $sbcClient->createInvoice($invoice); //see docs for response
   $invoiceNumber = $output['number'];
   $invoiceSeries = $output['series'];
   echo $invoiceSeries . "  " . $invoiceNumber . " ";
} catch (Exception $ex) {
   echo $ex->getMessage();
}

// Trimitere documente prin e-mail
$email = array(
    'companyVatCode'=> $companyVatCode,
    'to'            => "office@intelligent.ro",
    'bodyText'      => "Mail message",
    'subject'       => "Subject",
    'seriesName'    => $companyInvoiceSeries,
    'number'        => $invoiceNumber,
    'type'          => SmartBillCloudRestClient::DocumentType_Factura,
);
echo 'Trimitere documente prin e-mail: ';
try {
   $output = $sbcClient->sendDocument($email);
   echo $message = $output['status']['message'];
} catch (Exception $ex) {
    echo $ex->getMessage();
}