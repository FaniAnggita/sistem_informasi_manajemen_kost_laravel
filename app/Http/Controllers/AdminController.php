<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function beranda()
    {
        $kamar = DB::table('kamar')->select(DB::raw('count(*) as total'))
            ->get();
        $penghuni_kost_aktif = DB::table('penghuni_kost')->select(DB::raw('count(*) as total'))->where('status_penghuni', '=', 'Aktif')
            ->get();
        $penghuni_kost_nonaktif = DB::table('penghuni_kost')->select(DB::raw('count(*) as total'))->where('status_penghuni', '=', 'Nonaktif')
            ->get();

        $penghuni = DB::table('penghuni_kost')->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')->get();

        $budget = DB::table('kamar')->select(DB::raw('SUM(harga) as total'))->join('penghuni_kost', 'penghuni_kost.id_kamar', '=', 'kamar.id')
            ->join('pembayaran', 'pembayaran.id_penghuni', '=', 'penghuni_kost.id')->get();

        return view('admin.beranda', ['kamar' => $kamar, 'penghuni' => $penghuni, 'penghuni_kost_aktif' => $penghuni_kost_aktif, 'penghuni_kost_nonaktif' => $penghuni_kost_nonaktif, 'budget' => $budget]);
    }
}
