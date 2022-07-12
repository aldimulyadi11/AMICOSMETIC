<!DOCTYPE html>
<html lang="en">
<head>

    <title>Invoice</title>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:10px;
            margin:-30;
        }

        h3{
            margin-top: 2px;
            text-align: right;
            font-size:8px;


        }
        h4{
            margin-top: -10px;
            font-size: 8px;
        }
        h5{
            margin-top: -10px;
            margin-left: 110px;
            font-size: 10px;
        }
        footer{
            margin-top: 20px;
        }
        h6{
            margin:0px;
            font-style: 'Brush Script MT';
            text-align: center;
            font-size:20px;
        }
    </style>
</head>
<body>
    <h6>Amii Cosmetic</h6>
    <hr>

    <h3>{{$tanggal}}</h3>
    @foreach($pembeli as $data)
    <h4>Pelanggan: {{ $data->nama_pembeli }}</h4>
    <h4>Cabang   : {{ $data->nama_cabang }}</h4>
    @endforeach
    <h4>Kasir : {{$nama}}</h4>
    
    <table width="100%">         
        @php $no = 1; @endphp
        <tr>
            <th style="text-align: center">Qty</th>
            <th style="text-align: center">Harga</th>
            <th style="text-align: center">Diskon</th>
            <th style="text-align: center">Subtotal</th>
        </tr>
        @foreach($penjualan as $data)
        <tr>
            <td colspan="4">{{ $data->nama_produk }}</td>
        </tr>

        <tr>
            <td style="text-align: center">{{ $data->qty }}</td>
            <td style="text-align: center">{{ number_format($data->harga) }}</td>
            <td style="text-align: center">{{ $data->diskon }}%</td>
            <td style="text-align: center"> {{ number_format($data->total) }}</td>
        </tr>     
        @endforeach
    </table>
    <hr>
    <center>Total :</center>
    <h5>{{number_format($total) }}</h5>
  

    <footer> 
        <center>TERIMA KASIH ATAS KUNJUNGANNYA</center>
        <center>SILAHKAN DATANG KEMBALI DAN DAPATKAN PROMO-PROMO DARI PRODUK KAMI</center>
    </footer>
</body>
</html>




