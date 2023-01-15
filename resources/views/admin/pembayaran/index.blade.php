@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="container">


        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="generator" content="Hugo 0.88.1">
            <title>Kamar Baru</title>

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

                    <div class="text-left">
                        <h2>Form Pembayaran</h2>
                    </div>


                    <div class="row g-5">
                        <div class="col-md-7 col-sm-8">
                            <form action="{{ route('pembayaran.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="status" class="form-label">Penghuni</label>
                                    <select class="form-select" name="id_penghuni" aria-label="Default select example">
                                        @foreach($pembayaran as $p){
                                        <option value="{{$p->penghuni_kost_id}}">{{$p->penghuni_kost_id}} | {{$p->nama_penghuni}} | {{$p->harga}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="periode" class="form-label">Periode Pembayaran</label>
                                    <input type="date" class="form-control" id="periode" name="periode" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="bukti_bayar" class="form-label">Bukti Pembayaran<small> (Opsional)</small></label>
                                    <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar">
                                </div>

                                <hr class="my-4">

                                <button class="w-100 btn btn-primary btn-lg" type="submit">SIMPAN</button>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <h4>Tabel Pembayaran</h4>
                        <table class="table table-bordered table-striped">
                            <thead class="bg-dark">
                                <tr>
                                    <th scope=" col">#</th>
                                    <th scope="col">Nama Penghuni</th>
                                    <th scope="col">Kamar</th>
                                    <th scope="col">Harga sewa kamar/ bulan</th>
                                    <th scope="col">Bukti Pembayaran</th>
                                    <th scope="col">Periode Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $total = 0; ?>
                                @foreach($lunas as $l)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$l->nama_penghuni}}</td>
                                    <td>{{$l->nama_kamar}}</td>
                                    <td>{{$l->harga}}</td>
                                    <td><img src="/foto_bukti_bayar/{{$l->bukti_bayar}}" width="80px" alt=""></td>
                                    <td>{{$l->periode}}</td>
                                    <?php $total += $l->harga ?>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <h4>Total: <b><?php echo $total ?></b></h4>
                    </div>
                </main>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
        </body>

        </html>
    </div>
</div>
@endsection('container')