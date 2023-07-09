@extends('dashboard.layouts.main')

@section('content')

@section('judul')
Page Laporan
@endsection

@section('deskripsi')
Laporan Pembayaran
@endsection
 

<input value="{{ $aa = auth()->user()->level }}" hidden>


 
 
<form>
    <div class="container">
        <h4>Cetak Berdasarkan Status</h4>
        <br>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select class="mr-sm-2" name="status" id="status">
                    <option selected>Pilih Status...</option>
                    <option value="Konfirmasi">Telah Konfirmasi</option>
                    <option value="Menunggu">Menunggu Konfirmasi</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>
        </div>
    
    </div>
    <a href="" onclick="this.href='/pembayaran/laporan-berdasarkan/'+ document.getElementById('status').value"
        target="_blank" class="btn tbn-primary col-md-12">cetak laporan</a>
</form>


<div class="container">
    <br>
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

    </form>
    <br>
    <br>
    <a href="" onclick="this.href='/pembayaran/laporan-all/'" target="_blank" class="btn tbn-primary col-md-12">cetak
        Semua Laporan</a>


</div> 

@endsection
