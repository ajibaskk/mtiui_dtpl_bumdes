@extends('layout.layout')
@section('content')
<!-- Bootstrap core CSS -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pinjaman Nasabah</h6>
        </div>
        <div class="col-sm-6 float-right">
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pinjaman as $pinjamanEach)
                        <tr>
                            <td>{{$pinjamanEach->id}}</td>
                            <td>Rp {{ number_format($pinjamanEach->nominal, 2, ",", ".") }}</td>
                            <td>
                                <div class="row justify-content-center">
                                    <a data-bs-toggle="modal" id="editModalButton_{{$pinjamanEach->id}}" data-id="{{$pinjamanEach->id}}" data-passNominal="{{$pinjamanEach->nominal}}" data-bs-target="#editModal" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="post" action="{{route('pinjaman.destroy', ['pinjaman' => $pinjamanEach])}}">
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
                        <tr>
                            <!-- <td></td> -->
                            <td class= "text-center" colspan="3">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createModal">
                                    <i class="fas fa-pen"></i> Tambah
                                </button>
                            </td>
                            <!-- <td></td> -->
                        </tr>
                    </tbody>
                </table>
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
      <form method="post" action="{{route('pinjaman.store')}}">
          @csrf
          @method('post')
          <div class="modal-body">
            <label class="sr-only" for="inlineFormInputGroupUsername2">Nominal</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Nominal</div>
                </div>
                <input name="nominal" type="number" class="form-control" id="inlineFormInputGroupUsername2" placeholder="dalam Rupiah">
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
      <form method="post" action="{{route('pinjaman.update')}}">
          @csrf
          @method('put')
          <div class="modal-body">
            <label class="sr-only" for="inlineFormInputGroupUsername2">Nominal</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text" id="modalInputBody">Nominal</div>
                </div>
                <input type="hidden" id="editNominalInputID" name="pinjamanID">
                <input name="nominal" id="editNominalInput" type="number" class="form-control" id="inlineFormInputGroupUsername2" placeholder="dalam Rupiah">
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
            var nominal = e.currentTarget.getAttribute('data-passNominal');
            var pinjamanID = e.currentTarget.getAttribute('data-id');
            
            $('#editNominalInputID').val(pinjamanID);
            $('#editNominalInput').val(nominal);
        }); 
    </script> 
@endsection