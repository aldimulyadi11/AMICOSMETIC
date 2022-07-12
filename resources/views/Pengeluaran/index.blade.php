@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Pengeluaran</h4>
            <div class="box-body">
              @if(session()->get('success'))
              <div class="container">
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ session()->get('success') }}</strong>
                </div>
              </div>
              @endif
              <div style="margin-bottom:20px;">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-defaults"><i class="fa fa-plus"></i> Tambah Pengeluaran</button>
              </div>

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Pengeluaran</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/pengeluaran/store" method="post">
                      {{ csrf_field() }}
                      
                      <div class="box-body">
                        <div class="form-group">
                          <label>Deskripsi</label>
                          <input type="text" class="form-control" name="deskripsi" required>
                        </div>

                        <div class="form-group">
                          <label>Jumlah</label>
                          <input type="text" class="form-control" name="jumlah" required>
                        </div>

                        <div class="form-group">
                          <label>tanggal</label>
                          <input type="date" class="form-control" name="tanggal" required>
                        </div>
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
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
              <hr>
                <div class="table-responsive">
                  <table id="datatable" class="table table-bordered">
                    
                      <thead>
                        @php $no= 1; @endphp;
                        <th style="text-align: center; ">No</th>
                        <th style="text-align: center; ">Deskripsi</th>
                        <th style="text-align: center; ">Jumlah</th>
                        <th style="text-align: center; ">Tanggal</th>
                      </thead>
                      <tbody>
                    @foreach($pengeluaran as $data)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$data->deskripsi}}</td>
                      <td>{{$data->jumlah}}</td>
                      <td>{{$data->tanggal}}</td>
                    </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
      </div>
    </div>
  </div>
@endsection