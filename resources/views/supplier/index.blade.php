@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Supplier</h4>
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
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-defaults"><i class="fa fa-plus"></i> Tambah Supplier</button>
              </div>

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Supplier</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/supplier/store" method="post">
                      {{ csrf_field() }}
                      
                      <div class="box-body">
                        <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" name="namaSupplier" autofocus required>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="textarea" class="form-control" name="alamat" required>
                      </div>
                      <div class="form-group">
                        <label>No. Telp</label>
                        <input type="text" class="form-control" name="notelp" required>
                      </div>
                      <div class="form-group">
                        <label>Kontak Person</label>
                        <input type="text" class="form-control" name="konperson" required>
                      </div>
                      
                    </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" >
                        <span aria-hidden="true">Batal</button>
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
                        @php $no = 1; @endphp
                        <th style="text-align: center; ">No</th>
                        <th style="text-align: center; ">Nama Supplier</th>
                        <th style="text-align: center; ">Alamat</th>
                        <th style="text-align: center; ">No. Telp</th>
                        <th style="text-align: center; ">Kontak Person</th>
                        <th style="text-align: center; ">Aksi</th>
                      </thead>
                       <tbody>
                    @foreach($supplier as $data)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$data->nama_supplier}}</td>
                      <td>{{$data->alamat}}</td>
                      <td>{{$data->no_telp}}</td>
                      <td>{{$data->kontak_person}}</td>
                      <td>
                            <a href="/supplier/edit/{{ $data->kode_supplier }}" type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Edit </a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-defaul"><i class="fa fa-trash"></i> Hapus</button>
                        </td>      
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
                              <a href="supplier/hapus/{{$data->kode_supplier}}" class="btn btn-primary">Ya</a>
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