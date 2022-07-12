@extends('admin.dashboard')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Pemesanan</h4>
            <div class="box-body">
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
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <th style="text-align: center; ">Kode Pemesanan</th>
                        <th style="text-align: center; ">Supplier</th>
                        <th style="text-align: center; ">Tanggal</th>
                        <th style="text-align: center; ">Action</th>
                      </thead>
                      <tbody>
                    @foreach($pemesanan as $data)
                      <tr>
                        
                        <td>{{$data->kode_pemesanan}}</td>
                        <td>{{$data->nama_supplier}}
                        <td>{{$data->tanggal}}</td>
                        <td><a href="/penerimaan/detail/{{ $data->id }}"><i class="fa fa-eye"></i> Lihat Detail</a></td>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
      </div>
    </div>
  </div>
@endsection