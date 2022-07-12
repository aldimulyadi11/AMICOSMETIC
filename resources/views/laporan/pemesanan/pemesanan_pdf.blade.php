<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pemesanan</title>
</head>
<body>
  <center>
    <p><strong>Laporan Pemesanan</strong><br>
      <br><br>
  </center>

  <table rules="all" width="100%" cellpadding="2" >
    <thead>
      @php $no = 1; @endphp
      <tr>
        <th style="background-color: #f2f2f2; text-align: center; ">No</th>
        <th style="background-color: #f2f2f2; text-align: center; ">Nama Produk</th>
        <th style="background-color: #f2f2f2; text-align: center; ">Nama Supplier</th>
        <th style="background-color: #f2f2f2; text-align: center; ">Harga</th>
        <th style="background-color: #f2f2f2; text-align: center; ">Quantity</th>
        <th style="background-color: #f2f2f2; text-align: center; ">Subotal</th>
        <th style="background-color: #f2f2f2; text-align: center; ">Tanggal</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pemesanan as $data)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$data->nama_produk}}</td>
        <td>{{$data->nama_supplier}}</td>
        <td>Rp. {{number_format($data->harga,0, ".", ".")}}</td>
        <td>{{$data->qty}}</td>
        <td>Rp. {{number_format($data->total,0, ".", ".")}}</td>
        <td>{{$data->tanggal}}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
    <td style="text-align: center;" colspan="5"><strong>Total Pemesanan</strong></td>
      <td style="text-align: center;" colspan="2"><strong>Rp. {{number_format($total,0, ".", ".")}}</strong></td>
  </tr>
    </tfoot>
  </table>
</body>
</html>