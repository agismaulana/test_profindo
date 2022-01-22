<?php

namespace App\Http\Controllers;

use App\Models\Apoteker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ApotekerController extends Controller
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
        $data = Apoteker::all();
        return view('apoteker.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apoteker.create');
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
            'namaApoteker' => 'required',
            'tanggalLahir' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $apoteker = Apoteker::all();

        if(count($apoteker) >= 10) {
            $count = '0'.count($apoteker) + 1;
        } else if(count($apoteker) >= 100) {
            $count = count($apoteker) + 1;
        } else {
            $count = '00'.count($apoteker) + 1;
        }

        $kode = 'AP'.$count;

        $data = [
            'kodeApoteker' => $kode,
            'namaApoteker' => $request->namaApoteker,
            'tanggalLahir' => $request->tanggalLahir,
        ];

        $user = [
            'name' => $request->namaApoteker,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apoteker_id' => $kode,
        ];

        $create = Apoteker::create($data);
        $createUser = User::create($user);

        if($create) {
            return redirect()->route('apoteker.index')->with(['success' => 'Apoteker Berhasil Ditambahkan!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apoteker  $apoteker
     * @return \Illuminate\Http\Response
     */
    public function show($kode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apoteker  $apoteker
     * @return \Illuminate\Http\Response
     */
    public function edit($kode)
    {
        $data = Apoteker::with('user')->where('kodeApoteker', $kode)->first();
        return view('apoteker.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apoteker  $apoteker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode)
    {
        $validator = Validator::make($request->all(), [
            'namaApoteker' => 'required',
            'tanggalLahir' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'namaApoteker' => $request->namaApoteker,
            'tanggalLahir' => $request->tanggalLahir,
        ];

        $oldUser = User::where('apoteker_id', $kode)->first();

        if($request->password == "") {
            $password = $oldUser->password;
        } else {
            $password = Hash::make($request->password);
        }

        $user = [
            'name' => $request->namaApoteker,
            'email' => $request->email,
            'password' => $password,
        ];

        $update = Apoteker::where('kodeApoteker', $kode)->update($data);
        $updateUser = User::where('apoteker_id', $kode)->update($user);

        if($update) {
            return redirect()->route('apoteker.index')->with(['success' => 'Apoteker Berhasil Diubah!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apoteker  $apoteker
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode)
    {
        Apoteker::where('kodeApoteker', $kode)->delete();
        User::where('apoteker_id', $kode)->delete();
        return redirect()->route('apoteker.index')->with(['success' => 'Apoteker Berhasil dihapus!!']);
    }
}
