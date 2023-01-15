<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = DB::table('kamar')->get();
        return view('admin.kamar.kamar', ['kamar' => $kamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kamar = DB::table('kamar')->get();
        return view('admin.kamar.create', compact('kamar'));
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
            'nama_kamar' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'kapasitas' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $fotoprofil = $request->file('foto');
        $namafilefoto = time() . "-kamar." . $fotoprofil->getClientOriginalExtension();
        $dir_foto = 'foto_kamar/';
        $simpan_foto = $namafilefoto;
        $success = $fotoprofil->move($dir_foto, $namafilefoto);

        $kamar = DB::table('kamar')->insert([
            'nama_kamar' => $request['nama_kamar'],
            'panjang' =>  $request['panjang'],
            'lebar' =>   $request['lebar'],
            'harga' =>  $request['harga'],
            'keterangan' =>  $request['keterangan'],
            'kapasitas' => $request['kapasitas'],
            'foto' => $simpan_foto
        ]);
        return redirect()->route('kamar.index')
            ->with(
                'message',
                'Kamar baru berhasil disimpan!'
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
        $kamar = DB::table('kamar')->find($id);
        return view('admin.kamar.show', compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $kamar = DB::table('kamar')->find($id);
        return view('admin.kamar.edit', compact('kamar'));
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
        $this->validate($request, [
            'nama_kamar' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'kapasitas' => 'required',
            'status' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $fotoprofil = $request->file('foto');
        $namafilefoto = time() . "-kamar." . $fotoprofil->getClientOriginalExtension();
        $dir_foto = 'foto_kamar/';
        $simpan_foto = $namafilefoto;
        $success = $fotoprofil->move($dir_foto, $namafilefoto);

        $kamar = DB::table('kamar')->where('id', $id)->update([
            'nama_kamar' => $request['nama_kamar'],
            'panjang' =>  $request['panjang'],
            'lebar' =>   $request['lebar'],
            'harga' =>  $request['harga'],
            'keterangan' =>  $request['keterangan'],
            'kapasitas' => $request['kapasitas'],
            'status' => $request['status'],
            'foto' => $simpan_foto
        ]);
        return redirect()->route('kamar.index')
            ->with(
                'message',
                'Data berhasil diperbarui!'
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from kamar where id = ?', [$id]);
        return redirect()->route('kamar.index')
            ->with('message', 'Data berhasil dihapus!');
    }
}
