<?php
require_once 'lib/fpdf.php';
require_once 'db.php';

class PDF extends FPDF {
    function Header() {
        // Logos
        $this->Image('public/naijareadfest-logo.png', 12, 10, 28);
        $this->Image('public/partners/nigeria-reads.png', 45, 10, 28);
        $this->Image('public/gwr.png', 80, 10, 28);
        // Title
        $this->SetFont('Arial', 'B', 22);
        $this->Cell(0, 22, 'Naija ReadFest Exhibitor Applications', 0, 1, 'C');
        $this->SetFont('Arial', 'I', 13);
        $this->Cell(0, 10, 'Guinness World Record – Official Attempt', 0, 1, 'C');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 8, 'Exported: ' . date('F j, Y, g:i a'), 0, 1, 'C');
        $this->Ln(6);
        // Table header
        $this->SetFillColor(0,128,0);
        $this->SetTextColor(255);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(10, 11, '#', 1, 0, 'C', true);
        $this->Cell(40, 11, 'Organization', 1, 0, 'C', true);
        $this->Cell(32, 11, 'Contact', 1, 0, 'C', true);
        $this->Cell(28, 11, 'Phone', 1, 0, 'C', true);
        $this->Cell(44, 11, 'Email', 1, 0, 'C', true);
        $this->Cell(16, 11, 'Titles', 1, 0, 'C', true);
        $this->Cell(38, 11, 'Submitted', 1, 1, 'C', true);
        $this->SetTextColor(0);
    }
    function Footer() {
        $this->SetY(-18);
        $this->SetFont('Arial', 'I', 9);
        $this->SetTextColor(100);
        $this->Cell(0, 8, 'Naija ReadFest | Nigeria Reads | GWR Official Attempt', 0, 1, 'C');
        $this->SetTextColor(0);
        $this->Cell(0, 8, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF('L', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

$where = '';
if (!empty($_GET['search'])) {
    $search = $mysqli->real_escape_string($_GET['search']);
    $where = "WHERE org_name LIKE '%$search%' OR contact_name LIKE '%$search%' OR contact_email LIKE '%$search%' OR org_profile LIKE '%$search%' OR booth_requirements LIKE '%$search%' OR special_requests LIKE '%$search%'";
}
$result = $mysqli->query("SELECT * FROM exhibitors $where ORDER BY submitted_at ASC");
$i = 1;
$rowCount = 0;
while ($row = $result->fetch_assoc()) {
    $fill = $i % 2 == 0 ? [245,255,245] : [255,255,255];
    $pdf->SetFillColor($fill[0],$fill[1],$fill[2]);
    $pdf->Cell(10, 10, $i, 1, 0, 'C', true);
    $pdf->Cell(40, 10, mb_strimwidth($row['org_name'],0,36,'...'), 1, 0, 'L', true);
    $pdf->Cell(32, 10, mb_strimwidth($row['contact_name'],0,28,'...'), 1, 0, 'L', true);
    $pdf->Cell(28, 10, $row['contact_phone'], 1, 0, 'L', true);
    $pdf->Cell(44, 10, mb_strimwidth($row['contact_email'],0,40,'...'), 1, 0, 'L', true);
    $pdf->Cell(16, 10, $row['num_titles'], 1, 0, 'C', true);
    $pdf->Cell(38, 10, $row['submitted_at'], 1, 1, 'L', true);
    $i++;
    $rowCount++;
}
$pdf->Ln(6);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(0,128,0);
$pdf->Cell(0, 10, "Total Applications: $rowCount", 0, 1, 'R');
$pdf->Output('D', 'naijareadfest_exhibitors.pdf');
?> 