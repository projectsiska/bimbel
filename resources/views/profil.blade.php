@extends('layouts.main')



@section('judul')
Profil Kami
@endsection


@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    @include('layouts.banner')
<div class="content-block">
    <!-- About Us ==== -->
    <div class="section-area section-sp1">
        <div class="container">
             <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="feature-container">
                        <div class="feature-md text-white m-b20">
                            <a href="#" class="icon-cell"><img src="assets/images/icon/icon1.png" alt=""></a> 
                        </div>
                        <div class="icon-content">
                            <h5 class="ttr-tilte">Blended Learning</h5>
{{--                             <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod..</p>
 --}}                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="feature-container">
                        <div class="feature-md text-white m-b20">
                            <a href="#" class="icon-cell"><img src="assets/images/icon/icon2.png" alt=""></a> 
                        </div>
                        <div class="icon-content">
                            <h5 class="ttr-tilte">Multimedia Class</h5>
{{--                             <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod..</p>
 --}}                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="feature-container">
                        <div class="feature-md text-white m-b20">
                            <a href="#" class="icon-cell"><img src="{{asset('assets/images/icon/icon3.png') }}" alt=""></a> 
                        </div>
                        <div class="icon-content">
                            <h5 class="ttr-tilte">Lab Try Out CAT</h5>
{{--                             <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod..</p>
 --}}                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="feature-container">
                        <div class="feature-md text-white m-b20">
                            <a href="#" class="icon-cell"><img src="assets/images/icon/icon4.png" alt=""></a> 
                        </div>
                        <div class="icon-content">
                            <h5 class="ttr-tilte">Comprehensif Book</h5>
{{--                             <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod..</p>
 --}}                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us END ==== -->
    <!-- Our Story ==== -->
    <div class="section-area bg-gray section-sp1 our-story">
        <div class="container">
            <div class="row align-items-center d-flex">
                <div class="col-lg-5 col-md-12 heading-bx">
                    <h2 class="m-b10">{{ $post[0]->nama }}</h2>
                    <h5 class="fw4">{{ $post[0]->deskripsi }}</p>
                 </div>
                <div class="col-lg-7 col-md-12 heading-bx p-lr">
                    <div class="video-bx">
                        <img src="assets/images/about/pic1.jpg" alt="">
                     </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section-area section-sp2 bg-fix ovbl-dark join-bx text-center" style="background-image:url(assets/images/background/bg1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="join-content-bx text-white">
                        <h2>Solusi buat kamu Lulus Taruna Tahun Ini</h2>
                        <h4><span class="counter">NEC</span></h4>
                        <p>Adalah lembaga pendidikan non formal yang berfokus dan berkomitmen dalam mempersiapkan seluruh peserta didik di Indonesia dalam menghadapi tes seleksi masuk tamtama dan bintara polri dalam persiapan bimbel masuk tamtama bintara.
<Br>Untuk bergabung menjadi Bintara, kamu bisa melakukan pendaftaran secara online melalui website resmi penerimaan Polri. Selain itu, disana kamu juga bisa mengetahui beberapa macam informasi terkait pendaftaran, mulai dari persyaratan, cara pendaftaran hingga jadwal seleksi.
<br>Jadwal dan Informasi pendaftaran tamtama bintara Polri menjadi satu hal yang sangat penting untuk diketahui. Sebab, kamu perlu mempersiapkan beberapa dokumen yang dibutuhkan untuk melakukan pendaftaran.
<br>Tidak hanya itu, kamu juga perlu mengetahui jadwal lengkap pendaftaran polri ini. Pasalnya melalui jadwal pendaftaran, kamu bisa mengetahui apa saja yang harus dipersiapkan untuk tahap selanjutnya.
                        
                        </p>
                        <a href="/login" class="btn button-md">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Content END ==== -->
    <!-- Testimonials ==== -->
    
    <!-- Testimonials END ==== -->
</div>
</div>

@endsection