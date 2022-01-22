<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiObatKeluar;
use App\Models\Obat;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataObat = Obat::orderBy('updated_at', 'DESC')->get();
        $chartObat = [];
        foreach($dataObat as $obat) {
            $chartObat[] = array($obat['namaObat'], $obat['sisaObat']); 
        }

        $transaksi = TransaksiObatKeluar::with(['obat'])->orderBy('tanggalBeli', 'DESC')->get();
        $transaksiKeluar = [];
        foreach($transaksi as $keluar) {
            $strToTime = strtotime($keluar['tanggalBeli']." 00:00:00")*1000;
            $transaksiKeluar[] = array($strToTime, $keluar['jumlahJual']);
        }

        return view('home')->with(['dataTransaksi' => $transaksi, 'chartKeluar' => json_encode($transaksiKeluar), 'dataObat' => $dataObat, 'chartObat' => json_encode($chartObat)]);
    }
}
