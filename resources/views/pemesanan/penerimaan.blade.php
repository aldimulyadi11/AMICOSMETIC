@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <div style="margin-bottom:20px;">

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
                      <th style="text-align: center; ">Kode Pemesanan</th>
                      <th style="text-align: center; ">Kode Produk</th>
                      <th style="text-align: center; ">Nama Produk</th>
                      <th style="text-align: center; ">Harga</th>
                      <th style="text-align: center; ">Quantity</th>
                      <th style="text-align: center; ">Status</th>
                    </thead>
                <tbody>
                @foreach($penerimaan as $data)
            <tr>
                  <td>{{$data->kode_pemesanan}}</td>
                  <td>{{$data->kode_produk}}</td>
                  <td>{{$data->nama_produk}}</td>
                  <td>{{$data->harga}}</td>
                  <td>{{$data->qty}}</td>
                  <td>
                  @if ($data->qty != 0)
                    <button><a href="realise/{{ $data->kode_pemesanan }}" ><i class="fa fa-check-square-o" ></i> {{ $data->status }} </a></button>
                  @else
                    <button><i class="fa fa-check-square-o">{{ $data->status }}</i></button>
                  
                  @endif
                </td>
                  
                  
                </tr>
                @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection