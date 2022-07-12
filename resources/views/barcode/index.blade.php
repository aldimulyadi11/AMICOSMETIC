@extends('index.index')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
            
                    <!-- .box-body -->
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                     
                      <h4 class="modal-title">Tambah Supplier</h4>
                    </div>
                    <div class="modal-body">
                      
                      <form role="form" action="/produk/tambahSupplier" method="post">
                      {{ csrf_field() }}
                      
                      <div class="box-body">
                        @foreach($produk as $data)
                        <div class="form-group">
                          <label>id produk</label>
                          <input type="text" value="{{$data->id }}" class="form-control" name="idProduk" readonly required>
                        </div>

                        <div class="form-group">
                          <label>Kode Produk</label>
                          <input type="text" value="{{ $data->kode_produk }}" class="form-control" name="kodeProduk" readonly required >
                        </div>
                        @endforeach

                      <div class="box-body">
                        <div class="form-group">
                          <label>Nama Supplier</label>
                          <select class="form-control" name="kodeSupplier">
                            <option disabled value selected>-- Pilih Supplier --</option>
                          @foreach($supplier as $data)
                            <option value="{{ $data->kode_supplier }}">{{ $data->nama_supplier }}</option>
                          @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                          <label>tangal</label>
                          <input type="date" class="form-control" name="tanggal" required>
                        </div>
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        @foreach($produk as $data)
                        <a href="/produk/detail/{{ $data->id }}" type="button" class="btn btn-warning">Batal</a>
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
@endsection