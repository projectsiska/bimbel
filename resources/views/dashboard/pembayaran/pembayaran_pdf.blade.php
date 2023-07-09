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
		<h5>Laporan Pembayaran</h4> 

		<Br>
		<Br>
		
		<h4></h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th scope="col">No</th> 
                <th scope="col">Nama siswa</th> 
                <th scope="col">Total</th> 
                <th scope="col">Rekening</th> 
                <th scope="col">Status Pembayaran</th> 
                <th scope="col">Tanggal Pembayaran</th>
                <th scope="col">Tanggal Konfirmasi</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1; $jumlah = 0; @endphp
			@foreach($cetakpertanggalnya as $p)
			<tr>

				<td>{{ $i++ }}</td>
			 
                <td>{{ $p->siswa->nama_siswa}}</td> 
                <td>@currency($p->biaya) <?php $jumlah = $jumlah + $p->biaya ?></td> 
                <td>{{ $p->rekening->bank }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->created_at }}</td>
                <td>{{ $p->updated_at }}</td>
			</tr>
			@endforeach

			<tr>
				<td colspan="2"> Jumlah </td>
				<td colspan="3"> @currency( $jumlah)</td>
			</tr>
		</tbody>
	</table>
 
</body>
</html>