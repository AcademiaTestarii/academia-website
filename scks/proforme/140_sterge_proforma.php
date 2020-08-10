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

//Stergere proforma
echo 'Stergere proforma: ';
try {
    $output = $sbcClient->deleteProforma($companyVatCode, $companyProformaSeries, $estimateNumber);
    echo $message = $output['message'];
} catch (Exception $ex) {
    echo $ex->getMessage();
}

// Stergere proforma: Proforma cu seria si numarul P0011 a fost stearsa cu succes. -> cu mesaj de succes
// Stergere proforma: Nu poti sterge documentul cu seria si numarul P0074, deoarece nu este ultimul din serie! -> cu mesaj de eroare