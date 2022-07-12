@extends('admin.dashboard')

@section('content')
<section class="content">
    <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Bordered table</h4>
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
                <a href="/penjualan/offline/struk" type="button" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a>
              </div>

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Produk</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/pembelian/tambahProduk" method="post">
                      {{ csrf_field() }}
                      
                      <div class="box-body">
                        <div class="form-group">
                          @foreach($pembelian as $data)
                          <input type="hidden" value="{{$data->id}}" class="form-control" name="kodePembelian" required readonly>
                        </div>


                        <div class="form-group">
                          <input type="hidden" value="{{$data->kode_supplier}}" class="form-control" name="kodeSupplier" required readonly>
                          @endforeach
                        </div>

                        <div class="form-group">
                          <label>Produk</label>
                          <input type="text" id="kode_produks" name="kode_produks"  class="form-control" autofocus required>
                        
                        </div>


                        <div class="form-group">
                          <label>Harga</label>
                          <input type="text" id="harga_produk" class="form-control" name="harga" required>
                        </div>

                        <div class="form-group">
                          <label>Quantity</label>
                          <input type="text" id="quantity" class="form-control" name="qty" required>
                        </div>

                        <div class="form-group">
                          <label>Total</label>
                          <input type="text" id="totalproduk" class="form-control" name="total" required readonly>
                        </div>

                        <div class="form-group">
                          <label>Tanggal</label>
                          <input type="date"  class="form-control" name="tanggal" required >
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
                

              
                <!-- /.modal-dialog -->
              </div>
           </div>            
        </div>
                  <hr>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <th>Kode Pembelian</th>
                      <th>Nama Supplier</th>
                      
                         @foreach($pembelian as $data)
            <tr>
                  <td>{{$data->kode_pembelian}}</td>
                  <td>{{$data->nama_supplier}}</td>
                  
                </tr>
                @endforeach
                      </tbody>
                    </table>
            

                    <hr>
                    <h4>Rincian Produk</h4>
                    <table class="table table-bordered">
                     <thead>
                      <th>Kode Produk</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Total</th>
                      @foreach($rincian as $data)
            <tr>
                  <td>{{$data->kode_produk}}</td>
                  <td>{{$data->nama_produk}}</td>
                  <td>{{$data->harga}}</td>
                  <td>{{$data->qty}}</td>
                  <td>{{$data->total}}</td>
                  
                </tr>
                @endforeach
                       
                      </tbody>
                    </table>
                      
                    <div class="modal-footer">
                      
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>

  <script >
      window.onload = function(){
        document.getElementById('quantity').addEventListener("keyup",quantity,false);
      }

      function qty(){
        var harga=parseInt(document.getElementById('harga_produk').value);
        var qty=parseInt(document.getElementById('quantity').value);
        var total = harga * qty;

       document.getElementById("totalproduk").value=total; 
      }
    </script>
@endsection



