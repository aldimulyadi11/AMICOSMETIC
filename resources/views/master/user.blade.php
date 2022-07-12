@extends('blank.blank')

@section('tabel')
	<div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data User</h4>
          <p class="card-description"></p>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              	@php $no=1; @endphp
              	@foreach($tamp as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->nama_depan }} {{ $data->nama_belakang }}</td>
                  <td>{{ $data->email }}</td>
                  <td>
                    <div class="col-md-offset">
                        <a class="btn btn-danger" href="{{'editUser/'.$data->id_user}}">Edit</a>
                        <a class="btn btn-primary" href="{{'hapusUser/'.$data->id_user}}">Hapus</a>                      

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