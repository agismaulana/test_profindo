<?php

namespace App\Http\Controllers;

use App\Models\TransaksiObatKeluar;
use App\Models\Obat;
use App\Models\Apoteker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiObatKeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TransaksiObatKeluar::all();
        return view('transaksiObatKeluar.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apoteker = Apoteker::all();
        $obat = Obat::all();
        return view('transaksiObatKeluar.create')->with(['apoteker' => $apoteker, 'obat' => $obat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'kodeObat' => 'required',
            'jumlahJual' => 'required',
            'kodeApoteker' => 'required',
            'stokObat' => 'required',
        ]); 

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transaksi = TransaksiObatKeluar::all();

        if(count($transaksi) >= 10) {
            $count = '0'.count($transaksi) + 1;
        } else if(count($transaksi) >= 100) {
            $count = count($transaksi) + 1;
        } else {
            $count = '00'.count($transaksi) + 1;
        }

        $data = [
            'idTransaksi' => 'TRK'.$count,
            'kodeObat' => $request->kodeObat,
            'jumlahJual' => $request->jumlahJual,
            'kodeApoteker' => $request->kodeApoteker,
            'tanggalBeli' => date('Y-m-d'),
        ];

        if($request->jumlahJual > 0) {
            $create = TransaksiObatKeluar::create($data);
            Obat::where('kodeObat', $request->kodeObat)->update(['sisaObat' => $request->stokObat]);
        }

        if($create) {
            return redirect()->route('transaksi.index')->with(['success' => 'Transaksi Berhasil Dibuat!!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaksiObatKeluar  $transaksiObatKeluar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiObatKeluar  $transaksiObatKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apoteker = Apoteker::all();
        $obat = Obat::all();
        $transaksi = TransaksiObatKeluar::with(['apoteker', 'obat'])->where('idTransaksi', $id)->first();
        return view('transaksiObatKeluar.edit')->with(['apoteker' => $apoteker, 'obat' => $obat, 'data' => $transaksi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransaksiObatKeluar  $transaksiObatKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kodeObat' => 'required',
            'jumlahJual' => 'required',
            'kodeApoteker' => 'required',
            'stokObat' => 'required',
        ]); 

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'kodeObat' => $request->kodeObat,
            'jumlahJual' => $request->jumlahJual,
            'kodeApoteker' => $request->kodeApoteker,
            'tanggalBeli' => date('Y-m-d'),
        ];

        if($request->jumlahJual > 0) {
            $update = TransaksiObatKeluar::where('idTransaksi', $id)->update($data);
            Obat::where('kodeObat', $request->kodeObat)->update(['sisaObat' => $request->stokObat]);
            
            if($update) {
                return redirect()->route('transaksi.index')->with(['success' => 'Transaksi Berhasil Diubah!!!']);
            }
        } else {
            return redirect()->back()->with(['failed' => 'Jumlah Jual tidak boleh 0']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiObatKeluar  $transaksiObatKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TransaksiObatKeluar::where('idTransaksi', $id)->delete();
        return redirect()->route('transaksi.index')->with(['success' => 'Transaksi Berhasil Dihapus!!!']);
    }

    public function getStok($kode) {
        $stok = Obat::where('kodeObat', $kode)->select('sisaObat')->first();
        return response()->json(['stok' => $stok]);
    }
}
