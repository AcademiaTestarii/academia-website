<?php

require_once '../credentials.php';

// Emitere bon fiscal

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
    'value'			=> 234,
    'type'          => SmartBillCloudRestClient::PaymentType_BonFiscal,
    'returnFiscalPrinterText' => true,
    'observation' 	=> "obs",
    'useStock' 		=> false,
    'products'              => array(
        array(
            'name'                      => "Mapa A4",
            'code'                      => "ccd1",
            'isDiscount'                => false,
            'measuringUnitName'         => "buc",
            'currency'                  => "RON",
            'quantity'                  => 2,
            'price'                     => 40,
            'isTaxIncluded'             => true,
            'taxName'                   => "Noua",
            'taxPercentage'             => 19,
            'saveToDb'                  => false,
            'isService'                 => false,
        ),
		array(
            'name'                      => "Discount procentual 10%",
            'isDiscount'                => true,
            'numberOfItems'             => 1,
            'measuringUnitName'         => "buc",
            'currency'                  => "RON",
            'isTaxIncluded'             => true,
            'taxName'                   => "Noua",
            'taxPercentage'             => 19,
            'discountType'              => SmartBillCloudRestClient::DiscountType_Procentual,
            'discountPercentage'        => 10,
        ),
        array(
            'name'                      => "Biblioraft Plastifiat",
            'code'                      => "ccd2",
            'isDiscount'                => false,
            'measuringUnitName'         => "buc",
            'currency'                  => "RON",
            'quantity'                  => 3,
            'price'                     => 60,
            'isTaxIncluded'             => true,
            'taxName'                   => "Noua",
            'taxPercentage'             => 19,
            'saveToDb'                  => false,
            'isService'                 => false,
        ),
        array(
            'name'                      => "Discount procentual 10%",
            'isDiscount'                => true,
            'numberOfItems'             => 1,
            'measuringUnitName'         => "buc",
            'currency'                  => "RON",
            'isTaxIncluded'             => true,
            'taxName'                   => "Noua",
            'taxPercentage'             => 19,
            'discountType'              => SmartBillCloudRestClient::DiscountType_Procentual,
            'discountPercentage'        => 10,
        ),
    ),
	'receivedCash'			=> 200,
    'receivedCard'			=> 34,
    'receivedTicheteMasa'	=> 0,
    'receivedTicheteCadou'	=> 0,
    'receivedOrdinDePlata'	=> 0,
    'receivedCec'			=> 0,
    'receivedCredit'		=> 0,
    'receivedCupon'			=> 0,
    'receivedPuncteDeFidelitate'	=> 0,
    'receivedBonuriValoareFixa'		=> 0,
    'receivedMonedaAlternativa'		=> 0,
);
    
echo 'Emitere incasare: ';
try {
   $output = $sbcClient->createPayment($payment); //see docs for response
   $docId = $output['id'];
   $docNumber = $output['number'];
   $docContent = $output['message'];
   echo "Number: " . $docNumber . " Id: " . $docId;
} catch (Exception $ex) {
   echo $ex->getMessage();
}
echo '<br>';
// Emitere incasare: Discountul nu poate fi de tip valoric!
// Emitere incasare: Cota TVA Normala (19.00%) nu a fost configurata pentru casa de marcat selectata