<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Form Registrasi SPT Katingan"
        ];
        return view('guest.registrasi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $registrasi = Registrasi::where('nama_pemilik_SPT', strtolower($request->nama_pemilik))->get();
        $data = [
            'title' => "Form Registrasi SPT Katingan",
            'jumlah_SPT' => $request->jumlah_SPT,
            'nama_pemilik' => $request->nama_pemilik,
            'registrasi' => $registrasi
        ];
        return view('guest.registrasi.form', $data);
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
            "nama_pemilik_SPT" => "required|min:3",
            "luas_tanah" => "required|numeric",
            "perbatasan_tanah_utara" => "required|min:3",
            "perbatasan_tanah_timur" => "required|min:3",
            "perbatasan_tanah_barat" => "required|min:3",
            "perbatasan_tanah_selatan" => "required|min:3",
            "alamat" => "required|min:6",
        ];
        $message = [
            "required" => ":attribute harus di isi",
            "min" => ":attribute minimal :min karakter",
            "numeric" => ":attribute harus berisi angka",
        ];
        $this->validate($request, $rules, $message);
        unset($request["_token"]);
        $registrasi = Registrasi::where('nama_pemilik_SPT', $request->nama_pemilik_SPT)->first();
        if (!$registrasi) {
            $registrasi = new Registrasi();
        }
        foreach (array_keys($request->all()) as $requestKey) {
            $registrasi[$requestKey] = $request[$requestKey];
        }
        $registrasi->save();

        $data = [
            'title' => 'Registrasi Berhasil',
            'nama_pemilik_SPT' => $request->nama_pemilik_SPT
        ];
        return view('guest.registrasi.success', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check(Request  $request)
    {
        $namaPemilik = $request->nama_pemilik_SPT;
        $registrasi = Registrasi::where('nama_pemilik_SPT', $namaPemilik)->first();
        if (!$registrasi) {
            return redirect()->back()->with('error', 'nama pemilik belum melakukan registrasi')->withInput($request->all());
        }
        $data = [
            'title' => "Check Status Registrasi SPT $namaPemilik",
            'registrasi' => $registrasi
        ];
        return view('guest.registrasi.check', $data);
    }

    public function formCheck()
    {
        $data = [
            'title' => "Form Check Status Registrasi SPT",
        ];
        return view('guest.registrasi.form-check', $data);
    }
}
