<?php

namespace App\Controllers;

use App\Models\TenderModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    private $TenderModel;
    public function __construct()
    {
        $this->TenderModel = new TenderModel();
    }
    public function generateModalPdf($id_tiket)
    {
        $data = [
            'tiket' => $this->TenderModel->get_id_tiket($id_tiket),
        ];

        $filename = date('y-m-d-H-i-s') . '-tiket-' . $id_tiket . '-report';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pdf_modal_view', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
    }
}
