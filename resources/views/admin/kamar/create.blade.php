@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
                <div class="row">
                    <div class="col">
                        <a href="{{ route('kamar.index') }}" class="btn btn-warning btn-sm"> <span data-feather="arrow-left-circle"> </span> Batal</a>
                    </div>
                </div>
                <div class="text-left">
                    <h2>Form Tambah Kamar</h2>
                </div>


                <div class="row g-5">
                    <div class="col-md-7 col-lg-8">
                        <form action="{{ route('kamar.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-3">
                                    <label for="nama_kamar" class="form-label">Nama Kamar</label>
                                    <input type="text" class="form-control" id="nama_kamar" name="nama_kamar" value="" required>
                                </div>

                                <div class="col-sm-3">
                                    <label for="kapasitas" class="form-label">Kapasitas <small>(Orang)</small></label>
                                    <input type="number" class="form-control" id="kapasitas" placeholder="0" name="kapasitas" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="panjang" class="form-label">Panjang <small>(m)</small></label>
                                    <input type="number" class="form-control" id="panjang" placeholder="0" name="panjang" required>
                                </div>

                                <div class="col-sm-3">
                                    <label for="lebar" class="form-label">Lebar <small>(m)</small></label>
                                    <input type="number" class="form-control" id="lebar" placeholder="0" name="lebar" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="harga" class="form-label">Harga</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" id="harga" name="harga" aria-label="Amount (to the nearest dollar)" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="keterangan" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea">Keterangan</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="formFile" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="formFile" name="foto">
                                </div>

                                <hr class="my-4">

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