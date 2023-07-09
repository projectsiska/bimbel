@extends('layouts.main')



@section('judul')
Absen Kelas
@endsection


@section('content')


<div class="page-content bg-white">
    <!-- inner page banner -->
    @include('layouts.banner')

    {{-- <div class="alert alert-success" role="alert" style="width: 80%;margin: 3px 10% 0 10%;">
    This is a success alert—check it out!
  </div> --}}
    <!-- Page Heading Box ==== -->

    <div class="content-block">
        <!-- Blog Grid ==== -->
        <div class="section-area section-sp1" style="padding-top:30px">
            <div class="container">
                <div class="ttr-blog-grid-3 row" id="masonry" style="position: relative; height: 1069.31px;">
                    @foreach($post as $posta)
                    <div class="post action-card col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b40"
                        style="left: 0px; top: 0px;">
                        <div class="recent-news">

                            <div class="info-bx">
                                <ul class="media-post">
                                    <li><a href="blog-details.html"><i
                                                class="fa fa-calendar"></i>{{ $posta->created_at->format('Y-m-d H:i:s') }}</a>
                                    </li>
                                    <li><a href="blog-details.html"><i
                                                class="fa fa-user"></i>{{ $posta->kelas->guru->nama }}</a></li>
                                </ul>
                                <h5 class="post-title"><a href="blog-details.html">{{ $posta->judul }}</a></h5>
                                <div class="post-extra">

                                    @if($date > $posta->tutup_absen)



                                    @if(App\Models\absen_masuk::where('siswa_id',auth()->user()->siswa->id)->where('absen_id',$posta->id)->exists())
                                    <a href="#" class="btn button-sm green" readonly>ABSEN SELESAI</a>                                    @else
                                    <a href="#" class="btn button-sm red" readonly>ABSEN TUTUP</a>
                                    @endif

                                   


                                    @else

                                     
                                    <?php $absennya = App\Models\absen_masuk::where('siswa_id','2')->where('absen_id',$posta->id)->get() ?>

                                    @if(App\Models\absen_masuk::where('siswa_id',auth()->user()->siswa->id)->where('absen_id',$posta->id)->exists())
                                    <input role="button" type='submit' class="btn button-sm green" value="ABSEN SUKSES">
                                    @else
                                    <form method="post" action="/absen-masuk">
                                        @csrf
                                        <input name="absen_id" value="{{ $posta->id }}" hidden>
                                        <input name="siswa_id" value="{{ auth()->user()->siswa->id }}" hidden>
                                        <input role="button" type='submit' class="btn button-sm yellow"
                                            value="ABSEN SEKARANG">
                                    </form>
                                    @endif


                                   





                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Pagination END ==== -->
            </div>
        </div>
        <!-- Blog Grid END ==== -->
    </div>
    <!-- Page Content Box END ==== -->
    @endsection
</div>