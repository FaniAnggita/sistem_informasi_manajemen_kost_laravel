@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="container">
        <div>
            <h2>Daftar Kamar Kost</h2>
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
                <a href="{{ route('kamar.create') }}" class="btn btn-primary btn-sm"> <span data-feather="plus-circle"></span> Kamar Baru</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kamar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kapasitas</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kamar as $k)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $k->nama_kamar}}</td>
                            <td>{{ $k->status}}</td>
                            <td>{{ $k->harga}}</td>
                            <td>{{ $k->kapasitas}}</td>
                            <td>{{ $k->panjang }}x{{ $k->lebar}}</td>
                            <td> <img src="/foto_kamar/{{$k->foto}}" alt="kamar" style="width:150px"></td>
                            <td>{{ $k->keterangan}}</td>
                            <td>

                                <a href="{{ route('kamar.show', $k->id) }}" class="badge bg-info"> <i class="bi bi-eye"></i></i></a>
                                <a href="{{ route('kamar.edit', $k->id) }}" class="badge bg-warning"> <i class="bi bi-pencil-square"></i></i></a>
                                <a href='delete/{{ $k->id }}' class="badge bg-danger" onclick="return confirm('Apakah anda yakin untuk menghapusnya?');"> <i class="bi bi-trash"></i>/a>
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