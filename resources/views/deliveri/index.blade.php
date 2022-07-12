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
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-defaults"><i class="fa fa-plus"></i> Deliveri</button>
              </div>

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Deliveri</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/deliveri/store" method="post">
                      {{ csrf_field() }}

                        <div class="form-group">
                          <label>Cabang</label>
                          <select id="kode_cabang" class="form-control" name="kode_cabang" >
                            <option disabled selected value>-- Pilih Cabang --</option>
                            @foreach($cabang as $data)
                            <option value="{{ $data->kode_cabang }}">{{$data->nama_cabang}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Tanggal</label>
                          <input type="date" name="tanggal" class="form-control" required>
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
                        <th style="text-align: center; ">Kode Deliveri</th>
                        <th style="text-align: center; ">Cabang</th>
                        <th style="text-align: center; ">Alamat</th>
                        <th style="text-align: center; ">Detail</th>
                      </thead>
                      <tbody>
                    <tr>
                      @foreach($deliveri as $data)
                      <td>{{ $data->kode_deliveri}}</td>
                      <td>{{ $data->nama_cabang}}</td>
                      <td>{{ $data->alamat}}</td>
                      <td><a href="/deliveri/detail/{{$data->id_deliveri}}">Detail</a></td>
                      @endforeach
                    </tr>

                    </tbody>
                  </table>
                </div>
      </div>
    </div>
  </div>
@endsection