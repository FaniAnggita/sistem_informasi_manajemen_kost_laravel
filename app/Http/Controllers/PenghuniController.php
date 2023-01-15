<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenghuniController extends Controller
{

    public function index()
    {
        $penghuni = DB::table('penghuni_kost')
            ->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')
            ->select('penghuni_kost.*', 'penghuni_kost.id as penghuni_kost_id', 'kamar.*')->get();
        return view('admin.penghuni.index', ['penghuni' => $penghuni]);
    }
}
