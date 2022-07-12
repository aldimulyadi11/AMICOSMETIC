@extends('index.index')

@section('content')

  <div class="row tile_count">
    
    <div align="center" class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-hand-o-right pull-left"></i >Categories</span>
      <div class="count"></div> 
      
    </div>
    <div align="center" class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-hand-o-right pull-left"></i>Products</span>
      <div class="count"></div>
      
    </div>
    <div align="center" class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-hand-o-right pull-left"></i>Completed Orders</span>
      <div class="count"></div>
    </div>

    <div align="center" class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-hand-o-right pull-left"></i >Completed Shipping</span>
      <div class="count"></div> 
      
    </div>
    <div align="center" class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-hand-o-right pull-left"></i>Pending Orders</span>
      <div class="count"></div>
      
    </div>
    <div align="center" class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-hand-o-right pull-left"></i>Pending Shipping ( Orders Completed )</span>
      <div class="count"></div>
    </div>


</div>
@endsection