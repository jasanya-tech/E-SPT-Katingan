<?php

namespace App\Helpers;

use App\Models\Registrasi;

class SPT
{
    public static function generateNoRegis()
    {
        // mendeklarasikan no registrasi baru
        $noRegis = '594.4/001/XII/KT/PEM';
        // mengambil data registrasi terakhir
        $regis = Registrasi::orderBy('created_at', 'DESC')->first();
        // jika data registrasi tersedia di database maka membuat no registrasi baru
        if ($regis) {
            $oldNoRegis = explode('/', $regis->no_registrasi);
            $noUrut = (int) explode('/', $regis->no_registrasi)[1] + 1;
            $jumlahNoUrut = strlen((string) $noUrut);
            // jika jumlah no urut lebih kecil dari 3 menambahkan angka 0 di depan jadi jika 1 mejadi 001
            if ($jumlahNoUrut < 3) {
                $reNew = '';
                for ($x = 0; $x < (3 - $jumlahNoUrut); $x++) {
                    $reNew .= '0';
                }
                $reNew .= $noUrut;
                $noUrut = $reNew;
            }
            $noRegis = "$oldNoRegis[0]/$noUrut/$oldNoRegis[2]/$oldNoRegis[3]/$oldNoRegis[4]";
        }
        return $noRegis;
    }
}
