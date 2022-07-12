@extends('index.index')

@section('content')
  <div class="pull" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Logo</h2>             
                    <a href="{{'addLogo'}}" class="btn btn-info pull-right"> Add logo</a>       
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    @if(\Session::has('alert'))
                      <div class="alert alert-danger">
                          <div>{{Session::get('alert')}}</div>
                      </div>
                  @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @foreach($tamp as $data)
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Existing Photo <span class="required"></span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <table>
                            <tr>
                                <td><img src="{{ ('img')}}/{{($data->logo) }}" width="300" height="150"></td>    
                            </tr>
                            <tr>
                              <td>
                                <div class="col-md-offset">
                                  <br><br>
                                    <a class="btn btn-success" href="{{'editLogo/'.$data->id}}">Update Logo</a>
                                </div>
                              </td>
                            </tr>
                          </table>
                          
                        </div>
                      </div>

                      
                    </form>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>


@endsection