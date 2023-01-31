<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pengambilan;
use App\Models\Registrasi;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $registrasi = Registrasi::orderBy('created_at', 'DESC')->where('status', 'diproses')->get();
        $countDiproses = Registrasi::where('status', 'diproses')->get()->count() > 0 ? Registrasi::where('status', 'diproses')->get()->count() : "tidak ada";
        $countRegistrasi = Registrasi::get()->count() > 0 ? Registrasi::get()->count() : "tidak ada";
        $countPengambilan = Pengambilan::get()->count() > 0 ? Pengambilan::get()->count() : "tidak ada";
        $data = [
            'title' => 'Dashboard',
            'registrasi' => $registrasi,
            'countRegistrasi' => $countRegistrasi,
            'countDiproses' => $countDiproses,
            'countPengambilan' => $countPengambilan
        ];
        return view('admin.dashboard', $data);
    }
    public function confirmRegistrasi(Request $request)
    {
        // Validation
        $rules = [
            "document_SPT" => "mimetypes:application/pdf",
        ];
        $message = [
            'mimetypes' => ":attribute wajib berbentuk PDF"
        ];
        $this->validate($request, $rules, $message);
        $path = $request->file('document_SPT')->store('SPT');
        $registrasi = Registrasi::where('no_registrasi', $request->no_registrasi)->first();
        $registrasi->status = "menunggu";
        $registrasi->document_SPT = $path;
        $registrasi->save();
        return redirect()->back()->with('success', "SPT berhasil di prosess dan menunggu pemilik mengambil");
    }
}
