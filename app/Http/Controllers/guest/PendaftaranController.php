<?php

namespace App\Http\Controllers\guest;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "title" => "Data Pendaftaran SPT Katingan"
        ];
        return view('guest.pendaftaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "title" => "Form Pendaftaran SPT Katingan"
        ];
        return view('guest.pendaftaran.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $rules = [
            "nama_pemilik" => "required|min:3",
            "nama_pendaftar" => "required|min:3",
            "jumlah_SPT" => "required|numeric",
        ];
        $message = [
            "required" => ":attribute harus di isi",
            "min" => ":attribute minimal 3 karakter",
            "numeric" => ":attribute harus berisi angka",
        ];
        $this->validate($request, $rules, $message);
        // End Validation
        unset($request["_token"]);
        $pendaftaran = Pendaftaran::where('nama_pemilik', $request->nama_pemilik)->first();
        if (!$pendaftaran) {
            $pendaftaran = new Pendaftaran();
        }
        foreach (array_keys($request->all()) as $requestKey) {
            $pendaftaran[$requestKey] = $request[$requestKey];
        }
        $pendaftaran->save();
        if (!$pendaftaran) {
            return redirect()->back()->with("error", "something wrong");
        }
        return redirect()->action([RegistrasiController::class, 'create'], $request->all())->with('success', 'Pendaftaran berhasil silahkan isi form registrasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}
