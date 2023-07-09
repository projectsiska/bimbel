@extends('dashboard.layouts.main')



@section('judul')
Hai {{ $aa = auth()->user()->level }} {{ $aa = auth()->user()->name }}
@endsection

{{-- {{auth()->user()->unreadNotifications }} --}}

@section('content')

<input value="{{ $aa = auth()->user()->level }}" hidden>
@if( $aa =="Administrator")
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Dashboard</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
            <li>Dashboard</li>
        </ul>
    </div>	
    <div class="row">
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Hallo {{ auth()->user()->nama }}</h4>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Card -->
    <div class="row">
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg1">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                        Total Guru
                    </h4>
                    <span class="wc-des">
                        Semua Total Guru
                    </span>
                    <span class="wc-stats">
                        <span class="counter">{{ $guru->count() }}</span>
                    </span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Persen
                        </span>
                        <span class="wc-number ml-auto">
                            100%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg2">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                         Siswa
                    </h4>
                    <span class="wc-des">
                        Semua Total Siswa
                    </span>
                    <span class="wc-stats counter">{{ $siswa->count() }}</span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Persen
                        </span>
                        <span class="wc-number ml-auto">
                            100%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg3">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                        Kelas 
                    </h4>
                    <span class="wc-des">
                        Jumlah Kelas
                    </span>
                    <span class="wc-stats counter">{{ $kelas->count() }}</span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Persen
                        </span>
                        <span class="wc-number ml-auto">
                            100%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg4">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                       Pembayaran
                    </h4>
                    <span class="wc-des">
                        Pembayaran Perlu Konfirmasi
                    </span>
                    <span class="wc-stats counter">{{ $belum->count() }}</span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ ($belum->count() * $pembayaran->count())/100 }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Change
                        </span>
                        <span class="wc-number ml-auto">
                            {{ number_format(($belum->count() / $pembayaran->count())*100,1)  }}
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
    </div>
    <!-- Card END -->
    <div class="row">
        <!-- Your Profile Views Chart -->
       
        <!-- Your Profile Views Chart END-->
        <div class="col-lg-4 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Notifications</h4>
                </div>
                <div class="widget-inner">
                    <div class="noti-box-list">
                        <ul>
                            @foreach ($belum as $belum )
                                
                            
                            <li>
                                <span class="notification-icon dashbg-red">
                                    <i class="fa fa-bullhorn"></i>
                                </span>
                                <span class="notification-text">
                                    <span>{{ $belum->siswa->nama_siswa }}</span> Butuh Konfirmasi
                                </span>
                                <span class="notification-time">
                                   
                                    <span> {{ $belum->created_at->format('d m') }}</span>
                                </span>
                            </li>

                            @endforeach
                         
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>New Student</h4>
                </div>
                <div class="widget-inner">
                    <div class="new-user-list">
                        <ul>
                            @foreach ($siswa as $siswa )
                            <li>
                                <span class="new-users-pic">
                                    <img src="{{ asset('storage/'.$siswa->foto) }}" alt="">
                                </span>
                                <span class="new-users-text">
                                    <a href="#" class="new-users-name">{{ $siswa->nama_siswa }}</a> 
                                </span>
                                <span class="new-users-btn">
                                    <a href="#" class="btn button-sm outline">{{ $siswa->created_at->format('d / m') }}</a>
                                </span>
                            </li>

                            @endforeach
                      
                        </ul>
                    </div>
                </div>
            </div>
        </div>
         
       
    </div>
</div>
@elseif($aa=="Pimpinan")
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Dashboard</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
            <li>Dashboard</li>
        </ul>
    </div>	

    <div class="row">
        <!-- Your Profile Views Chart -->
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Hallo Pimpinan, {{ auth()->user()->nama }}</h4>
                </div>
                
            </div>
        </div>
       
     
       
    </div>
    <!-- Card -->
    <div class="row">
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg1">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                        Total Guru
                    </h4>
                    <span class="wc-des">
                        Semua Total Guru
                    </span>
                    <span class="wc-stats">
                        <span class="counter">{{ $guru->count() }}</span>
                    </span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Persen
                        </span>
                        <span class="wc-number ml-auto">
                            100%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg2">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                         Siswa
                    </h4>
                    <span class="wc-des">
                        Semua Total Siswa
                    </span>
                    <span class="wc-stats counter">{{ $siswa->count() }}</span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Persen
                        </span>
                        <span class="wc-number ml-auto">
                            100%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg3">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                        Kelas 
                    </h4>
                    <span class="wc-des">
                        Jumlah Kelas
                    </span>
                    <span class="wc-stats counter">{{ $kelas->count() }}</span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Persen
                        </span>
                        <span class="wc-number ml-auto">
                            100%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg4">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                       Pembayaran
                    </h4>
                    <span class="wc-des">
                        Pembayaran Perlu Konfirmasi
                    </span>
                    <span class="wc-stats counter">{{ $belum->count() }}</span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ ($belum->count() * $pembayaran->count())/100 }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Change
                        </span>
                        <span class="wc-number ml-auto">
                            {{ number_format(($belum->count() / $pembayaran->count())*100,1)  }}
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
    </div>
    <!-- Card END -->
    
</div>
@elseif($aa=="Guru")
  

<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Dashboard</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
            <li>Dashboard</li>
        </ul>
    </div>	
    <!-- Card -->

    <div class="row">
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Hallo Guru {{ auth()->user()->nama }}</h4>
                </div>
               
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg1">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                        Total Pertemuan
                    </h4>
                    <span class="wc-des">
                        Semua Total Absen
                    </span>
                    <span class="wc-stats">
                        <span class="counter">{{ $absen->count() }}</span>
                    </span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Persen
                        </span>
                        <span class="wc-number ml-auto">
                            100%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg2">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                         Kelas Siswa
                    </h4>
                    <span class="wc-des">
                        Semua Total Siswa Kelas
                    </span>
                    <span class="wc-stats counter">{{ $siswa->count() }}</span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Persen
                        </span>
                        <span class="wc-number ml-auto">
                            100%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg3">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                        Kelas 
                    </h4>
                    <span class="wc-des">
                        Jumlah Kelas
                    </span>
                    <span class="wc-stats counter">1</span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Persen
                        </span>
                        <span class="wc-number ml-auto">
                            100%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg4">					 
                <div class="wc-item">
                    <h4 class="wc-title">
                       Nilai
                    </h4>
                    <span class="wc-des">
                        Total Nilai
                    </span>
                    <span class="wc-stats counter">{{ $nilai->count() }}</span>		
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            Persen
                        </span>
                        <span class="wc-number ml-auto">
                            100%
                        </span>
                    </span>
                </div>				      
            </div>
        </div>
    </div>
    <!-- Card END -->
    
</div>


@endif




@endsection