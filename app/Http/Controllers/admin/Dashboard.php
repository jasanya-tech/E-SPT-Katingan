<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pengambilan;
use App\Models\Registrasi;

class Dashboard extends Controller
{
    public function index()
    {
        $registrasi = Registrasi::get();
        $countDiproses = Registrasi::where('status', 'diproses')->get()->count() > 0 ? Registrasi::where('status', 'diproses')->get()->count() : "tidak ada";
        $countRegistrasi = $registrasi->count() > 0 ? Registrasi::get()->count() : "tidak ada";
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
}
