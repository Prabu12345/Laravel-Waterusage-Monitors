<?php

namespace App\Http\Controllers\WaterUsage;

use App\Http\Controllers\Controller;
use App\Models\WaterUsage;
use Barryvdh\DomPDF\Facade\Pdf;

class UsageExportPDF extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function generatePDF($id)
    {
        // Query disederhanakan, tidak perlu with('user')
        $billings = WaterUsage::all();

        $pdf = Pdf::loadView('data.pdf', ['billings' => $billings]);

        return $pdf->stream('laporan-tagihan.pdf');
    }
}
