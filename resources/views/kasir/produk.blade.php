@extends('kasir.index')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Produk</h4>
        </div>
              <hr>
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <th style="text-align: center; ">Kode Produk</th>
                        <th style="text-align: center; ">Nama Produk</th>
                        <th style="text-align: center; ">Kategori</th>
                        <th style="text-align: center; ">Ukuran</th>
                        <th style="text-align: center; ">Harga</th>
                      </thead>
                      <tbody>
                    @foreach($produk as $data)
                      <tr>
                        <td>{{$data->kode_produk}}</td>
                        <td>{{$data->nama_produk}}</td>
                        <td>{{$data->nama_kategori}}</td>
                        <td>{{$data->ukuran}}</td>
                        <td>{{$data->harga_jual}}</td>
                    @endforeach

                    </tbody>
                  </table>
                </div>
      </div>
    </div>
  </div>
@endsection