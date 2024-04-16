@extends('layout.layout')
@section('content')

<style>
    .Lancar{
        background-color:green!important;
        color:#fff!important;
    }

    .Terlambat{
        background-color:red!important;
        color:#fff!important;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Nasabah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama Nasabah</th>
                            <th>Tenggat Waktu</th>
                            <th>Kategori</th>
                            <th>Jumlah Cicilan Terbayar</th>
                            <th>Total Pinjaman</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peminjaman as $peminjamanEach)
                        <tr>
                            <td>{{$peminjamanEach->nasabah->nik}}</td>
                            <td>{{$peminjamanEach->nasabah->nama_lengkap}}</td>
                            <td>{{\Carbon\Carbon::parse($peminjamanEach->created_at)->addMonths($peminjamanEach->tenor)->isoFormat('DD MMMM YYYY')}}</td>
                            <td class="{{ $peminjamanEach->kategori }}">{{ $peminjamanEach->kategori }}</td>
                            <td>Rp {{ isset($peminjamanEach->cicilan_terbayar) ? number_format($peminjamanEach->cicilan_terbayar, 2, ",", ".") : '0' }}</td>
                            <td>Rp {{ number_format($peminjamanEach->total_pinjaman, 2, ",", ".") }}</td>
                            <td>
                                <div class="row justify-content-center">
                                    <a href="{{route('angsuran.detail', ['peminjaman' =>  $peminjamanEach])}}" class="btn btn-secondary btn-circle btn-sm">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection
