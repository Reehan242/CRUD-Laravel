<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pegawai;

class PdfController extends Controller
{
    public function cetakPDF()
    {
        $pdf = PDF::loadView('pdf_view', compact('data'));
        return $pdf->download('slip-gaji.pdf');
    }
}
