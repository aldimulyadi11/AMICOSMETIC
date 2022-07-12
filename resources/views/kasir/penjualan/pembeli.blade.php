@extends('kasir.index')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Pembeli</h4>
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
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-defaults"><i class="fa fa-plus"></i> Tambah Produk</button>
                <a href="/kasir/struk" type="button" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a>
              </div>

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Produk</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/kasir/store" method="post">
                      {{ csrf_field() }}
                      
                      <div class="box-body">
                        @foreach($pembeli as $data)
                        <div class="form-group">
                        <input type="hidden" name="pembeli" value="{{$data->kode_pembeli}}" class="form-control"   readonly required>
                      </div>

                      <div class="form-group">
                        <input type="hidden" value="{{$data->cabang}}" name="cabang" class="form-control"   readonly required>
                      </div>
                      @endforeach
                        <div class="form-group">
                        <label>Produk</label>
                        <input type="text" id="kode_produk" name="kode_produk" class="form-control" required autofocus>
                      </div>

                      <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" id="nama_produk" name="nama_produk" class="form-control"   readonly required>
                      </div>

                      <div class="form-group">
                        <label>Harga</label>
                        <input type="text" id="harga_jual" name="harga" class="form-control"   readonly required>
                      </div>

                      <div class="form-group">
                        <label>Qty</label>
                        <input type="text" id="qty" class="form-control" name="qty" required>
                      </div>

                      <div class="form-group">
                        <label>Diskon</label>
                        <input type="text" id="diskon" class="form-control" name="diskon" required >
                      </div>

                      <div class="form-group">
                        <label>Total</label>
                        <input type="text" id="total" class="form-control" name="total" readonly required>
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
                  <table class="table table-striped table-bordered">
                      <thead>
                        <th style="text-align: center">Kode Pembeli</th>
                        <th style="text-align: center">Nama Pembeli</th>
                        <th style="text-align: center">Cabang</th>
                      </thead>
                      <tbody>
                     @foreach($pembeli as $data)
                      <tr>
                        <td>{{ $data->kode_pembeli }}</td>
                        <td>{{ $data->nama_pembeli }}</td>
                        <td>{{ $data->nama_cabang }}</td>        
                      </tr>
                      @endforeach

                    </tbody>
                    </table>
                    <hr>
                    <h4 class="card-title">Data Pembelian</h4>
                    <table class="table table-striped table-bordered">
                    <thead>
                        @php $no = 1; @endphp
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Kode Produk</th>
                        <th style="text-align: center">Nama Produk</th>
                        <th style="text-align: center">Harga</th>
                        <th style="text-align: center">Qty</th>
                        <th style="text-align: center">Diskon %</th>
                        <th style="text-align: center">Sub Total</th>
                      </thead>
                      <tbody>
                     @foreach($penjualan as $data)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->kode_produk }}</td>
                        <td>{{ $data->nama_produk }}</td>
                        <td>{{ $data->harga }}</td>        
                        <td>{{ $data->qty }}</td>        
                        <td>{{ $data->diskon }}</td>
                        <td>{{ $data->total }}</td>        
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                  <a href="{{route('kasir.penjualan')}}" type="button" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Kembali  </a>
                </div>
      </div>
    </div>
  </div>


@endsection



