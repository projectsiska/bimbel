@extends('layouts.main')



@section('judul')
Riwayat Pembayaran
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
                            <h2 class="m-b10 title-head">Riwayat <span> Pembayaran</span></h2>
                        </div>

                        @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                        @elseif(session()->has('update'))
                        <div class="alert alert-warning" role="alert">
                            {{session('warning')}}
                        </div>
                        @elseif(session()->has('deleted'))
                        <div class="alert alert-danger" role="alert">
                            {{session('deleted')}}
                        </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Rekening</th>
                                    <th scope="col">Total biaya</th>
                                    <th scope="col">Bukti</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>


                                @if (!empty($post)) 
                                @foreach($post as $posta)


                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $posta->rekening->bank}}</td>
                                    <td>{{ $posta->biaya}}</td>
                                    <td><a href="{{ asset('storage/' . $posta->bukti) }}" ><i>Lihat Disini</i></a></td> 
                                    <td>

                                        <a class="btn btn-warning">{{ $posta->status }}</a>

                                    </td>
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