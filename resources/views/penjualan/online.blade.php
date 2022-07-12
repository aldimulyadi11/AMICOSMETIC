@extends('index.index')

@section('content')
<section class="content">
  <div class="row">            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <div style="margin-bottom:20px;">

                    <div class="modal-body">
                      <form role="form" action="/penjualan/store" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                      <div class="form-group">
                        <label>Nama Produk</label>
                          <select id="kode_produk" class="form-control" name="kode_produk" >
                            <option disabled selected value>-- Pilih Produk --</option>
                            @foreach($produk as $data)
                            <option value="{{ $data->kode_produk }}">{{$data->nama_produk}}</option>
                            @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                        <label>Harga</label>
                        <input type="text" id="harga" name="harga" class="form-control"   readonly required>
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
                    
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <div class="modal-footer">
                      <!-- <button type="reset" class="btn btn-danger pull-left">Batal</button> -->
                      <a href="/penjualan/online" type="submit" class="btn btn-warning">Batal</a>

                     
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-defaults"> Ok</button>
                    </div>

                    <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Data Penerima</h4>
                    </div>
                    <!-- .box-body -->
                    
                      {{ csrf_field() }}
                      <div class="box-body">
                        <div class="form-group">
                          <label>Penerima</label>
                          <input type="text" class="form-control" name="penerima" autofocus required>
                        </div>

                        <div class="form-group">
                          <label>No.Hp</label>
                          <input type="text" class="form-control" name="noHp" required>
                        </div>

                        <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" class="form-control" name="alamat" required>
                        </div>
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-stack-overflow"></i> Proses</button>
                      </div>
                    </div>
              </div>
                    </div>
                    </form>
                  </div>

                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>

            </div>
                  <hr>
                 
                </div>
              </div>
            </div>
    <script type="text/javascript">
      window.onload = function(){
        document.getElementById('qty').addEventListener("keyup",qty,false);
        document.getElementById('diskon').addEventListener("keyup",diskon,false);
      }

      function qty(){
        var harga=parseInt(document.getElementById('harga').value);
        var qty=parseInt(document.getElementById('qty').value);
        var total = harga * qty;

       document.getElementById("total").value=total; 
      }

      function diskon(){
        var harga=parseInt(document.getElementById('harga').value);
        var qty=parseInt(document.getElementById('qty').value);
        var dis=parseInt(document.getElementById('diskon').value);
        var diskon = (harga * dis) / 100;
        var total = (harga - diskon) * qty;

       document.getElementById("total").value=total; 
      }
    </script>


@endsection