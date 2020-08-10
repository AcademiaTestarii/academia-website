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

// Anulare factura
echo 'Anulare factura: ';
try {
    $output = $sbcClient->cancelInvoice($companyVatCode, $companyInvoiceSeries, $invoiceNumber);
    echo $message = $output['message'];
} catch (Exception $ex) {
    echo $ex->getMessage();
}

//Anulare factura: Factura cu seria si numarul F3456 nu a fost gasita! -> cu mesaj de eroare
//Anulare factura: Factura cu seria si numarul F0193 a fost anulata cu succes. -> cu mesaj de succes
