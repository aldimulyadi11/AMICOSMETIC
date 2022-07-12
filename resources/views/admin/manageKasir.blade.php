@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Kasir</h4>
            <div class="box-body">
              @if(session()->get('success'))
              <div class="container">
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ session()->get('success') }}</strong>
                </div>
              </div>
              @endif

              @if(session()->get('warning'))
              <div class="container">
                <div class="alert alert-warning alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ session()->get('warning') }}</strong>
                </div>
              </div>
              @endif
              @if(session()->get('danger'))
              <div class="container">
                <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ session()->get('danger') }}</strong>
                </div>
              </div>
              @endif
              <div style="margin-bottom:20px;">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-defaults"><i class="fa fa-plus"></i> Tambah Kasir</button>
              </div>

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Kasir</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="{{route('admin.login.kasir')}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="box-body">

                        <div class="form-group">
                          <label>Nama Kasir</label>
                          <input type="text" class="form-control" name="namaKasir" autofocus required>
                        </div>

                        
                        <div class="form-group">
                          <label>Cabang</label>
                          <select class="form-control" name="kodeCabang">
                            <option disabled value selected>-- Pilih Cabang --</option>
                          @foreach($cabang as $data)
                            <option value="{{ $data->kode_cabang }}">{{ $data->nama_cabang }}</option>
                          @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" name="username" autofocus required>
                        </div>
                
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                          <label>Konfirmasi Password</label>
                          <input type="password" class="form-control" name="confir" required>
                        </div>
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">Batal</button>
                        <button type="submit" class="btn btn-primary">Register</button>
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
                        @php $no = 1; @endphp;
                        <th style="text-align: center; ">No</th>
                        <th style="text-align: center; ">Nama Kasir</th>
                        <th style="text-align: center; ">Cabang</th>
                      </thead>
                      
                    <tbody>
                      @foreach($kasir as $data)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->nama_cabang}}</td>
                        
                          
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
      </div>
    </div>
  </div>
@endsection