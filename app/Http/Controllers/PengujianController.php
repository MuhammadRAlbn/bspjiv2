<?php

namespace App\Http\Controllers;

use App\Models\Alur;
use App\Models\Komoditi;
use App\Models\Laboratorium;
use App\Models\Sertifikasi;

class PengujianController extends Controller
{
    public function index()
    {
        // Data untuk tab yang tidak membutuhkan interaksi Livewire
        $sertifikasi = Sertifikasi::active()->first();
        $alur = Alur::active()->first();
        $laboratorium = Laboratorium::active()->get();
        $komoditi = Komoditi::active()->get();

        return view('layanan.pengujian', compact(
            'sertifikasi',
            'alur',
            'laboratorium',
            'komoditi'
        ));
    }
}