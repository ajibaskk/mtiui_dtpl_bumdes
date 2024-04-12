@extends('layout.layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Peminjaman</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('peminjaman.store', ['nasabah' => $nasabah])}}">
                @csrf
                @method('post')
                <div class="form-group row">
                <div class="col-sm-6">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" disabled
                            name="nik" placeholder="NIK" value="{{$nasabah->nik}}">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaLengkap" disabled
                        name="nama_lengkap" placeholder="John Doe" value="{{$nasabah->nama_lengkap}}">
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
                <div class="col-sm-6">
                        <label for="nama_usaha">Nama Usaha</label>
                        <input type="text" class="form-control" id="nama_usaha"
                            name="nama_usaha" placeholder="Nama Usaha" >
                </div>
                <div class="col-sm-6">
                        <label for="jenis_usaha">Jenis Usaha</label>
                        <input type="text" class="form-control" id="jenis_usaha"
                            name="jenis_usaha" placeholder="Jenis Usaha">
                </div>
                <div class="col-sm-6">
                        <label for="deskripsi_usaha">Deskripsi Usaha</label>
                        <input type="text" class="form-control" id="deskripsi_usaha"
                            name="deskripsi_usaha" placeholder="Deskripsi Usaha" >
                </div>
                <div class="col-sm-3">
                        <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                        <select class="custom-select" id="jumlah_pinjaman" name="jumlah_pinjaman">
                        @foreach($pinjaman as $pinjamanEach)
                            <option value="{{$pinjamanEach->nominal}}">{{$pinjamanEach->nominal}}</option>
                        @endforeach
                        </select>
                </div>
                <div class="col-sm-3">
                        <label for="tenor">Tenor Pinjaman</label>
                        <select class="custom-select" id="tenor" name="tenor">
                            <option value="3">3 Bulan</option>
                            <option value="6">6 Bulan</option>
                            <option value="9">9 Bulan</option>
                        </select>
                </div>
                <div class="col-sm-3">
                        <label for="bunga">Bunga Pinjaman</label>
                        <select class="custom-select" id="bunga" name="bunga">
                            <option value="3">3%</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                        </select>
                </div>
                <div class="col-sm-6">
                        <label for="totalPinjaman">Total Pinjaman</label>
                        <input type="text" class="form-control" id="totalPinjaman"
                            name="totalPinjaman" placeholder="Rp 0" disabled>
                </div>
                <div class="col-sm-6">
                        <label for="jumlahAngsuran">Jumlah Angsuran</label>
                        <input type="text" class="form-control" id="jumlahAngsuran"
                            name="jumlahAngsuran" placeholder="Rp 0" disabled>
                </div>
                <br>
                <div class="justify-content-end">
                <div>
                    <input class="btn btn-success btn-user btn-block" type="submit" value="Simpan">
                </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script type="text/javascript"> 
    $("#jumlah_pinjaman, #tenor, #bunga").on("change", function (e) { 
        var jumlahPinjaman = $('#jumlah_pinjaman').find(":selected").val();
        var tenor = $('#tenor').find(":selected").val();
        var bunga = $('#bunga').find(":selected").val();
        
        var totalPinjaman = Math.round(calcPinjaman(jumlahPinjaman, bunga))
        var jumlahAngsuran = Math.round(calculateAngsuran(totalPinjaman, tenor))
        
        $('#totalPinjaman').val("Rp " + totalPinjaman.toLocaleString("id-ID"));
        $('#jumlahAngsuran').val("Rp " + jumlahAngsuran.toLocaleString("id-ID"));
    }); 
    
    function calcPinjaman(a, b) {
        return Number(a)/100 * (100 + Number(b))
    }
    
    function calculateAngsuran(a, b) {
        return Number(a) / Number(b)
    }
</script> 
@endsection
