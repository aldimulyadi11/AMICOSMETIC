@extends('admin.dashboard')

@section('content')
<section class="content">
    <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Bordered table</h4>
            <div class="box-body">
              <div style="margin-bottom:20px;">
               @foreach($idProduk as $data)
                <a href="/produk/create/{{$data->id}}"  class="btn btn-info" ata-toggle="modal" data-target="#modal-defaults"><i class="fa fa-plus"></i>
              Tambah Supplier</a>
              @endforeach
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
                      <th style="text-align: center; ">Gambar</th>
                      <th style="text-align: center; ">Kode Produk</th>
                      <th style="text-align: center; ">Nama Produk</th>
                      <th style="text-align: center; ">Kategori</th>
                      <th style="text-align: center; ">Ukuran</th>
                      <th style="text-align: center; ">Harga Jual</th>
                      <th style="text-align: center; ">Stok Minimal</th>
                      
                         @foreach($produk as $data)
            <tr>
                  <td><img src="{{url("produk_foto")}}/{{($data->foto) }}" width="110" height="90"></td>
                  <td>{{$data->kode_produk}}</td>
                  <td>{{$data->nama_produk}}</td>
                  <td>{{$data->nama_kategori}}</td>
                  <td>{{$data->ukuran}}</td>
                  <td>{{$data->harga_jual}}</td>
                  <td>{{$data->stok_min}}</td>
                  
                </tr>
                @endforeach
                      </tbody>
                    </table>

                      <form role="form" action="{{route('produk.tamp')}}" method="post">
                      {{ csrf_field() }}

                      <div class="box-body">
                        @foreach($produk as $data)
                        <input type="hidden" value="{{$data->kode_produk}}" name="kode_produk" autofocus required>
                        @endforeach
                      </div>
                      
                      <div class="box-body">
                        <div style="margin-top: 30px; margin-left: 75%; margin-right: 18%;">
                        <input type="number" class="form-control" name="number" autofocus required>
                      </div>

                      <div class="box-body">

                        <div style="margin-top:-34px; margin-left: 83% ">
                        <select name="ukuran" style="height: 33px">
                          <option value="kecil">Kecil</option>
                          <option value="sedang">Sedang</option>
                          <option value="besar">Besar</option>
                        </select>
                      </div>
                      </div>

                      <div style="margin-bottom:20px; margin-left: 90%;margin-top: -33px">
                      <button type="submit" formtarget="_blank" class="btn btn-success" ><i class="fa fa-barcode"></i> Barcode</button>
                    </div>
                    </form>

                    <div style="margin-bottom:20px;margin-top: -60px">
                    <a href="/produk" class="btn btn-warning" > Kembali</a>
                  </div>

                    
                    
                    <hr>
                    <h4>Supplier Produk</h4>
                    <table class="table table-bordered">
                      <thead>
                      <th style="text-align: center; ">Nama Supplier</th>
                      <th style="text-align: center; ">Nama Alamat</th>
                      <th style="text-align: center; ">No Hp</th>
                      <th style="text-align: center; ">Kontak Person</th>
                      <th style="text-align: center; ">Aksi</th>
                      
                         @foreach($detail as $data)
            <tr>
                  <td>{{$data->nama_supplier}}</td>
                  <td>{{$data->alamat}}</td>
                  <td>{{$data->no_telp}}</td>
                  <td>{{$data->kontak_person}}</td>
                  <td><a href="/produk/hapusSupplier/{{$data->id}}" class="btn btn-danger"><i class="fa fa-trash" ></i> Hapus</td>
                  
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