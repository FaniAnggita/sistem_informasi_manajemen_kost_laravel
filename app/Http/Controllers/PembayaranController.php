<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = DB::table('penghuni_kost')->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')->select('penghuni_kost.*', 'penghuni_kost.id as penghuni_kost_id', 'kamar.*')->get();
        $lunas = DB::table('pembayaran')->join('penghuni_kost', 'penghuni_kost.id', '=', 'pembayaran.id_penghuni')->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')->select('penghuni_kost.*', 'kamar.*', 'pembayaran.*')->get();
        return view('admin.pembayaran.index', ['pembayaran' => $pembayaran, 'lunas' => $lunas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_penghuni' => 'required',
            'periode' => 'required',
            'bukti_bayar' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $fotoprofil = $request->file('bukti_bayar');
        $namafilefoto = time() . "_bukti_bayar." . $fotoprofil->getClientOriginalExtension();
        $dir_foto = 'foto_bukti_bayar/';
        $simpan_foto = $namafilefoto;
        $success = $fotoprofil->move($dir_foto, $namafilefoto);

        $kamar = DB::table('pembayaran')->insert([
            'id_penghuni' => $request['id_penghuni'],
            'periode' =>  $request['periode'],
            'bukti_bayar' => $simpan_foto
        ]);
        return redirect()->route('pembayaran.index')
            ->with(
                'message',
                'Input pembayaran berhasil disimpan!'
            );
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
