@extends('layout.layout')
@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Nasabah</h6>
        </div>
        <div class="col-sm-6 float-right">
            <div class="input-group rounded float-right">
                <form>
                    <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" value="{{ request('search') }}" />
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
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
                                <div class="row justify-content-center">
                                    <a href="{{route('nasabah.edit', ['nasabah' => $nasabahEach])}}" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- <form method="post" action="{{route('nasabah.destroy', ['nasabah' => $nasabahEach])}}" style="display: inline; margin-left: 5px; margin-right: 5px;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form> -->
                                    &ensp;
                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal" data-whatever="{{ $nasabahEach->nasabah_id }}">
                                            <i class="fas fa-trash"></i>
                                    </button>
                                    &ensp;
                                    <a href="{{route('nasabah.detail', ['nasabah' => $nasabahEach])}}" class="btn btn-secondary btn-circle btn-sm">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $nasabah->links() }}
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('nasabah.destroy')}}">
        @csrf
        @method("DELETE")
        <div class="modal-body">
            <p>Anda yakin akan menghapus data nasabah ini?</p>
            <p id="nasabahDelete"></p>
            <input type="hidden" id="nasabahID" name="nasabahID">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Hapus</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever') // Extract info from data-* attributes
    var modal = $(this)
    modal.find('.modal-body input').val(recipient)
})
</script>

@endsection