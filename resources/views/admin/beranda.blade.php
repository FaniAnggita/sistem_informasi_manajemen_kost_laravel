@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    <div class="row">
        <div class="col-sm-6 mb-4">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="card bg-info mb-3 text-white">
                <div class="card-header">
                    <h3>@foreach ($kamar as $k) {{ $k->total}} @endforeach</h3>
                    <p>Kamar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/admin/kamar" class="card-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="card bg-success mb-3 text-white">
                <div class="card-header">
                    <h3>@foreach ($penghuni_kost_aktif as $k) {{ $k->total}} @endforeach</h3>
                    <p>Penghuni Kost Aktif</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/pesanan" class="card-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="card bg-warning mb-3 text-white">
                <div class="card-header">
                    <h3>@foreach ($penghuni_kost_nonaktif as $k) {{ $k->total}} @endforeach</h3>
                    <p>Penghuni Kost Nonaktif</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/admin/pesanan" class="card-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="card bg-danger mb-3 text-white">
                <div class="card-header">
                    <h3>@foreach ($budget as $k) {{ $k->total}} @endforeach<sup style="font-size: 15px"> /tahun</sup></h3>

                    <p>Budget</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/admin/laporan" class="card-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <!-- Bagain Table -->
    <div class="row mt-3">
        <h4>Penghuni Kost</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Kontak</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kamar Kost</th>
                    <th scope="col">Harga Sewa/ bulan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penghuni as $p)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><img src="/foto_penghuni/{{$p->foto_profil}}" alt="penghuni" style="width:50px"></td>
                    <td>{{ $p->nama_penghuni}}</td>
                    <td>{{ $p->email}}</td>
                    <td>{{ $p->kontak}}</td>
                    <td>{{ $p->alamat}}</td>
                    <td>{{ $p->nama_kamar}}</td>
                    <td>{{ $p->harga}}</td>
                    <td>{{ $p->status_penghuni}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection('container')