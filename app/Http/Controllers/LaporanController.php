<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dari = 'Awal';
        $sampai = 'Akhir';
        $lapor = DB::table('pembayaran')
            ->join('penghuni_kost', 'penghuni_kost.id', '=', 'pembayaran.id_penghuni')
            ->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')->select('penghuni_kost.*', 'kamar.*', 'pembayaran.*')
            ->where([['pembayaran.periode', '>=', '2000-01-01'], ['pembayaran.periode', '<=', '4000-01-01']])->get();
        return view('admin.laporan.index', ['lapor' => $lapor, 'dari' => $dari, 'sampai' => $sampai]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $dari = $request['dari'];
        $sampai = $request['sampai'];
        $lapor = DB::table('pembayaran')
            ->join('penghuni_kost', 'penghuni_kost.id', '=', 'pembayaran.id_penghuni')
            ->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')->select('penghuni_kost.*', 'kamar.*', 'pembayaran.*')
            ->where([['pembayaran.periode', '>=', $dari], ['pembayaran.periode', '<=', $sampai]])->get();
        return view('admin.laporan.index', ['lapor' => $lapor, 'dari' => $dari, 'sampai' => $sampai]);
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
