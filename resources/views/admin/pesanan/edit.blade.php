@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Tambah Pesanan</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">



        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>

    </head>

    <body class="bg-light">

        <div class="container">
            <main>
                <div class="row">
                    <div class="col mb-2">
                        <a href="{{ route('pesanan.index') }}" class="btn btn-warning btn-sm"> <span data-feather="arrow-left-circle"> </span> Batal</a>
                    </div>
                </div>
                <div class="text-left">
                    <h2>Form Edit Penghuni</h2>
                </div>


                <div class="row g-5">
                    <div class="col-md-7 col-lg-8">
                        <form action="{{ route('pesanan.update', $penghuni->id) }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            <div class="row g-3">
                                <hr class="my-4">
                                <small>Data Pribadi</small>
                                <div class="col-sm-12">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_penghuni" name="nama" value="{{$penghuni->nama_penghuni}}" required>
                                </div>

                                <div class="col-sm-6">
                                    <label for="gender" class="form-label">Gender</label><br>
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="1" @if($penghuni->gender == 1) ? checked : '' @endif>
                                    <label class="form-check-label me-5" for="gender">Pria</label>
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="2" @if($penghuni->gender == 2) ? checked : '' @endif>
                                    <label class="form-check-label" for="gender">Wanita</label>
                                </div>
                                <div class="col-sm-6">
                                    <label for="status_penghuni" class="form-label">Status Penghuni</label><br>
                                    <input class="form-check-input" type="radio" name="status_penghuni" id="status_penghuni" value="Aktif" @if($penghuni->status_penghuni === 'Aktif') ? checked : '' @endif>
                                    <label class="form-check-label me-5" for="status_penghuni">Aktif</label>
                                    <input class="form-check-input" type="radio" name="status_penghuni" id="status_penghuni" value="Nonaktif" @if($penghuni->status_penghuni === 'Nonaktif') ? checked : '' @endif>
                                    <label class="form-check-label" for="status_penghuni">Nonaktif</label>
                                </div>

                                <div class="col-sm-6">
                                    <label for="ttl" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="ttl" name="ttl" value="{{$penghuni->ttl}}" required>
                                </div>
                                <div class="col-12">
                                    <label for="formFile" class="form-label">Foto Identitas</label>
                                    <input class="form-control" type="file" id="formFile" name="foto">
                                </div>
                                <div class="col-sm-12">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$penghuni->alamat}}" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$penghuni->email}}" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="kontak" value="{{$penghuni->kontak}}">
                                </div>

                                <!-- Gallery Kamar -->
                                <div class="row g-2">
                                    @foreach ($kamar as $k)
                                    <div class="col-md-4">
                                        <div class="thumbnail text-center bg-white shadow-sm p-2 mb-5 bg-body rounded">
                                            <input type="radio" class="btn-check" name="id_kamar" id="{{$k->id}}" value="{{$k->id}}" @if($k->id == $penghuni->id_kamar) ? checked : '' @endif ) autocomplete="off">
                                            <label class="btn btn-outline-success w-100" for="{{$k->id}}">{{$k->nama_kamar}}</label>
                                            <h6><small>Rp {{$k->harga}}/bulan</small></h6>
                                            <img src="/foto_kamar/{{$k->foto}}" alt="kamar" style="width:100%">
                                            <div class="caption mt-2">
                                                <p>{{$k->keterangan}}</p>
                                                <a href="" class="btn btn-warning col-12">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Akhir Gallery Kamar -->

                                <button class="w-100 btn btn-primary btn-lg" type="submit">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    </body>

    </html>

</div>
@endsection('container')