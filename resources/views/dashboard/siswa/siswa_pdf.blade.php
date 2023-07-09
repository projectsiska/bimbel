<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
	<Br>
		<h5>Laporan siswa</h4> 

		<Br>
		<Br>
		
		<h4></h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th scope="col">No</th>
                <th scope="col">Nama</th> 
                <th scope="col">Foto</th> 
                <th scope="col">Jenis Kelamin</th> 
                <th scope="col">Tempat / Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col">Email</th>
                <th scope="col">Asal Sekolah</th>   
                <th scope="col">Status</th>   
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($cetakpertanggalnya as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $p->nama_siswa}}</td>
                <td><img src="{{ asset('storage/' . $p->foto) }}" style="width:50px; height:50px"></td>
                <td>{{ $p->jenis_kelamin}}</td>
                <td>{{ $p->tempat_lahir}} / {{ $p->tanggal_lahir}}</td>
                <td>{{ $p->alamat}}</td>
                <td>{{ $p->telepon}}</td>
                <td>{{ $p->email}}</td>
                <td>{{ $p->asal_sekolah}}</td>
                <td>{{ $p->status}}</td> 
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>