<!DOCTYPE html>
<html>
<head>
	<title>Laporan pembayaran</title>
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
		},
		@page { size: 6cm 20cm landscape; },
	</style>
	<center>
	<Br>
		<h5>LAPORAN BERDASARKAN</h4>
		<h6>biaya {{ $biayanya->nama_biaya}}</h6>

		<Br>
		<Br>
		
		<h4></h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th scope="col">Tanggal Pemesanan</th> 
				<th scope="col">siswa</th> 
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Total</th>
                <th scope="col">Tanggal Pengantaran</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($post as $p)
			<tr>

			 
				<td>{{ $p->created_at }}</td> 
				<td>{{ $p->siswa->nama_siswa }}</td> 
				<td>{{ $p->total_biaya }}</td> 
				<td>@currency($p->biaya->harga)</td> 
				<td>@currency($p->biaya->harga * $p->total_biaya)</td> 
				<td>{{ $p->tgl_pembayaran }} Jam  {{ $p->jam_pembayaran }}</td> 
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>