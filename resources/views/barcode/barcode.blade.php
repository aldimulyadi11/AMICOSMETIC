<html>
<head>
  <title>Cetak Barcode</title>
</head>
<body>
  <table width="30%" >
        
      
      <tr>
        @foreach($produk as $data)
        <td align="center" style="border: lpx solid #ccc">
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($data->kode_produk,'C93')}}" height="60" width="180">
          <br>{{ $data->kode_produk }}
        </td>
        @endforeach
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>
</body>
</html>