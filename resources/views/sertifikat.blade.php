@extends('layouts.main')



@section('judul')
Sertifikat
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
                            <h2 class="m-b10 title-head">Download <span> Sertifikat</span></h2>
                        </div>
 
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Sertifikat</th> 
                                </tr>
                            </thead>
                            <tbody>


                                @if (!empty($post)) 
                                @foreach($post as $posta)


                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th> 
                                    <td><a href="{{ asset('storage/' . $posta->sertifikat) }}" ><i>Lihat Disini</i></a></td> 
                                     
                                </tr>
                                @endforeach
                                @else
                                
                                <tr>
                                    <th scope="row">Belum Ada Sertifikat</th>
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