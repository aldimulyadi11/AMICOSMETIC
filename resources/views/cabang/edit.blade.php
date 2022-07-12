@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
            
                    <!-- .box-body -->
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                     
                      <h4 class="modal-title">Edit Cabang</h4>
                    </div>
                    <div class="modal-body">
                      @foreach($cabang as $data)
                      <form role="form" action="/cabang/update" method="post">
                      {{ csrf_field() }}
                      
                      <div class="box-body">
                        <div class="form-group">                        

                        <div class="form-group">
                          <label>Kode Cabang</label>
                          <input type="text" value="{{ $data->kode_cabang }}" class="form-control" name="KodeCabang" readonly required >
                        </div>

                      <div class="box-body">
                        <div class="form-group">
                          <label>Nama Cabang</label>
                          <input type="text" value="{{ $data->nama_cabang }}" class="form-control" name="namaCabang" autofocus required>
                        </div>

                        <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" value="{{ $data->alamat }}" class="form-control" name="alamat" required>
                        </div>

                        <div class="form-group">
                          <label>Jenis</label>
                          <input type="text" value="{{ $data->jenis }}" class="form-control" name="jenis" required>
                        </div>
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <a href="/cabang" type="button" class="btn btn-warning" style="margin-top: -10px">Batal</a>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                      </form>
                      @endforeach
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
  </div>
@endsection