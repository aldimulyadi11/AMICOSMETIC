@extends('blank.blank')

@section('tabel')
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Keterangan</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/registerBio') }}" method="post">
            {{ csrf_field() }}
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label" >No Telepon</label>
                <div class="col-sm-9">
                  <input type="telp" class="form-control" id="exampleInputEmail2" name="no_telp" placeholder="Enter Phone Number">
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="Enter email">
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="exampleInputPassword2" name="alamat" placeholder="Addres">
                </div>
              </div>
              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
        </div>
      </div>
    </div>

@endsection