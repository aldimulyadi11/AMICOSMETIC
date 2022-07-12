@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Penjualan</h4>
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
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-defaults"><i class="fa fa-plus"></i> Tambah Penjualan</button>
              </div>

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Pembeli</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/penjualan/pembeli" method="post">
                      {{ csrf_field() }}
                      
                      <div class="box-body">
                        <div class="form-group">
                          <label>Nama Pembeli</label>
                          <input type="text" class="form-control" name="namaPembeli" autofocus required>
                        </div>

                        <div class="form-group">
                          <label>Cabang</label>
                          <select id="cabang" class="form-control" name="cabang" >
                            <option disabled selected value>-- Pilih Cabang --</option>
                            @foreach($cabang as $data)
                            <option value="{{ $data->kode_cabang }}">{{$data->nama_cabang}}</option>
                            @endforeach
                          </select>
                        </div>

                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                        Batal</button>
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
                  <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <th style="text-align: center; ">Kode Pembeli</th>
                        <th style="text-align: center; ">Nama Pembeli</th>
                        <th style="text-align: center; ">Cabang</th>
                        <th style="text-align: center; ">Detail</th>
                      </thead>
                      <tbody>
                    @foreach($penjualan as $data)
                      <tr>
                        <td>{{$data->kode}}</td>
                        <td>{{$data->nama_pembeli}}</td>
                        <td>{{$data->nama_cabang}}</td>
                        <td><a href="/penjualan/detailPembeli/{{$data->kode_pembeli}}"><i class="fa fa-eye"></i>Detail</a></td>
                        
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
      </div>
    </div>
  </div>
@endsection