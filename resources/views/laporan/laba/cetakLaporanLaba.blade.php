<!DOCTYPE html>
<html>
<head>
	<title>Laporan Laba</title>
	<style type="text/css">
		.table1 {
			font-family: sans-serif;
			color: #232323;
			border-collapse: collapse;
			width: 100%;
		}

		.table1, th, td {
			border: 1px solid #999;
			padding: 8px 20px;
			font-size: 11 px;
		}

		th {
			text-align: center;
		}

		.table1 tr:hover {
			background-color: #f5f5f5;
		}

		.table1 th(even) {
			background-color: #f2f2f2;
		}

		p {
			font-size: 10pt;
		}

		#tengah{
			text-align: center;
		}

		.pos{
			text-align: right;
			padding-right: 25px;
		}

		.rek{
			text-align: right;
			padding-top: 30px;
			padding-right: 25px;
		}
	</style>
</head>
<body>
	<center>
		<p><strong>Laporan Laba</strong><br>
			<br><br>
	</center>

	<table class="table1">
		<thead>
			<tr>
				<th>Total Penjualan</th>
                <th>Total Pengeluaran</th>
			</tr>
		</thead>
		<tbody>
            <tr>
                <td>Rp. {{number_format($penjualan,0, ".", ".")}}</td>
                  <td>Rp. {{number_format($total,0, ".", ".")}}</td>
            </tr>
		</tbody>
		<tfoot>
			<tr>
     <td style="text-align: center;" ><strong>Laba</strong></td>
      <td style="text-align: center;" ><strong>Rp. {{number_format($laba,0, ".", ".")}}</strong></td>
  </tr>
    </tfoot>
	</table>
</body>
</html>