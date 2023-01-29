<?php

namespace App\Helpers;

use App\Models\Registrasi;

class SPT
{
    public static function generateNoRegis()
    {
        $noRegis = '594.4/001/XII/KT/PEM';
        $regis = Registrasi::orderBy('created_at', 'DESC')->first();
        if ($regis) {
            $oldNoRegis = explode('/', $regis->no_registrasi);
            $noUrut = (int) explode('/', $regis->no_registrasi)[1] + 1;
            $jumlahNoUrut = strlen((string) $noUrut);
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
