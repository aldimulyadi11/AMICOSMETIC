@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Pembelian</h4>
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
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-defaults"><i class="fa fa-plus"></i> Tambah Pembelian</button>
              </div>

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                      <h4 class="modal-title">Tambah Pembelian</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/pembelian/store" method="post">
                      {{ csrf_field() }}
                      
                      <div class="box-body">
                        <div class="form-group">
                          <label>Supplier</label>
                          <select class="form-control" name="kodeSupplier">
                          <option disabled selected value>-- Pilih Supplier --</option>
                          @foreach($supplier as $data)
                            <option value="{{ $data->kode_supplier }}">{{ $data->nama_supplier }}</option>
                          @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Tanggal</label>
                          <input type="date" id="total" class="form-control" name="tanggal" required>
                        </div>
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" >
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
                        <th style="text-align: center; ">Kode Pembelian</th>
                        <th style="text-align: center; ">Supplier</th>
                        <th style="text-align: center; ">Tanggal</th>
                        <th style="text-align: center; ">Detail</th>
                      </thead>
                      <tbody>
                    @foreach($pembelian as $data)
                      <tr>
                        
                        <td>{{$data->kode_pembelian}}</td>
                        <td>{{$data->nama_supplier}}
                        <td>{{$data->tanggal}}</td>
                        <td><a href="/pembelian/detail/{{ $data->id }}"><i class="fa fa-eye"></i> Lihat Detail</a></td>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
      window.onload = function(){
        document.getElementById('qty').addEventListener("keyup",qty,false);
      }

      function qty(){
        var harga=parseInt(document.getElementById('harga').value);
        var qty=parseInt(document.getElementById('qty').value);
        var total = harga * qty;

       document.getElementById("total").value=total; 
      }
    </script>
@endsection