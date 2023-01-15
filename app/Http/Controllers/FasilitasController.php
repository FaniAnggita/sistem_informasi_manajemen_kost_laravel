<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = DB::table('fasilitas')->get();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitas = DB::table('fasilitas')->get();
        return view('admin.fasilitas.create', compact('fasilitas'));
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
            'nama_fasilitas' => 'required',
            'kategori' => 'required',
            'harga_sewa' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',

        ]);

        $fasilitas = DB::table('fasilitas')->insert(request()->except(['_token']));
        return redirect()->route('fasilitas.index')
            ->with(
                'message',
                'Fasilitas baru berhasil disimpan!'
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
        $fasilitas = DB::table('fasilitas')->find($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
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
            'nama_fasilitas' => 'required',
            'harga_sewa' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
            'kategori' => 'required',

        ]);

        $fasilitas = DB::table('fasilitas')->where('id', $id)->update(request()->except(['_method', '_token']));
        return redirect()->route('fasilitas.index')
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
        DB::delete('delete from fasilitas where id = ?', [$id]);
        return redirect()->route('fasilitas.index')
            ->with('message', 'Data berhasil dihapus!');
    }
}
