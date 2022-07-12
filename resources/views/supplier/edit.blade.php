@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="box-body">

           
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
 
                      <h4 class="modal-title">Edit Supplier</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/supplier/update" method="post">
                      {{ csrf_field() }}
                      @foreach($supplier as $sup)
                      <div class="box-body">
                        <div class="form-group">
                        <label>Kode Supplier</label>
                        <input type="text" class="form-control" name="kodeSupplier" value="{{$sup->kode_supplier}}"required readonly>
                      </div>

                        <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" name="namaSupplier" value="{{$sup->nama_supplier}}" autofocus required>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="textarea" class="form-control" name="alamat" value="{{$sup->alamat}}" required>
                      </div>
                      <div class="form-group">
                        <label>No. Telp</label>
                        <input type="text" class="form-control" name="notelp" value="{{$sup->no_telp}}" required>
                      </div>
                      <div class="form-group">
                        <label>Kontak Person</label>
                        <input type="text" class="form-control" name="konperson" value="{{$sup->kontak_person}}" required>
                      </div>
                      @endforeach
                    </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <a href="/supplier" type="button" class="btn btn-warning">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
           </div>            
        </div>
      </div>
    </div>
  </div>
@endsection