@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Cabang</h4>
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
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-defaults"><i class="fa fa-plus"></i> Tambah Cabang</button>
              </div>

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Cabang</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/cabang/store" method="post">
                      {{ csrf_field() }}
                      <div class="box-body">

                        <div class="form-group">
                          <label>Nama Cabang</label>
                          <input type="text" class="form-control" name="namaCabang" autofocus required>
                        </div>

                        <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" class="form-control" name="alamat" autofocus required>
                        </div>
                
                        <div class="form-group">
                          <label>Jenis</label>
                          <input type="text" class="form-control" name="jenis" required>
                        </div>
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">Batal</button>
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
                        @php $no = 1; @endphp;
                        <th style="text-align: center; ">No</th>
                        <th style="text-align: center; ">Nama Cabang</th>
                        <th style="text-align: center; ">Alamat</th>
                        <th style="text-align: center; ">Jenis</th>
                        <th style="text-align: center; ">Action</th>
                      </thead>
                      
                    <tbody>
                      @foreach($cabang as $data)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nama_cabang}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->jenis}}</td>
                        <td>
                          <a href="cabang/edit/{{ $data->kode_cabang }}" type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Edit </a>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-defaul"><i class="fa fa-trash"></i> Hapus</button>
                          
                      </tr>
                      <div class="modal fade" id="modal-defaul">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Hapus</h4>
                            </div>
                            <div class="modal-body">
                              <h4>Apakah Anda Yakin Mengapus Data ini ?</h4>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                              <a href="cabang/hapus/{{ $data->kode_cabang }}" type="button" class="btn btn-primary"> Ya </a></td>
                            </div>
                          </div>                        
                        </div> 
                      </div>
                      @endforeach
                    </tbody>
                  </table>
                </div>
      </div>
    </div>
  </div>
@endsection