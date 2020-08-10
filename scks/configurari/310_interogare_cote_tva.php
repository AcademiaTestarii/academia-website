<?php

require_once '../credentials.php';
// Interogare cote TVA

echo 'Interogare cote TVA: ';
try {
    $output = $sbcClient->getTaxes($companyVatCode);
    $taxes = $output['taxes'];
	print_r($taxes);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
echo '<br>';