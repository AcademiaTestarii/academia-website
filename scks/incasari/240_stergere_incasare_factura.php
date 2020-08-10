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
            'quantity' 			=> 5,
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
   echo $invoiceSeries . $invoiceNumber . " ";
} catch (Exception $ex) {
   echo $ex->getMessage();
}
echo '<br>';

// Emitere incasare
$payment = array(
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
    'currency' 		=> "RON",
    'language'		=> "RO",
    'exchangeRate'	=> 1,
    'precision'		=> 2,
    'value'			=> 20,
    'type'          => SmartBillCloudRestClient::PaymentType_Card,
    'isCash'		=> true,
    'useInvoiceDetails' => false,
    'invoicesList'  => array(
      array(
        'seriesName' => $invoiceSeries,
        'number' 	 => $invoiceNumber,
      ),
    ),
);
    
echo 'Emitere incasare cu card: ';
try {
   $output = $sbcClient->createPayment($payment); //see docs for response
   $docNumber = $output['number'];
   $docSeries = $output['series'];
   echo "done" . $docNumber . $docSeries . " ";
} catch (Exception $ex) {
   echo $ex->getMessage();
}
echo '<br>';

// Stergere incasare (dupa serie document)
$paymentDel = array(
    'companyVatCode'=> $companyVatCode,
    'paymentType'   => SmartBillCloudRestClient::PaymentType_Card,
    'invoiceSeries' => $invoiceSeries,
    'invoiceNumber' => $invoiceNumber,
);

echo 'Stergere incasare cu datele din factura: ';
try {
    $output = $sbcClient->deletePayment($paymentDel);
    $message = $output['message'];
	echo $message;
} catch (Exception $ex) {
    echo $ex->getMessage();
}
echo '<br>';

// Tipul incasarii (paymentType) poate fi 'Card', 'CEC', 'Bilet ordin', 'Ordin plata', 'Mandat postal', 'Alta incasare'. -> la apel cu tip  incasare = chitanta
