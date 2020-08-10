<?php
/**
 * Template Name: Generate Feedback
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
		
	function Header()
	{
		$headerColor = array( 255, 255, 255 );
	    $headerBg = array( 0, 112, 192 );
	    // Logo
	    $this->Image('http://academiatestarii.ro/wp/wp-content/uploads/2017/11/Logo-color-RGB.png',25,6,18);
	    // Arial bold 15
	    $this->SetTextColor( $headerColor[0], $headerColor[1], $headerColor[2] );
	    $this->SetFont('Arial','B',10);
	    // Move to the right
	    $this->Cell(40);
		
	    $title = iconv('utf-8', 'iso-8859-2',get_the_title($_GET['modul']));
	    $this->SetFillColor( $headerBg[0], $headerBg[1], $headerBg[2] );
	    $this->Cell(150,10, str_replace('&#038;', '&', $title), 0, 0,'C', true);
	    // Line break
	    $this->Ln(20);
	}
	function BasicTable($header, $data)
	{
	// Header
		$this->Ln();
		foreach($header as $col)
			$this->Cell(95,7,$col,1);
		$this->Ln();
	// Data
		foreach($data as $row)
		{
			$line_height = 7;
			$this->SetFont('Courier','',10);
			foreach($row as $col) {
				$current_y = $this->GetY();
				$current_x = $this->GetX();
				$this->MultiCell(95, $line_height, $col, 1);
				$line_height = $this->GetY() - $current_y;
				$this->SetXY($current_x + 95, $current_y);
				
			}
			$this->Ln();
		}
	}
}

if(isset($_GET['modul']) && isset($_GET['email'])){
	$modul = $_GET['modul'];
	$email = $_GET['email'];
	$type = $_GET['type'];
	$headerColor = array( 255, 255, 255 );
    $headerBg = array( 0, 112, 192 );
	$feedback =  $wpdb->get_row("SELECT * from feedback_table WHERE modul = $modul AND type = '$type' AND email = '$email'"); 
	$user =  $wpdb->get_row("SELECT * from db_module WHERE modul = $modul AND email = '$email'");
	$name = ucfirst($user->nume).' '.ucfirst($user->prenume);
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Courier','',22);
	$pdf->Cell(0, 60, 'Feedback '.$name,0,1, 'C');
	$pdf->SetDrawColor(91,155,213);
	$pdf->Line(30, 66, 180, 66);
	$pdf->SetFont('Arial','B',10);

	$pdf->SetTextColor( $headerColor[0], $headerColor[1], $headerColor[2] );
	$pdf->SetFillColor( $headerBg[0], $headerBg[1], $headerBg[2] );
	$pdf->Cell(190,8, 'Organizare JIRA & Zephyr', 0, 0,'L', true);
	$pdf->Ln();
	$tableHeader = ['Good points', 'To improve'];
	$firstData = [$feedback->organizare_good, $feedback->organizare_improve];
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);
	$pdf->BasicTable($tableHeader,[$firstData]);
	
	$pdf->Ln(10);

	$pdf->SetTextColor( $headerColor[0], $headerColor[1], $headerColor[2] );
	$pdf->SetFillColor( $headerBg[0], $headerBg[1], $headerBg[2] );
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,8, 'Test cases', 0, 0,'L', true);
	$pdf->Ln();
	$tableHeader = ['Good points', 'To improve'];
	$firstData = [$feedback->test_cases_good, $feedback->test_cases_improve];
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);
	$pdf->BasicTable($tableHeader,[$firstData]);

	$pdf->Ln(10);

	$pdf->SetTextColor( $headerColor[0], $headerColor[1], $headerColor[2] );
	$pdf->SetFillColor( $headerBg[0], $headerBg[1], $headerBg[2] );
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,8, 'Defects', 0, 0,'L', true);
	$pdf->Ln();
	$tableHeader = ['Good points', 'To improve'];
	$firstData = [$feedback->defects_good, $feedback->defects_improve];
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);
	$pdf->BasicTable($tableHeader,[$firstData]);

	$pdf->Ln(10);

	$pdf->SetTextColor( $headerColor[0], $headerColor[1], $headerColor[2] );
	$pdf->SetFillColor( $headerBg[0], $headerBg[1], $headerBg[2] );
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,8, 'Traceability', 0, 0,'L', true);
	$pdf->Ln();
	$tableHeader = ['Good points', 'To improve'];
	$firstData = [$feedback->traceability_good, $feedback->traceability_improve];
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);
	$pdf->BasicTable($tableHeader,[$firstData]);


	$pdf->Output();
} else {
	echo "No params";
}
?>
