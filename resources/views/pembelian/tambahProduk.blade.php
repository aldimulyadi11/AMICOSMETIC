@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
            
                    <!-- .box-body -->
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                     
                      <h4 class="modal-title">Tambah Produk</h4>
                    </div>
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
                          <input type="text" id="harga" class="form-control" name="harga" required>
                        </div>

                        <div class="form-group">
                          <label>Quantity</label>
                          <input type="text" id="qty" class="form-control" name="qty" required>
                        </div>

                        <div class="form-group">
                          <label>Total</label>
                          <input type="text" id="total" class="form-control" name="total" required readonly>
                        </div>

                        <div class="form-group">
                          <label>Tanggal</label>
                          <input type="date"  class="form-control" name="tanggal" required >
                        </div>
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        @foreach($pembelian as $data)
                        <a href="/pembelian/detail/{{$data->id}}" type="button" class="btn btn-warning">Batal</a>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
           </div>            
        </div>

          
                   
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