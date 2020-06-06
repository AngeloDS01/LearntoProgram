<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
$pdf = new Dompdf();


ob_start();
?>
<h1> Contenuto</h1>
Volevo essere un padre GOLIARDICO, Che non ha mai capito un cazzo della vita.

<?php
$html=ob_get_clean();
$pdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$pdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$pdf->render();

// Output the generated PDF to Browser
$pdf->stream('result.pdf', Array('Attachment'=>0));
?>
