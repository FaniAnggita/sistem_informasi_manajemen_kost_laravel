@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="container">
        <div>
            <h2>Laporan Keuangan</h2>
        </div>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <form action="/admin/laporan/show" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <hr class="my-4">

                        <div class="col-sm-4">
                            <label for="dari" class="form-label">Dari</label>
                            <input type="date" class="form-control" id="dari" name="dari" value="" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="sampai" class="form-label">Sampai</label>
                            <input type="date" class="form-control" id="sampai" name="sampai" value="" required>
                        </div>

                        <div class="col-sm-4">
                            <button class="w-100 btn btn-primary mt-4" type="submit">Tampilkan</button>
                        </div>
                        <hr class="my-4">
                </form>
            </div>
        </div>
        <div class="row g-3 mt-5">
            <div class="col">
                <h3 class="text-center">Laporan Keuangan Periode {{$dari}} sampai {{$sampai}}</h3>
            </div>


            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope=" col">ID Penghuni</th>
                        <th scope="col">Nama Penghuni</th>
                        <th scope="col">Kamar</th>
                        <th scope="col">Harga sewa kamar/ bulan</th>
                        <th scope="col">Bukti Pembayaran</th>
                        <th scope="col">Periode Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach($lapor as $l)
                    <tr>
                        <th>{{$l->id}}</th>
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
            <div class="row">
                <h4>Total: <b><?php echo $total ?></b></h4>
            </div>
        </div>
    </div>

</div>
@endsection('container')