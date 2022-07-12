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
                     
                      <h4 class="modal-title">Edit Kategori</h4>
                    </div>
                    <div class="modal-body">
                      @foreach($kategori as $data)
                      <form role="form" action="/kategori/update" method="post">
                      {{ csrf_field() }}
                      
                      <div class="box-body">
                        <div class="form-group">
                          <label>Kode Kategori</label>
                          <input type="text" value="{{ $data->kode_kategori }}" class="form-control" name="kodeKategori" readonly required >
                        </div>

                      <div class="box-body">
                        <div class="form-group">
                          <label>Nama Kategori</label>
                          <input type="text" value="{{ $data->nama_kategori }}" class="form-control" name="namaKategori" autofocus required>
                        </div>

                        <div class="form-group">
                          <label>Keterangan</label>
                          <input type="text" value="{{ $data->keterangan }}" class="form-control" name="keterangan" required>
                        </div>
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <a href="/kategori" type="button" class="btn btn-warning">Batal</a>
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