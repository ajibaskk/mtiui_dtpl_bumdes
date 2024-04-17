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
            <form method="post" action="{{route('angsuran.update', ['peminjaman' => $peminjaman])}}">
                @csrf
                @method('put')
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
                        <label for="namaUsaha">Nama Usaha</label>
                        <input type="text" class="form-control" disabled
                            id="namaUsaha" name="nama_usaha" value="{{$peminjaman->nama_usaha}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="angsuranTerbayar">Jumlah Cicilan Terbayar</label>
                        <input type="text" class="form-control form-control-lg" id="angsuranTerbayar"
                            name="angsuranTerbayar" placeholder="10xxxxxx">
                    </div>
                </div>
                <input type="hidden" class="form-control form-control-lg" id="cicilan_terbayar"
                            name="cicilan_terbayar" value="{{$peminjaman->cicilan_terbayar}}">
                <input type="hidden" class="form-control form-control-lg" id="peminjaman_id"
                            name="peminjaman_id" value="{{$peminjaman->id}}">
                <div>
                    <input class="btn btn-warning btn-user float-right" type="submit" value="Bayar">
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
