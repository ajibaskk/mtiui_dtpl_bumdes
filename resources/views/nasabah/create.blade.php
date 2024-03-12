@extends('layout.layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Nasabah</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('nasabah.store')}}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaLengkap"
                            name="nama_lengkap" placeholder="John Doe">
                    </div>
                    <div class="col-sm-6">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik"
                            name="nik" placeholder="NIK">
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamatLengkap">Alamat Lengkap</label>
                    <input type="text" class="form-control" id="alamatLengkap"
                        name="alamat_lengkap" placeholder="Jl. Nama Desa">
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="tempatLahir">Tempat Lahir</label>
                        <input type="text" class="form-control"
                            id="tempatLahir" name="tempat_lahir" placeholder="Jakarta">
                    </div>
                    <div class="col-sm-3">
                        <label for="tanggalLahir">Tanggal Lahir</label>
                        <input type="date" class="form-control"
                            id="tanggalLahir" name="tanggal_lahir" placeholder="01/01/2000">
                    </div>
                    <div class="col-sm-3">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                        <select class="custom-select" id="jenisKelamin" name="jenis_kelamin">
                            <option value="0" selected>Laki-laki</option>
                            <option value="1">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                        <select class="custom-select" id="jenisPekerjaan" name="jenis_pekerjaan">
                            <option value="Karyawan Swasta" selected>Karyawan Swasta</option>
                            <option value="Petani">Petani</option>
                            <option value="Pengangguran">Pengangguran</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="rentangPenghasilan">Rentang Penghasilan per Tahun</label>
                        <select class="custom-select" id="rentangPenghasilan" name="rentang_penghasilan">
                            <option value="< Rp100.000.000" selected> < Rp100.000.000 </option>
                            <option value="> Rp100.000.000"> > Rp100.000.000 </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="pendidikanTerakhir">Pendidikan Terakhir</label>
                        <select class="custom-select" id="pendidikanTerakhir" name="pendidikan_terakhir">
                            <option value="SMP">SMP</option>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2" selected>S2</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="fileKtpKk">File KTP/KK</label>
                        <input type="file" class="form-control-file" id="fileKtpKk" name="file_ktp_location">
                    </div>
                </div>
                <br>
                <div>
                    <input class="btn btn-success btn-user btn-block" type="submit" value="Simpan">
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
