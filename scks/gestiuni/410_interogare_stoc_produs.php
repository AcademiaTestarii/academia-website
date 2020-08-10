<?php

require_once '../credentials.php';
// Interogare stoc

echo 'Interogare stoc: ';
$data = array(
    'cif'           => $companyVatCode,
    'date'          => date('Y-m-d'),
    'warehouseName' => '',
    'productName'   => 'Paine',
    'productCode'   => '',
);
try {
    $list = $sbcClient->productsStock($data);
	print_r($list);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
echo '<br>';