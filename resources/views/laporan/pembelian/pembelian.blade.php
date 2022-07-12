@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Laporan Pembelian</h4>
            <div class="box-body">
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/laporanPembelian/filter" method="get">
                      {{ csrf_field() }}
                      <div class="form-group" >
                        <div class="input-group">
                          <label>Start</label>
                          <input type="date" class="form-control" name="start" value="{{old('start')}}" autofocus required>
                        </div>
                      </div>

                      <div class="form-group" >
                        <div class="input-group">
                          <label>End</label>
                          <input type="date" class="form-control" name="end" value="{{old('end')}}" required>
                        </div>
                      </div>

                      
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="/laporanPembelian/cetak_pdf" target="_blank" class="btn btn-info" d><i class="fa fa-print"></i> Cetak</a>
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


<section class="content">
  <div class="row">            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Laporan Penjualan</h4>
                  

                  <hr>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                      <th style="text-align: center">Nama Produk</th>
                      <th style="text-align: center">Nama Supplier</th>
                      <th style="text-align: center">Harga</th>
                      <th style="text-align: center">Quantity</th>
                      <th style="text-align: center">Subtotal</th>
                      <th style="text-align: center">Tanggal</th>
                    </thead>
                    <tbody>
                      
                @foreach($pembelian as $data)
            <tr>
                  <td>{{$data->nama_produk}}</td>
                  <td>{{$data->nama_supplier}}</td>
                  <td>Rp. {{number_format($data->harga,0, ".", ".")}}</td>
                  <td>{{$data->qty}}</td>
                  <td>Rp. {{number_format($data->total,0, ".", ".")}}</td>
                  <td>{{$data->tanggal}}</td>
                </tr>
                @endforeach
                      </tbody>
                      <tfoot>
      <td style="text-align: center;" colspan="4"><strong>Total Pembelian</strong></td>
      <td style="text-align: center;" colspan="2"><strong>Rp. {{number_format($total,0, ".", ".")}}</strong></td>
    </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection


