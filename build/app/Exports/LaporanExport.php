<?php
namespace App\Exports;

use App\DetailLaporan;
use App\Laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    public function view(): View
    {
        return view('excel', [

            'data' => Laporan::all()

        ]);
    }
}
