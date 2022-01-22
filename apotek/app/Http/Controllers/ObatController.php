<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Obat::all();
        return view('obat.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.create');
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
            'namaObat' => 'required',
            'hargaObat' => 'required|numeric',
            'sisaObat' => 'required|numeric',
            'tanggalKadaluarsa' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $obat = Obat::all();

        if(count($obat) >= 10) {
            $count = '0'.count($obat) + 1;
        } else if(count($obat) >= 100) {
            $count = count($obat) + 1;
        } else {
            $count = '00'.count($obat) + 1;
        }

        $data = [
            'kodeObat' => 'CM'.$count,
            'namaObat' => $request->namaObat,
            'hargaObat' => $request->hargaObat,
            'sisaObat' => $request->sisaObat,
            'tanggalKadaluarsa' => $request->tanggalKadaluarsa,
        ];

        $create = Obat::create($data);
        if($create) {
            return redirect()->route('obat.index')->with(['success' => 'Obat Berhasil Ditambahkan!!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show($kode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit($kode)
    {
        $data = Obat::where('kodeObat', $kode)->first();
        return view('obat.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode)
    {
        $validator = Validator::make($request->all(), [
            'namaObat' => 'required',
            'hargaObat' => 'required|numeric',
            'sisaObat' => 'required|numeric',
            'tanggalKadaluarsa' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'namaObat' => $request->namaObat,
            'hargaObat' => $request->hargaObat,
            'sisaObat' => $request->sisaObat,
            'tanggalKadaluarsa' => $request->tanggalKadaluarsa,
        ];

        $update = Obat::where('kodeObat', $kode)->update($data);
        if($update) {
            return redirect()->route('obat.index')->with(['success' => 'Obat Berhasil Diubah!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode)
    {
        Obat::where('kodeObat', $kode)->delete();
        return redirect()->route('obat.index')->with(['success' => 'Obat Berhasil Dihapus!!']);
    }
}
