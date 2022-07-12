@extends('kasir.index')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
            
                    <!-- .box-body -->
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                     
                      <h4 class="modal-title">Edit Kasir</h4>
                    </div>
                    <div class="modal-body">
                      @foreach($edit as $data)
                      <form role="form" action="/updateKasir" method="post">
                      {{ csrf_field() }}
                      
                      <div class="box-body">
                        <div class="form-group">                        

                        <div class="form-group">
                          <label>Id Kasir</label>
                          <input type="text" value="{{ $data->id}}" class="form-control" name="kodeKasir" readonly required >
                        </div>

                      <div class="box-body">
                        <div class="form-group">
                          <label>Nama Kasir</label>
                          <input type="text" value="{{ $data->nama }}" class="form-control" name="namaKasir" autofocus required>
                        </div>

                        <div class="form-group">
                          <label>Password Baru</label>
                          <input type="password"  class="form-control" name="passBaru" required>
                        </div>

                        <div class="form-group">
                          <label>Cabang</label>
                          <input type="text" value="{{ $data->nama_cabang }}" class="form-control" name="jenis" required readonly>
                        </div>
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <a href="{{route('kasir.dashboard')}}" type="button" class="btn btn-warning" style="margin-top: -10px">Batal</a>

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