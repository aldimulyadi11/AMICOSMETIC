
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ecommerce</title>

    <!-- icon -->
    <!-- <link rel="shortcut icon" href="/asset/production/images/poto.png"> -->
    <!-- Bootstrap -->
    <link href="/asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/asset/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/asset/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="/asset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/asset/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- bootstrap-wysiwyg -->
    <link href="/asset/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="/asset/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="/asset/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="/asset/vendors/starrr/dist/starrr.css" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="/asset/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="/asset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/asset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/asset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/asset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/asset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/asset/build/css/custom.min.css" rel="stylesheet">
    <link href="/asset/vendo/ajax/libs/sweetalert/sweetalert.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">

              <a href="/adminDashboard" class="site_title"><span>Ecommerce</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/asset/production/images/team.png" height="58" alt="..." class="img-circle profile_img">
                {{Session::get('photo')}}
              </div>
              <div class="profile_info">
                <span>Welcome Kasir</span>
                <h2>{{Session::get('nama')}}</h2>
                
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Amii Cosmetic</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ route('kasir.dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a href="{{ route('kasir.kategori')}}"><i class="fa fa-cubes"></i> Kategori </a></li>
                  <li><a href="{{ route('kasir.produk')}}"><i class="fa fa-th-list"></i> Data Produk </a></li>
                  <li><a href="{{ route('kasir.penjualan')}}"><i class="fa fa-long-arrow-up"></i> Penjualan </a></li>                  
              </div>              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
    

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

       
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="/asset/production/images/team.png" alt="">
                    {{$nama}}

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="/settingKasir/{{$kode_kasir}}"><i class="fa fa-cogs pull-right"></i>Ubah Password</a></li>
                    
                    <li><a data-toggle="modal" data-target="#modal-default"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>

              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Log Out</h4>
                    </div>
                    <div class="modal-body">
                      <h4>Apakah Anda Yakin Ingin Keluar?</h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <a href="{{route('kasir.logout')}}" class="btn btn-primary">Keluar</a>
                      
                    </div>
                  </div>                        
                </div>                      
              </div>
            </nav>

          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
          
        </div>
      </div>
    </div>
    <footer>
        <div class="pull-right">
          Skin Solution
        </div>
        <div class="clearfix"></div>
    </footer>
    

    <!-- jQuery -->
    <script src="/asset/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/asset/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/asset/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/asset/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="/asset/vendors/iCheck/icheck.min.js"></script>
    <!-- Chart.js -->
    <script src="/asset/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/asset/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/asset/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/asset/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/asset/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/asset/vendors/Flot/jquery.flot.js"></script>
    <script src="/asset/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/asset/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/asset/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/asset/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/asset/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/asset/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/asset/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/asset/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/asset/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/asset/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/asset/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/asset/vendors/moment/min/moment.min.js"></script>
    <script src="/asset/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- bootstrap-wysiwyg -->
    <script src="/asset/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="/asset/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="/asset/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="/asset/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="/asset/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="/asset/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="/asset/vendors/select2/dist/js/select2.min.js"></script>
    <!-- Parsley -->
    <script src="/asset/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="/asset/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="/asset/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="/asset/vendors/starrr/dist/starrr.js"></script>

    <!-- Datatables -->
    <script src="/asset/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/asset/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/asset/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/asset/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/asset/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/asset/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/asset/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/asset/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/asset/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/asset/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/asset/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/asset/vendors/datatables.net-scroller/js/dataTabless.scroller.min.js"></script>
    
    <script src="/asset/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/asset/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/asset/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- <script src="/asset/vendo/ajax/libs/sweetalert/sweetalert.min.js" ></script>
    @include('sweet::alert') -->

    <!-- Custom Theme Scripts -->
    <script src="/asset/build/js/custom.min.js"></script>
   <script>
    $('#kode_produk').on('change',function(e){
      var kode_produk= e.target.value;
      $.get('{{url('penjualanKasir')}}/add/ajax-state?kode_produk=' + kode_produk, function(data){
        document.getElementById("nama_produk").value=data[0].nama_produk; 
        document.getElementById("harga_jual").value=data[0].harga_jual; 
       
      });
    });
  </script>

  <script type="text/javascript">
      window.onload = function(){
        document.getElementById('qty').addEventListener("keyup",qty,false);
        document.getElementById('diskon').addEventListener("keyup",diskon,false);
      }

      function qty(){
        var harga=parseInt(document.getElementById('harga_jual').value);
        var qty=parseInt(document.getElementById('qty').value);
        var total = harga * qty;

       document.getElementById("total").value=total; 
      }

      function diskon(){
        var harga=parseInt(document.getElementById('harga_jual').value);
        var qty=parseInt(document.getElementById('qty').value);
        var dis=parseInt(document.getElementById('diskon').value);
        var diskon = (harga * dis) / 100;
        var total = (harga - diskon) * qty;

       document.getElementById("total").value=total; 
      }
    </script>


     
     @yield('footer')
  </body>
</html>
