@extends('layout.layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Nasabah</h6>
        </div>
        <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaLengkap" disabled
                            name="nama_lengkap" placeholder="John Doe" value="{{$nasabah->nama_lengkap}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" disabled
                            name="nik" placeholder="NIK" value="{{$nasabah->nik}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamatLengkap">Alamat Lengkap</label>
                    <input type="text" class="form-control" id="alamatLengkap" disabled
                        name="alamat_lengkap" placeholder="Jl. Nama Desa" value="{{$nasabah->alamat_lengkap}}">
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="tempatLahir">Tempat Lahir</label>
                        <input type="text" class="form-control" disabled
                            id="tempatLahir" name="tempat_lahir" placeholder="Jakarta" value="{{$nasabah->tempat_lahir}}">
                    </div>
                    <div class="col-sm-3">
                        <label for="tanggalLahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" disabled
                            id="tanggalLahir" name="tanggal_lahir" placeholder="01/01/2000" value="{{$nasabah->tanggal_lahir}}">
                    </div>
                    <div class="col-sm-3">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                        <select class="custom-select" id="jenisKelamin" name="jenis_kelamin" disabled>
                            <option value="0" @selected($nasabah->jenis_kelamin == '0')>Laki-laki</option>
                            <option value="1" @selected($nasabah->jenis_kelamin == '1')>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                        <select class="custom-select" id="jenisPekerjaan" name="jenis_pekerjaan" disabled>
                            <option value="Karyawan Swasta" @selected($nasabah->jenis_pekerjaan == 'Karyawan Swasta')>Karyawan Swasta</option>
                            <option value="Petani" @selected($nasabah->jenis_pekerjaan == 'Petani')>Petani</option>
                            <option value="Pengangguran" @selected($nasabah->jenis_pekerjaan == 'Pengangguran')>Pengangguran</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="rentangPenghasilan">Rentang Penghasilan per Tahun</label>
                        <select class="custom-select" id="rentangPenghasilan" name="rentang_penghasilan" disabled>
                            <option value="< Rp100.000.000" @selected($nasabah->rentang_penghasilan == '< Rp100.000.000')> < Rp100.000.000 </option>
                            <option value="> Rp100.000.000" @selected($nasabah->rentang_penghasilan == '> Rp100.000.000')> > Rp100.000.000 </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="pendidikanTerakhir">Pendidikan Terakhir</label>
                        <select class="custom-select" id="pendidikanTerakhir" name="pendidikan_terakhir" disabled>
                            <option value="SMP" @selected($nasabah->pendidikan_terakhir == 'SMP')>SMP</option>
                            <option value="SMA/SMK" @selected($nasabah->pendidikan_terakhir == 'SMA/SMK')>SMA/SMK</option>
                            <option value="D3"  @selected($nasabah->pendidikan_terakhir == 'D3')>D3</option>
                            <option value="S1"  @selected($nasabah->pendidikan_terakhir == 'S1')>S1</option>
                            <option value="S2"  @selected($nasabah->pendidikan_terakhir == 'S2')>S2</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="fileKtpKk">File KTP/KK</label>
                        <img src="{{ asset($nasabah->file_ktp_location) }}" width="400">
                    </div>
                </div>
                <div class="col-sm-6 mb-6">
                    <a href="{{route('nasabah.edit', ['nasabah' => $nasabah])}}" class="btn btn-secondary btn-user btn-sm">Ubah</a>
                </div>
                <br>
                <div class="form-group row">
                    <label for="pinjamanUser">Daftar Pinjaman</label>
                    <table class="table table-bordered" id="pinjamanUser" name="pinjamanUser" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Usaha</th>
                            <th>Total Pinjaman</th>
                            <th>Tenor</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peminjaman as $peminjamanEach)
                        <tr>
                            <td>{{$peminjamanEach->nama_usaha}}</td>
                            <td>Rp {{ number_format($peminjamanEach->total_pinjaman, 2, ",", ".") }}</td>
                            <td>{{$peminjamanEach->tenor}} Bulan</td>
                            <td>
                                @if ($peminjamanEach->status == 'DISETUJUI')
                                    <button class="btn btn-success" disabled>
                                        {{ $peminjamanEach->status }}
                                    </button>
                                @elseif ($peminjamanEach->status == 'DIPROSES')
                                    <button class="btn btn-primary" disabled>
                                        {{ $peminjamanEach->status }}
                                    </button>
                                    @else
                                    <button class="btn btn-secondary" disabled>
                                        {{ $peminjamanEach->status }}
                                    </button>
                                @endif
                            </td>
                            <td> <div class="row justify-content-center">
                                    <a href="{{route('peminjaman.detail', ['nasabah' => $nasabah, 'peminjaman' =>  $peminjamanEach])}}" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    &nbsp
                                    <a href="{{route('peminjaman.generate-pdf', ['nasabah' => $nasabah, 'peminjaman' =>  $peminjamanEach])}}" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                    &nbsp
                                    <a href="{{route('peminjaman.approve', ['nasabah' => $nasabah, 'peminjaman' =>  $peminjamanEach])}}" class="btn btn-secondary btn-circle btn-sm">
                                    <i class="fas fa-check-circle"></i>
                                    </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-sm-6 mb-3">
                    <a href="{{route('peminjaman.create', ['nasabah' => $nasabah])}}" class="btn btn-primary btn-user btn-sm">Ajukan Peminjaman</a>
                </div>
                </div>
                
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
