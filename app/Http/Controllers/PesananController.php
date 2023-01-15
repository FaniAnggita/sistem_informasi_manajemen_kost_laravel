<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PesananController extends Controller
{

    public function index()
    {
        $penghuni = DB::table('penghuni_kost')->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')->select('penghuni_kost.*', 'penghuni_kost.id as penghuni_kost_id', 'kamar.*')->get();
        return view('admin.pesanan.index', ['penghuni' => $penghuni]);
    }

    public function create()
    {
        $kamar = DB::table('kamar')->get();
        return view('admin.pesanan.create', ['kamar' => $kamar]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'ttl' => 'required',
            'id_kamar' => 'required',
        ]);

        $fotoprofil = $request->file('foto');
        $namafilefoto = time() . "-penghuni." . $fotoprofil->getClientOriginalExtension();
        $dir_foto = 'foto_penghuni/';
        $simpan_foto = $namafilefoto;
        $success = $fotoprofil->move($dir_foto, $namafilefoto);

        // Validasi Kamar

        DB::table('kamar')->where('id', $request['id_kamar'])->update([
            'kapasitas' => DB::raw('kapasitas - 1')
        ]);


        $penghuni = DB::table('penghuni_kost')->insert([
            'nama_penghuni' => $request['nama'],
            'alamat' =>  $request['alamat'],
            'email' =>   $request['email'],
            'kontak' =>  $request['kontak'],
            'gender' =>  $request['gender'],
            'ttl' => $request['ttl'],
            'id_kamar' => $request['id_kamar'],
            'foto_profil' => $simpan_foto
        ]);
        return redirect()->route('pesanan.index')
            ->with(
                'message',
                'Pesanan baru berhasil disimpan!'
            );
    }

    public function edit($id)
    {
        $penghuni = DB::table('penghuni_kost')->find($id);
        $kamar = DB::table('kamar')->get();

        return view('admin.pesanan.edit', ['kamar' => $kamar, 'penghuni' => $penghuni]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'ttl' => 'required',
            'id_kamar' => 'required',
            'status_penghuni' => 'required',
        ]);


        $fotoprofil = $request->file('foto');
        $namafilefoto = time() . "-penghuni." . $fotoprofil->getClientOriginalExtension();
        $dir_foto = 'foto_penghuni/';
        $simpan_foto = $namafilefoto;
        $success = $fotoprofil->move($dir_foto, $namafilefoto);

        // Validasi update kamar
        $id_kamar_sebelumnya = DB::table('penghuni_kost')->find($id);
        $id_kamar_baru = $request['id_kamar'];

        if ($id_kamar_sebelumnya != $id_kamar_baru) {
            DB::table('kamar')->where('id', $request['id_kamar'])->update([
                'kapasitas' => DB::raw('kapasitas - 1')
            ]);
        }

        //validasi foto
        $penghuni = DB::table('penghuni_kost')->where('id', $id)->update([
            'nama_penghuni' => $request['nama'],
            'alamat' =>  $request['alamat'],
            'email' =>   $request['email'],
            'kontak' =>  $request['kontak'],
            'gender' =>  $request['gender'],
            'ttl' => $request['ttl'],
            'id_kamar' => $request['id_kamar'],
            'status_penghuni' => $request['status_penghuni'],
            'foto_profil' => $simpan_foto
        ]);
        return redirect()->route('pesanan.index')
            ->with(
                'message',
                'Pesanan baru berhasil diperbarui!'
            );
    }

    public function show()
    {
    }

    public function destroy($id)
    {
        DB::delete('delete from penghuni_kost where id = ?', [$id]);
        return redirect()->route('pesanan.index')
            ->with('message', 'Pesanan berhasil dihapus!');
    }
}
