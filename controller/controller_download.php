<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, 'Laporan', 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);

// Connect to database and get data
include "connection.php";

// Query untuk mengambil total order dari tabel order_items
$query = "SELECT COUNT(*) as total_orders FROM order_items";
$result = $koneksi->query($query);
$row = $result->fetch_assoc();

// Menampilkan total order
$pdf->Cell(0, 10, 'Total Order: ' . $row['total_orders'], 0, 1);

// Query untuk mengambil total income dari tabel order_items
$query = "SELECT SUM(amount) as total_income FROM order_items";
$result = $koneksi->query($query);
$row = $result->fetch_assoc();

// Menampilkan total income
$pdf->Cell(0, 10, 'Total Income: Rp' . $row['total_income'], 0, 1);

$pdf->Output();
