@extends('dashboard.layouts.main')

@section('content')

@section('judul')
Page Laporan
@endsection

@section('deskripsi')
Laporan Siswa
@endsection
 

<input value="{{ $aa = auth()->user()->level }}" hidden>


<form>
<div class="container">
<h4>Cetak Laporan</h4>
<br>
<div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Berdasarkan</label>
    <div class="col-sm-10">
       <select   name="berdasarkan" id="berdasarkan">
        <option selected>Pilih Berdasarkan...</option> 
        <option value="nama_siswa">Nama siswa</option>
        <option value="jenis_kelamin">Jenis Kelamin</option>
        <option value="alamat">Alamat siswa</option> 
        <option value="asal_sekolah">Asal Sekolah</option> 
        <option value="status">Status siswa</option>
      </select>
    </div>
   </div>
   <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Berdasarkan</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="isinya" id="isinya" placeholder="Tulis">
    </div>

  </div>
  </div>
    <a href="" onclick="this.href='/siswa/laporan-berdasarkan/'+ document.getElementById('berdasarkan').value + '/' + 
    document.getElementById('isinya').value" target="_blank" class="btn tbn-primary col-md-12">cetak laporan</a>
</form>
<br>
 <a href="" onclick="this.href='/siswa/laporan-all/'" target="_blank" class="btn tbn-primary col-md-12">cetak laporan Lengkap</a>
<div class="container">

{{-- <br>
<h4>Cetak Berdasarkan Tanggal</h4>
<Br>
<form>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Awal</label>
    <div class="col-sm-10">
      <input type="date" name="tglawal" id="tglawal" class="form-control" id="inputEmail3">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Akhir</label>
    <div class="col-sm-10">
      <input type="date" name="tglakhir" id="tglakhir" class="form-control" id="inputEmail3">
    </div>
  </div>

  <div class="input-group mb-3">
    <a href="" onclick="this.href='/pembayaran/laporan-pertanggal/'+ document.getElementById('tglawal').value + '/' + 
    document.getElementById('tglakhir').value" target="_blank" class="btn tbn-primary col-md-12">cetak laporan</a>
  </div>

  </form> --}}
</div>
    @endsection
