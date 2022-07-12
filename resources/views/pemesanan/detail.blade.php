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
               @foreach($idPemesanan as $data)
                <a href="/pemesanan/create/{{$data->id}}"  class="btn btn-info" ata-toggle="modal" data-target="#modal-defaults"><i class="fa fa-plus"></i>
              Tambah Produk</a>
              @endforeach
              <a href="/pemesanan"  class="btn btn-warning"> Kembali</a>
              </div>
                

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Produk</h4>
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
                      
                    </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
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
                    <table class="table table-bordered">
                      <thead>
                      <th>Kode Pemesanan</th>
                      <th>Nama Supplier</th>
                      <th>Tanggal</th>
                      
                  @foreach($pemesanan as $data)
                <tr>
                  <td>{{$data->kode_pemesanan}}</td>
                  <td>{{$data->nama_supplier}}</td>
                  <td>{{$data->tanggal}}</td>
                  
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
@endsection