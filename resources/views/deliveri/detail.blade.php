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

                <a href="/deliveri" class="btn btn-warning"> Kembali</a>
              </div>

              <div class="modal fade" id="modal-defaults">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Produk</h4>
                    </div>
                    <!-- .box-body -->
                    <div class="modal-body">
                      <form role="form" action="/deliveri/tambahProduk" method="post">
                      {{ csrf_field() }}
                        <div class="form-group">
                          @foreach($deliveri as $data)
                          <input type="text" name="id_deliveri" value="{{ $data->id_deliveri }}" class="form-control" required>

                          <input type="text" name="cabang" value="{{ $data->cabang }}" class="form-control" required>
                          @endforeach
                        </div>

                        <div class="form-group">
                          <label>Kode Produk</label>
                          <input type="text" name="kodeProduk" class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label>Jumlah Produk</label>
                          <input type="number" name="jumlahProduk" class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label>Tanggal</label>
                          <input type="date" name="tanggal" class="form-control" required>
                        </div>


                      </div>
                    <!-- /.box-body -->
                    
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
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
                
                  <hr>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <th>Kode Produk</th>
                      <th>Nama Produk</th>
                      <th>Jumlah</th>
                      <th>Tanggal</th>
                      
                @foreach($deliveri_detail as $data)
                <tr>
                  <td>{{$data->kode_produk}}</td>
                  <td>{{$data->nama_produk}}</td>
                  <td>{{$data->jumlah_produk}}</td>
                  <td>{{$data->tanggal}}</td>
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



