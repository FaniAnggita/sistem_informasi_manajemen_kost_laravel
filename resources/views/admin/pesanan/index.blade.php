@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="container">
        <div>
            <h2>Daftar Penghuni Kost</h2>
        </div>
        @if ($message = Session::get('message'))
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong>
                <p>{{ $message }}</p>
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <a href="{{ route('pesanan.create') }}" class="btn btn-primary btn-sm"> <span data-feather="plus-circle"></span> Tambah Penghuni Kost Baru</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Email</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kamar Kost</th>
                            <th scope="col">Harga Sewa/ bulan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penghuni as $p)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><img src="/foto_penghuni/{{$p->foto_profil}}" alt="penghuni" style="width:50px"></td>
                            <td>{{ $p->nama_penghuni}}</td>
                            <td>@if($p->gender == 1) Pria @else Wanita @endif</td>
                            <td>{{ $p->email}}</td>
                            <td>{{ $p->kontak}}</td>
                            <td>{{ $p->alamat}}</td>
                            <td>{{ $p->nama_kamar}}</td>
                            <td>{{ $p->harga}}</td>
                            <td>{{ $p->status_penghuni}}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('pesanan.edit', $p->penghuni_kost_id) }}" class="badge bg-warning"> <i class="bi bi-pencil-square"></i></a>
                                <a href='/admin/pesanan/delete/{{ $p->penghuni_kost_id }}' class="badge bg-danger" onclick="return confirm('Apakah anda yakin untuk menghapusnya?');"> <i class="bi bi-trash"></i></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection('container')