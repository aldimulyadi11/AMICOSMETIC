@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Stok</h4>
                   <div style="margin-bottom:20px;">
                      <a href="/stok" class="btn btn-primary">Stok Gudang</a>
                    </div>
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span></button>
                      
                    </div>
                    
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>

            </div>
                  <hr>
                  <div class="table-responsive">
                    <table id="datatable" class="table table-bordered">
                      <thead>
                      <th style="text-align: center; ">Cabang</th>
                      <th style="text-align: center; ">Kode Produk</th>
                      <th style="text-align: center; ">Nama Produk</th>
                      <th style="text-align: center; ">Kategori</th>
                      <th style="text-align: center; ">Stok</th>
                      </thead>
                      <tbody>                    
                         @foreach($detail as $data)
            <tr>
                  <td>{{$data->nama_cabang}}</td>
                  <td>{{$data->kode_produk}}</td>
                  <td>{{$data->nama_produk}}</td>
                  <td>{{$data->nama_kategori}}</td>
                  @if ($data->jumlah_stok <= $data->stok_min)
                    <td style="color: red;">{{$data->jumlah_stok}}</td>
                  @else
                    <td>{{$data->jumlah_stok}}</td>
                  @endif 
                </tr>
                @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection