@extends('blank.blank')

@section('tabel')
	<div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Keterangan</h4>
          <p class="card-description"></p>
          <div class="table-responsive">
            <a class="btn btn-info" href="{{'tambahKet'}}">Tambah</a>                      
            <br><br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Telepon</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              	@php $no=1; @endphp
              	@foreach($tamp as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->no_telp }}</td>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->alamat }}</td>   
                  <td>
                    <div class="col-md-offset">
                        
                        <a class="btn btn-danger" href="{{'editBio/'.$data->id}}">Edit</a>
                        <a class="btn btn-primary" href="{{'hapusBio/'.$data->id}}">Hapus</a>                      

                      </div>
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