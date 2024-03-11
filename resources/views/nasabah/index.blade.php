@extends('layout.layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Nasabah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Pekerjaan</th>
                            <th>Tanggal Lahir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nasabah as $nasabahEach)
                        <tr>
                            <td>{{$nasabahEach->nik}}</td>
                            <td>{{$nasabahEach->nama_lengkap}}</td>
                            <td>{{$nasabahEach->alamat_lengkap}}</td>
                            <td>{{$nasabahEach->jenis_pekerjaan}}</td>
                            <td>{{$nasabahEach->tanggal_lahir}}</td>
                            <td>
                                <a href="{{route('nasabah.edit', ['nasabah' => $nasabahEach])}}" class="btn btn-success btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="#" class="btn btn-secondary btn-circle btn-sm">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
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
