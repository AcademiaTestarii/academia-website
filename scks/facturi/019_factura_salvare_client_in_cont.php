<?php

require_once '../credentials.php';

// Salvarea unui client in baza de date Cloud
$invoice = array(
    'companyVatCode'=> $companyVatCode,
    'client'        => array(
        'name'          => "Intelligent IT",
        'vatCode'       => "RO12345678",
        'regCom'        => "",
        'address'       => "str. Sperantei, nr. 5",
        'isTaxPayer'    => false,
        'city'          => "Sibiu",
        'country'       => "Romania",
        'email'         => "office@intelligent.ro",
        'saveToDb'      => true,
    ),
    'issueDate'     => date('Y-m-d'),
    'seriesName'    => $companyInvoiceSeries,
    'dueDate'       => date('Y-m-d', time() + 14*3600),
    'deliveryDate'  => date('Y-m-d', time() + 1*3600),
    'products'      => array(
        array(
            'name'              => "Produs 1",
            'code'              => "ccd1",
            'isDiscount'        => false,
            'measuringUnitName' => "buc",
            'currency'          => "RON",
            'quantity'          => 2,
            'price'             => 10,
            'isTaxIncluded'     => true,
            'taxName'           => "Redusa",
            'taxPercentage'     => 9,
            'isService'         => false,
        ),
    ),
);
echo 'Salvarea unui client in baza de date Cloud: ';
try {
    $output = $sbcClient->createInvoice($invoice); //invoice.Number will be  generated by the server
    $invoiceNumber = $output['number'];
    $invoiceSeries = $output['series'];
    echo $invoiceSeries . $invoiceNumber;
} catch (Exception $ex) {
    echo $ex->getMessage();
}