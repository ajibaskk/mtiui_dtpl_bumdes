@extends('layout.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tenor Nasabah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Waktu Angsuran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bungas as $bungaEach)
                        <tr>
                            <td>Angsuran {{$bungaEach->waktu_angsuran}} Bulan</td>
                            <td>
                                <div class="row justify-content-center">
                                    <a data-bs-toggle="modal" id="editModalButton_{{$bungaEach->master_bunga_id}}" data-id="{{$bungaEach->master_bunga_id}}" data-passBunga="{{$bungaEach->bunga}}" data-passWaktuAngsuran="{{$bungaEach->waktu_angsuran}}" data-bs-target="#editModal" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="post" action="{{route('master.tenor.destroy', ['masterBunga' => $bungaEach])}}" style="display: inline; margin-left: 5px; margin-right: 5px;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col text-center">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-pen"></i> Add Option
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Tambah opsi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{route('master.tenor.store')}}">
          @csrf
          @method('post')
          <div class="modal-body">
            <label class="sr-only" for="inlineFormInputGroupUsername2">Tenor</label>
              <div class="input-group mb-2 mr-sm-2">
                <input name="bunga" type="hidden" value = "0" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Dalam Desimal (0.35)">
              </div>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Jangka Waktu Pinjaman</div>
                </div>
                <input name="waktu_angsuran" type="float" class="form-control" id="inlineFormInputGroupUsername3" placeholder="Jumlah Bulan">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit opsi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('master.tenor.update')}}">
          @csrf
          @method('put')
          <div class="modal-body">
            <label class="sr-only" for="inlineFormInputGroupUsername2">Bunga</label>
            <div class="input-group mb-2 mr-sm-2">
                <input type="hidden" id="editBungaInputId" name="bungaId">
                <input name="bunga" id="editBungaInput" type="hidden" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Dalam Desimal (0.35)">
              </div>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text" id="modalInputBody">Jangka Waktu Angsuran</div>
                </div>
                <input name="waktu_angsuran" id="editWaktuAngsuranInput" type="float" class="form-control" id="inlineFormInputGroupUsername3" placeholder="Jumlah Bulan">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
      </div>
  </div>
</div>

<script type="text/javascript">
    $("a[id^=editModalButton_]").on("click", function (e) {
        var bungaId = e.currentTarget.getAttribute('data-id');
        var bunga = e.currentTarget.getAttribute('data-passBunga');
        var waktuAngsuran = e.currentTarget.getAttribute('data-passWaktuAngsuran');

        $('#editBungaInputId').val(bungaId);
        $('#editBungaInput').val(bunga);
        $('#editWaktuAngsuranInput').val(waktuAngsuran);
    });
</script>
@endsection
