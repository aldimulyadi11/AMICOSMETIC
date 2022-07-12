@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Produk</h4>
            <div class="box-body">
               @if(session()->get('success'))
              <div class="container">
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ session()->get('success') }}</strong>
                </div>
              </div>
              @endif
              @if(session()->get('danger'))
              <div class="container">
                <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ session()->get('danger') }}</strong>
                </div>
              </div>
              @endif
              <div style="margin-bottom:20px;">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-defaults"><i class="fa fa-plus"></i> Tambah Produk</button>
              </div>

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Produk</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/produk/store" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      
                      <div class="box-body">
                        <div class="form-group">
                          <label>Kode Produk</label>
                          <input type="text" class="form-control" name="kodeProduk" autofocus required>
                        </div>

                        <div class="form-group">
                          <label>Nama Produk</label>
                          <input type="text" class="form-control" name="namaProduk" required>
                        </div>

                        <div class="form-group">
                          <label>Kategori</label>
                          <select class="form-control" name="kodeKategori">
                          <option disabled selected value>-- Pilih Kategori --</option>
                          @foreach($kategori as $data)
                            <option value="{{ $data->kode_kategori }}">{{ $data->nama_kategori }}</option>
                          @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Ukuran</label>
                          <input type="text" class="form-control" name="ukuran" required>
                        </div>

                        <div class="form-group">
                          <label>Harga Jual</label>
                          <input type="text" class="form-control" name="harga" required>
                        </div>

                        <div class="form-group">
                          <label>Stok Minimal</label>
                          <input type="text" class="form-control" name="stok" required>
                        </div>

                        <div class="form-group">
                          <label>Foto</label>
                          <input type="file" class="form-control" name="file" required>
                        </div>

                        <div class="form-group">
                          <label>deskripsi</label>
                          <input type="text" class="form-control" name="deskripsi" required>
                        </div>
                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">Batal</button>
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
                        <th style="text-align: center; ">Gambar</th>
                        <th style="text-align: center; ">Kode Produk</th>
                        <th style="text-align: center; ">Nama Produk</th>
                        <th style="text-align: center; ">Tanggal</th>
                        <th style="text-align: center; ">Supplier</th>
                      </thead>
                      <tbody>
                    @foreach($produk as $data)
                      <tr>
                        <td><img src="{{url("produk_foto")}}/{{($data->foto) }}" width="110" height="90"></td>
                        <td>{{$data->kode_produk}}</td>
                        <td>{{$data->nama_produk}}</td>
                        <td>{{$data->tanggal}}</td>
                        <td><a href="/produk/detail/{{ $data->id }}"><i class="fa fa-eye"></i> Lihat Detail</a></td>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
      </div>
    </div>
  </div>
@endsection