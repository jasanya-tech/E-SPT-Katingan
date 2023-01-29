<?php

namespace App\View\Components;

use App\Models\Pendaftaran;
use App\Models\Registrasi;
use App\Models\Pengambilan;
use Illuminate\View\Component;

class RekapPendaftar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $countDiproses = Registrasi::where('status', 'diproses')->get()->count() > 0 ? Registrasi::where('status', 'diproses')->get()->count() : "tidak ada";
        $countRegistrasi = Registrasi::get()->count() > 0 ? Registrasi::get()->count() : "tidak ada";
        $countPengambilan = Pengambilan::get()->count() > 0 ? Pengambilan::get()->count() : "tidak ada";
        $data = [
            'countRegistrasi' => $countRegistrasi,
            'countDiproses' => $countDiproses,
            'countPengambilan' => $countPengambilan
        ];
        return view('components.rekap-pendaftar', $data);
    }
}
