<html>
<head>
  <title>Cetak Barcode</title>
  <style>
    h1{
      font-size: 10px;
      margin-top: 0px
    }
    h2{
      font-size: 13px;
      margin-top: 0px;
    }
    h3{
      font-size: 14px;
    }
  </style>
</head>
<body>
  @php $no = 1; @endphp
  <table width="20%" cellpadding="3">  
    @if ($ukuran == 'kecil')
      @for ($i=1; $i<= $jumlah; $i++)
        @if($i == $no)
          <tr>
        @endif  
          <td align="center" style="border: lpx">
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($kode,'C93')}}" height="30" width="80">
          <h1>{{ $kode }}</h1>
         </td>
         
        @if ($i % 8 == 0 )
          @php $no = $no + 8; @endphp
          </tr>
        @endif    
      @endfor

    @elseif ($ukuran == 'sedang')
      @for ($i=1; $i<= $jumlah; $i++)
        @if($i == $no)
          <tr>
        @endif
        <td align="center" style="border: lpx ">
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($kode,'C93')}}" height="50" width="110">
          <br><h2>{{ $kode }}</h2>
        </td>
        @if ($i % 6 == 0 )
          @php $no = $no + 6; @endphp
          </tr>    
        @endif    
      @endfor

    @elseif ( $ukuran == 'besar')
      @for ($i=1; $i<= $jumlah; $i++)
        @if($i == $no)
          <tr>
        @endif
        <td align="center" style="border: lpx ">
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($kode,'C93')}}" height="70" width="140">
          <br>{{ $kode }}
        </td>
        @if ($i % 5 == 0 )
          @php $no = $no + 5; @endphp
          </tr>    
        @endif    
      @endfor
    @endif
    </tbody>
  </table>
</div>
</div>
</div>
</body>
</html>