@extends('layout.layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <h6>Jumlah Nasabah Berdasarkan Status Anggaran</h6>
            <hr>
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <h5>Terlambat Bayar</h5>
                            <h3>{{ $tidakLancarCount }}</h3>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <h5>Lancar</h5>
                            <h3>{{ $lancarCount }}</h3>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <h5>Lunas</h5>
                            <h3>{{ $lunasCount }}</h3>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <br>
            <h6>Jumlah Anggaran Desa</h6>
            <hr>

            <div class="row">
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <h5>Pemasukan Anggaran Desa</h5>
                            <h3>Rp 100.000.000</h3>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <h5>Pengeluaran Anggaran Desa</h5>
                            <h3>Rp {{number_format($totalPinjamanSemuanya, 0, ",", ".")}}</h3>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </section>

<!-- Content Row -->
</div>
@endsection
