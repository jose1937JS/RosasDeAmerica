<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ReportesController extends Controller
{
    public function compra()
    {
    	$name = 'pepito';

  		$pdf = PDF::loadView('pdf.compra', ['name' => $name]);
		return $pdf->download('reporte-compra.pdf');
    }
}