@extends('kasir.index')

@section('content')
<section class="content">
  <div class="row">            
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Kategori</h4>           
        </div>

          <hr>
                <div class="table-responsive">
                  <table id="datatable" class="table  table-bordered">
                      <thead>
                        @php $no = 1; @endphp
                        <th style="text-align: center; ">NO</th>
                        <th style="text-align: center; ">Nama Kategori</th>
                        <th style="text-align: center; ">Keterangan</th>
                      </thead>
                      
                    <tbody>
                      
                      <tr>
                        @foreach($kategori as $data)
                        <td>{{$no++}}</td>
                        <td>{{ $data->nama_kategori }}</td>
                        <td>{{ $data->keterangan }}</td>         
                      </tr>
                      <!--  -->
                      <div class="modal fade" id="modal-defaul">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Hapus</h4>
                            </div>
                            <div class="modal-body">
                              <h4>Apakah Anda Yakin Mengapus Data ini ?</h4>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                              <a href="kategori/hapus/{{$data->kode_kategori}}" class="btn btn-primary">Ya</a>
                            </div>
                          </div>                        
                        </div> 
                      </div>
                      @endforeach
                    </tbody>
                  </table>
                
                  
                 
      </div>
    </div>
  </div>

  
@endsection