@extends('admin.dashboard')

@section('content')
<section class="content">
    <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"> Rincian Pemesanan </h4>
            <div class="box-body">
              <div style="margin-bottom:20px;">
                  <a href="/penerimaan"  class="btn btn-warning"> Kembali</a>
              </div>

              @if(session()->get('success'))
              <div class="container">
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ session()->get('success') }}</strong>
                </div>
              </div>
              @endif
            
              
           </div>            
        </div>            

                    <hr>
                    <table class="table table-bordered">
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
                  @if ($data->status == "Realise")
                    <button class="btn btn-info"><a href="/realise/{{ $data->id_penerimaan }}" ><i class="fa fa-check-square-o" ></i> {{ $data->status }} </a></button>
                  @else
                    <button class="btn btn-basic"><i class="fa fa-check-square-o">{{ $data->status }}</i></button>
                  
                  @endif

                  </td>
                  
                  
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