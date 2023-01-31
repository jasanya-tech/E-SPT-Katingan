<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Pengambilan;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengambilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Form Pengambilan SPT Katingan",
        ];
        return view('guest.pengambilan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "jumlah_SPT" => "required|numeric",
        ];
        $message = [
            "required" => ":attribute harus di isi",
            "min" => ":attribute minimal 3 karakter",
            "numeric" => ":attribute harus berisi angka",
        ];
        $this->validate($request, $rules, $message);

        DB::beginTransaction();
        $registrasi = Registrasi::where('no_registrasi', $request->no_registrasi)->first();
        $registrasi->status = 'selesai';
        $registrasi->save();
        if (!$registrasi) {
            DB::rollBack();
            return redirect()->back()->withInput($request->all())->with('error', 'pengambilan gagal mungkin ada kesalahan');
        }
        $pengambilan = new Pengambilan();
        $pengambilan->nama_pemilik = $request->nama_pemilik;
        $pengambilan->jumlah_SPT = $request->jumlah_SPT;
        $pengambilan->save();
        if (!$pengambilan) {
            DB::rollBack();
            return redirect()->back()->withInput($request->all())->with('error', 'pengambilan gagal mungkin ada kesalahan');
        }
        // ternary check folder TTD 
        // try {
        //     is_dir('storage/images/TTD') ? '' : mkdir('storage/images/TTD');
        //     $fileTTD = fopen("storage/images/TTD/" . time() . ".svg", "w") or die("Unable to open file!");
        //     fwrite($fileTTD, $request->TTD);
        //     fclose($fileTTD);
        // } catch (\Throwable $th) {
        //     return redirect()->back()->withInput($request->all())->with('error', $th->getMessage());
        // }
        DB::commit();
        return redirect()->back()->with('success', 'berhasil mengambil SPT');
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
}
