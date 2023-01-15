<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function beranda()
    {
        $kamar = DB::table('kamar')->select(DB::raw('count(*) as total'))
            ->groupBy('id')
            ->get();
        $budget = DB::table('penghuni_kost')->select('SELECT SUM(harga) FROM kamar JOIN penghuni_kost WHERE kamar.id = penghuni_kost.id_kamar')->get();

        $penghuni = DB::table('penghuni_kost')->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')->get();

        return view('admin.beranda', ['kamar' => $kamar, 'penghuni' => $penghuni, 'budget' => $budget]);
    }
}
