@extends('layouts.main')



@section('judul')
Nilai Siswa
@endsection


@section('content')


<div class="page-content bg-white">
    <!-- inner page banner -->
    @include('layouts.banner')
    <!-- Breadcrumb row END -->

    <!-- inner page banner --> 

<div class="page-content bg-white content-block">
    <div class="section-area section-sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="row g-0">


                        <div class="heading-bx left">
                            <h2 class="m-b10 title-head">Nilai <span> Siswa</span></h2>
                        </div>

                         
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Nilai</th> 
                                </tr>
                            </thead>
                            <tbody>


                                @if (!empty($post)) 
                                @foreach($post as $posta)


                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th> 
                                    <td>{{ $posta->judul}}</td>
                                    <td>{{ $posta->nilai}}</td>
                                 
                                </tr>
                                @endforeach
                                @else
                                
                                <tr>
                                    <th scope="row">BELOMMM</th>
                                </tr>
                                @endif
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection