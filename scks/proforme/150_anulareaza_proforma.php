<?php

require_once '../credentials.php';

// Emitere proforma simpla
$estimate = array(
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
    'seriesName' 	=> $companyProformaSeries,
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
echo 'Emitere proforma simpla: ';
try {
   $output = $sbcClient->createProforma($estimate); //see docs for response
   $estimateNumber = $output['number'];
   $estimateSeries = $output['series'];
   echo $estimateSeries . $estimateNumber . " ";
} catch (Exception $ex) {
   echo $ex->getMessage();
}

// Anulare proforma
echo 'Anulare proforma: ';
try {
    $output = $sbcClient->cancelProforma($companyVatCode, $companyProformaSeries, $estimateNumber);
    echo $message = $output['message'];
} catch (Exception $ex) {
    echo $ex->getMessage();
}

//Anulare proforma: Proforma cu seria si numarul PFF3456 nu a fost gasita! -> cu mesaj de eroare
//Anulare proforma: Proforma cu seria si numarul PFF0193 a fost anulata cu succes. -> cu mesaj de succes
