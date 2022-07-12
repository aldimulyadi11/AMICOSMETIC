<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pengeluaran</title>
</head>
<body>
  <center>
    <p><strong>Laporan Pengeluaran</strong><br>
      <br><br>
  </center>

  <table rules="all" width="100%" cellpadding="2" >
    <thead>
      @php $no = 1; @endphp
      <tr>
        <th style="background-color: #f2f2f2; text-align: center; ">No</th>
        <th style="background-color: #f2f2f2; text-align: center; ">Deskripsi</th>
        <th style="background-color: #f2f2f2; text-align: center; ">Jumlah</th>
        <th style="background-color: #f2f2f2; text-align: center; ">Tanggal</th>
      </tr>
    </thead>
    <tbody>
        @foreach($pengeluaran as $data)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$data->deskripsi}}</td>
        <td>Rp. {{number_format($data->jumlah,0, ".", ".")}}</td>
        <td>{{$data->tanggal}}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
    <td style="text-align: center;" colspan="2"><strong>Total Pengeluaran</strong></td>
      <td style="text-align: center;" colspan="2"><strong>Rp. {{number_format($total,0, ".", ".")}}</strong></td>
  </tr>
    </tfoot>
  </table>
</body>
</html>