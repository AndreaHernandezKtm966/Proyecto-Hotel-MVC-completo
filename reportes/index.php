<?php
require_once __DIR__ . '/../libraries/fpdf/fpdf.php';
require_once __DIR__ . '/../models/Reserva.php';

class ReportePDF extends FPDF {
    function Header() {
        // Logo
        if (file_exists(__DIR__ . '/../Imagenes/logo Hotel.png')) {
            $this->Image(__DIR__ . '/../Imagenes/logo Hotel.png', 10, 8, 33);
        }

        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(127, 74, 138); 
        $this->Cell(0, 12, 'SENA RESORT HOTEL', 0, 1, 'C');

        
        $this->SetDrawColor(166, 120, 180); 
        $this->SetLineWidth(0.8);
        $this->Line(10, 22, 200, 22);

        
        $this->SetFont('Arial', 'B', 11);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 8, 'COMPROBANTE DE RESERVA OFICIAL', 0, 1, 'C');

       
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(100, 100, 100);
        $this->Cell(0, 5, utf8_decode('Ibagué, Tolima - Colombia'), 0, 1, 'C');

       
        $this->SetDrawColor(200, 162, 200); 
        $this->SetLineWidth(0.4);
        $this->Line(10, 42, 200, 42);

        $this->Ln(8);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(166, 120, 180);
        $this->Cell(0, 10, utf8_decode('SENA RESORT HOTEL  |  Comprobante válido  |  Página ').$this->PageNo().'/{nb}', 0, 0, 'C');
    }
}

function seccionTitulo($pdf, $texto) {
    $pdf->SetFillColor(243, 233, 247);      
    $pdf->SetTextColor(127, 74, 138);        
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(0, 9, utf8_decode('  ' . $texto), 0, 1, 'L', true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Ln(2);
}

function escribirFila($pdf, $label, $valor) {
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetTextColor(127, 74, 138);     
    $pdf->Cell(50, 8, $label, 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(0, 8, $valor, 0, 1);
}

$id_reserva = $_GET['id'] ?? null;
if (!$id_reserva) die("ID no proporcionado.");

$modelo  = new Reserva();
$reserva = $modelo->getReservaPorId($id_reserva);
if (!$reserva) die("Reserva no encontrada.");

$pdf = new ReportePDF();
$pdf->AliasNbPages();
$pdf->AddPage();

seccionTitulo($pdf, 'REFERENCIA DE RESERVA');
escribirFila($pdf, 'N° de Reserva:', '#' . $reserva['id']);
$pdf->Ln(4);

seccionTitulo($pdf, 'INFORMACIÓN DEL CLIENTE');
escribirFila($pdf, 'Nombre Completo:', utf8_decode($reserva['cliente_nombre']));
escribirFila($pdf, 'Correo Electrónico:', utf8_decode($reserva['email']));
$pdf->Ln(4);


seccionTitulo($pdf, utf8_decode('DETALLES DE LA ESTADIA'));
$habitacionInfo = 'Hab. #' . $reserva['num_habitacion'] . ' (' . $reserva['tipo_habitacion'] . ')';
escribirFila($pdf, utf8_decode('Habitación:'),   utf8_decode($habitacionInfo));
escribirFila($pdf, 'Fecha de Entrada:', $reserva['fecha_inicio']);
escribirFila($pdf, 'Fecha de Salida:',  $reserva['fecha_final']);
$pdf->Ln(4);


$pdf->SetDrawColor(200, 162, 200);  
$pdf->SetLineWidth(0.5);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 13);
$pdf->SetTextColor(127, 74, 138);   
$pdf->Cell(50, 10, 'TOTAL PAGADO:', 0);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(127, 74, 138);
$pdf->Cell(0, 10, '$ ' . number_format($reserva['precio'], 0, ',', '.'), 0, 1);

$pdf->Ln(3);
$pdf->SetDrawColor(166, 120, 180);   
$pdf->SetLineWidth(0.8);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

$pdf->Output('I', 'Reserva_' . $id_reserva . '.pdf');