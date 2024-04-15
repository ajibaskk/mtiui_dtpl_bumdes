@extends('layout.layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Angsuran</h6>
        </div>
        <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaLengkap" disabled
                            name="nama_lengkap" placeholder="John Doe" value="{{$peminjaman->nasabah->nama_lengkap}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" disabled
                            name="nik" placeholder="NIK" value="{{$peminjaman->nasabah->nik}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="alamatLengkap">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamatLengkap" disabled
                            name="alamat_lengkap" placeholder="Jl. Nama Desa" value="{{$peminjaman->nasabah->alamat_lengkap}}">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="tempatLahir">Jenis Pekerjaan</label>
                        <input type="text" class="form-control" disabled
                            id="tempatLahir" name="tempat_lahir" placeholder="Jakarta" value="{{$peminjaman->jenis_usaha}}">
                    </div>
                    <div class="col-sm-3">
                        <label for="tanggalLahir">Nama Usaha</label>
                        <input type="date" class="form-control" disabled
                            id="tanggalLahir" name="tanggal_lahir" placeholder="01/01/2000" value="{{$peminjaman->nama_usaha}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="angsuranTerbayar">Jumlah Cicilan Terbayar</label>
                        <input type="text" class="form-control form-control-lg" id="angsuranTerbayar"
                            name="angsuranTerbayar" placeholder="10xxxxxx">
                    </div>
                </div>
                <button type="button" class="btn btn-warning btn-lg float-right">Bayar</button>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
