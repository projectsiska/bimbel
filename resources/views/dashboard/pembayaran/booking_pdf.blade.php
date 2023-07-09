<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		body {
			padding: 5%;
		},
		table tr td,
		table tr th{

			font-size: 9pt;
		}
	</style>
	<center>
	<Br>
		<h5>LAPORAN PEMBAYARAN</h4>
		<h6>MIAMI bimbel</h6>
		
		<Br>
		<Br>
		
		<h4></h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th scope="col">No</th>
                <th scope="col">Nama siswa</th>
                <th scope="col">biaya / Harga per Box</th>
                <th scope="col">Jumlah</th> 
                <th scope="col">Total</th> 
                <th scope="col">Tanggal Pemesanan</th>
                <th scope="col">Tanggal Pengantaran</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($cetakpertanggalnya as $p)
			<tr>

				<td>{{ $i++ }}</td>
				<td>{{ $p->siswa->nama_siswa }}</a></td>
                <td>{{ $p->biaya->nama_biaya}} | {{ $p->biaya->harga}}</td>
                <td>{{ $p->total_biaya }}</td>
				<td>@currency($p->total)</td>
                <td>{{ $p->created_at }}</td>
                <td>{{ $p->tgl_pembayaran }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>