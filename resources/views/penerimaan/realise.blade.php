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
                      
                      <form role="form" action="/penerimaan/update" method="post">
                      {{ csrf_field() }}
                      
                      <div class="box-body">                      
                        <div class="form-group">
                          @foreach($penerimaan as $data)
                          <input type="hidden" value="{{$data->id_penerimaan}}" class="form-control" name="idPenerimaan" required readonly>
                          
                        </div>

                        <div class="form-group">                         
                          <input type="hidden" value="{{$data->kode_pemesanan}}" class="form-control" name="idPemesanan" required readonly>
                        </div>

                        <div class="form-group">                         
                          <input type="hidden" value="{{$data->id}}" class="form-control" name="idProduk" required readonly>
                        </div>

                        <div class="form-group">
                          <label>Kode Produk</label>
                          <input type="text" value="{{$data->kode_produk}}" class="form-control" name="kodeProduk" required readonly>
                        </div>

                        <div class="form-group">
                          <label>Nama Produk</label>
                          <input type="text" value="{{$data->nama_produk}}" class="form-control" name="namaProduk" required readonly>
                        </div>

                        <div class="form-group">
                          <label>Quantity</label>
                          <input type="text" value="{{$data->qty}}"  class="form-control" name="qty" required >
                        </div>
                        @endforeach
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        @foreach($penerimaan as $data)
                        <a href="/penerimaan/detail/{{$data->kode_pemesanan}}" type="button" class="btn btn-warning">Batal</a>
                        @endforeach
                        
                        <button type="submit" class="btn btn-primary">Realise</button>
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
@endsection