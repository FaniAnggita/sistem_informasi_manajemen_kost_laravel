@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('kamar.index') }}" class="btn btn-warning btn-sm"> <span data-feather="arrow-left-circle"> </span> Batal</a>
                <h2>Detail Kamar: {{ $kamar->nama_kamar}}</h2>
            </div>
            <hr>
            <div class="col-6">
                <img src="/foto_kamar/{{$kamar->foto}}" alt="kamar" style="width: 100%">
            </div>
            <div class="col-6">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $kamar->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Kamar</th>
                        <td>{{ $kamar->nama_kamar}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Harga</th>
                        <td>{{ $kamar->harga}}<small>/ bulan</small></td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>{{ $kamar->status}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Panjang </th>
                        <td>{{ $kamar->panjang}} <small>m</small></td>
                    </tr>
                    <tr>
                        <th scope="row">Lebar </th>
                        <td>{{ $kamar->lebar}} <small>m</small></td>
                    </tr>
                    <tr>
                        <th scope="row">Kapasitas </th>
                        <td>{{ $kamar->kapasitas}} <small>orang</small></td>
                    </tr>
                    <tr>
                        <th scope="row">Keterangan</th>
                        <td>{{ $kamar->keterangan}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection('container')