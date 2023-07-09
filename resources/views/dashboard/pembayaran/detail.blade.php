@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Pembayaran
@endsection

@section('deskripsi')
Halaman Edit Pembayaran
@endsection


<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Pembayaran Profile</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="/pembayaran">Pembayaran</a></li>
        </ul>
    </div>	
    <div class="row">
        <!-- Your Profile Views Chart -->
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Detail Pembayaran Profile</h4>
                </div>
                <div class="widget-inner">
                    <form class="edit-profile m-b30">
                        <div class="">
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Siswa</label>
                                <div class="col-sm-7">
                                   : {{ $pembayaran->siswa->nama_siswa }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Biaya</label>
                                <div class="col-sm-7">
                                    : {{ $pembayaran->biaya }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Rekening</label>
                                <div class="col-sm-7">
                                    : {{ $pembayaran->rekening->bank}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Bukti</label>
                                <div class="col-sm-7">
                                    : <img src="{{ asset('storage/' . $pembayaran->bukti) }}" alt="{{ $pembayaran->bukti }}" class="img-fluid mt-3">
                                </div>
                            </div>
                           
                        </div>
                        
                    </form>
            
                </div>
            </div>
        </div>
        <!-- Your Profile Views Chart END-->
    </div>
</div>


 

@endsection
