<?php
/**
 * Template Name: Generate PDF
 * Description: First page of the site
 *
 * @package WordPress
 * @subpackage Winmarkt
 */
global $wpdb;

require('fpdf.php');

class PDF extends FPDF
{
// Simple table
	function BasicTable($header, $data)
	{
	// Header
		foreach($header as $col)
			$this->Cell(40,7,$col,1);
		$this->Ln();
	// Data
		foreach($data as $row)
		{
			foreach($row as $col)
				$this->Cell(40,6,$col,1);
			$this->Ln();
		}
	}
}

if(isset($_GET['modul']) && isset($_GET['perioada'])){
	$modul = $_GET['modul'];
	$perioada = $_GET['perioada'];

	$query = "SELECT * from db_module WHERE modul = $modul AND perioada = '$perioada'";
	$records = $wpdb->get_results($query);
	//print_r($records);
	$pdf = new PDF();
// Column headings
	$header = array('Nume', 'Prenume', 'Email', 'Telefon', 'Mod Plata');
// Data loading
	$data = [];
	foreach ($records as $rec) {
		$array = [];
		array_push($array, $rec->nume, $rec->prenume, $rec->email, $rec->telefon, 'Transfer Bancar');
		array_push($data, $array);
	}
	$pdf->SetFont('Arial','',7);
	$pdf->AddPage();
	$text = 'Perioada: '. $perioada;
	$pdf->Cell(40,10, $text);
	$pdf->Ln();
	$pdf->BasicTable($header, $data);
	$pdf->Output();
} else {
	echo "No params";
}
?>
